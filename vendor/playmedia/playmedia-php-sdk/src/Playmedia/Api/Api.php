<?php

namespace Playmedia\Api;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use Guzzle\Log\MessageFormatter;
use Guzzle\Log\PsrLogAdapter;
use Guzzle\Plugin\Log\LogPlugin;
use Guzzle\Plugin\Cache\CachePlugin;
use Guzzle\Plugin\Cache\DefaultCacheStorage;
use Guzzle\Cache\DoctrineCacheAdapter;
use Guzzle\Plugin\History\HistoryPlugin;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\ChromePHPHandler;
use Monolog\Formatter\LineFormatter;
use Doctrine\Common\Cache\MemcachedCache;
use Playmedia\Api\Plugin\ContextPlugin;
use Playmedia\Api\Service\Base;
use Playmedia\Api\Service\ServiceTrait;

/**
 * Api base class.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class Api extends Client
{
    use ServiceTrait;

    protected $services = array();
    protected $historyPlugin;
    protected $cachePlugin;

    /**
     * @param array $config
     */
    public static function factory($config = array())
    {
        $default = array(
            'request.options' => array(
                'exceptions' => false,
            ),
            'client.logDir' => null,
            'client.isCacheable' => false,
        );

        $required = array(
            'sdk.env',
            'sdk.debug',
            'context.contentLanguage',
            'context.clientIp',
            'context.app',
        );

        // Merge in default settings and validate the config
        $config = Collection::fromConfig($config, $default, $required);

        // Instanciate raw client
        $client = new self('', $config);

        // Customize client
        $descriptionFilepath = sprintf(
            '%s/resources/config/%s/services.json',
            realpath(__DIR__.'/../../../'),
            $config['sdk.env']
        );

        $description = ServiceDescription::factory($descriptionFilepath);
        $client->setDescription($description);

        $contextPlugin = new ContextPlugin($config);
        $client->addSubscriber($contextPlugin);

        $historyPlugin = new HistoryPlugin();
        $historyPlugin->setLimit(1);

        $client->historyPlugin = $historyPlugin;
        $client->addSubscriber($client->historyPlugin);

        if (null != $config['client.logDir']) {
            // Monolog part
            $stream = sprintf('%s/playmedia-api.log', rtrim($config['client.logDir'], '/'));
            $formatter = new LineFormatter("[%datetime%] %level_name%: %message%\n", null, true);

            // Default
            $handler = new StreamHandler($stream, Logger::NOTICE);
            $handler->setFormatter($formatter);

            $logger = new Logger('playmedia');
            $logger->pushHandler($handler);

            // Developer friendly
            if ($config['sdk.debug'] && 'production' != $config['sdk.env']) {
                $logger->pushHandler(new FirePHPHandler());
                $logger->pushHandler(new ChromePHPHandler());
            }

            $logAdapter = new PsrLogAdapter($logger);

            // Guzzle part
            $messageFormatter = new MessageFormatter("\n< {method} {url} {req_body} \n> {code} {res_body}");

            $logPlugin = new LogPlugin($logAdapter, $messageFormatter);

            $client->addSubscriber($logPlugin);
        }

        if (true == $config['client.isCacheable']) {
            $memcached = new \Memcached('sdk');

            $memcached->setOption(\Memcached::OPT_SERIALIZER, \Memcached::SERIALIZER_IGBINARY);
            $memcached->setOption(\Memcached::OPT_HASH, \Memcached::HASH_MD5);
            $memcached->setOption(\Memcached::OPT_DISTRIBUTION, \Memcached::DISTRIBUTION_CONSISTENT);

            if (count($memcached->getServerList()) < 1) {
                $memcached->addServer('192.168.0.4', 11212);
            }

            $memcachedCache = new MemcachedCache();
            $memcachedCache->setMemcached($memcached);

            $cachePlugin = new CachePlugin(array(
                'storage' => new DefaultCacheStorage(
                    new DoctrineCacheAdapter($memcachedCache),
                    '',
                    600
                ),
            ));

            $client->addSubscriber($cachePlugin);
            $client->cachePlugin = $cachePlugin;
        }

        return $client;
    }

    private function getService($className)
    {
        if (isset($this->services[$className])) {
            return $this->services[$className];
        }

        $class = sprintf('Playmedia\\Api\\Service\\%s', ucfirst($className));
        if (class_exists($class)) {
            $this->services[$className] = new $class($this);
        } else {
            $this->services[$className] = new Base($this, $className);
        }

        return $this->services[$className];
    }

    public function getErrors()
    {
        $response = $this->getLastResponse()->json();

        return $response['errors'];
    }

    public function getLastResponse()
    {
        return $this->historyPlugin->getLastResponse();
    }

    /**
     * Extracts the pagination URL identified by $rel from the Link response header, if present.
     *
     * @param string $rel one of "first", "last", "prev", "next"
     *
     * @return string
     */
    protected function getPage($rel)
    {
        if (!$header = $this->getLastResponse()->getHeader('Link')) {
            return;
        }
        $link = $header->getLink($rel);
        if (preg_match('/page=([0-9]+)/', $link['url'], $matches)) {
            list(, $page) = $matches;

            return $page;
        }
    }

    /**
     * Returns the value of the X-Total-Count response header, if present.
     *
     * @return int
     */
    public function getTotalCount()
    {
        if (!$header = $this->getLastResponse()->getHeader('X-Total-Count')) {
            return;
        }

        return current($header->toArray());
    }

    /**
     * Returns the previous page URL.
     *
     * @return int
     */
    public function getPreviousPage()
    {
        return $this->getPage('prev');
    }

    /**
     * Returns the next page URL.
     *
     * @return int
     */
    public function getNextPage()
    {
        return $this->getPage('next');
    }

    /**
     * Returns the first page URL.
     *
     * @return int
     */
    public function getFirstPage()
    {
        return $this->getPage('first');
    }

    /**
     * Returns the last page URL.
     *
     * @return int
     */
    public function getLastPage()
    {
        return $this->getPage('last');
    }

    /**
     * @param array    $items     an array of arrays
     * @param string   $property  the name of the property to group items
     * @param callable $inflector an anonymous function that is intended to transform $property before grouping
     *
     * @return array
     */
    public function groupBy($items, $property, callable $inflector = null)
    {
        $grouped = array();

        foreach ($items as $item) {
            $key = $item[$property];

            if (null !== $inflector) {
                $key = call_user_func_array($inflector, array($key));
            }

            if (!isset($grouped[$key])) {
                $grouped[$key] = array();
            }

            $grouped[$key][] = $item;
        }

        return $grouped;
    }

    public function purge($url)
    {
        if (null !== $this->cachePlugin) {
            $this->cachePlugin->purge($url);
        }
    }
}
