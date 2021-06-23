<?php

namespace Playmedia\Api;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client as BaseClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Playmedia\Api\Client\JsonStream;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Doctrine\Common\Cache\ChainCache;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\MemcachedCache;
use Kevinrob\GuzzleCache\Strategy\PublicCacheStrategy;
use Kevinrob\GuzzleCache\Storage\DoctrineCacheStorage;

class Client extends BaseClient
{
    public function __construct(array $config = [])
    {
        $stack = HandlerStack::create();

        // Unserialize JSON streams
        $stack->push(Middleware::mapResponse(function (ResponseInterface $response) {
            $jsonStream = new JsonStream($response->getBody());

            return $response->withBody($jsonStream);
        }));

        // Cache HTTP responses
        if (isset($config['cache_memcached'])) {
            $memcachedCache = new MemcachedCache();
            $memcachedCache->setMemcached($config['cache_memcached']);

            $stack->push(
                new CacheMiddleware(
                    new PublicCacheStrategy(
                        new DoctrineCacheStorage(
                            new ChainCache([
                                new ArrayCache(),
                                $memcachedCache,
                            ])
                        )
                    )
                ),
                'cache'
            );
        }

        $config = array_merge($config, [
            'connect_timeout' => 1.0,
            'headers' => ['Accept-Encoding' => 'gzip'],
            'handler' => $stack,
        ]);

        parent::__construct($config);
    }

    /**
     * Performs a GET request with exceptions disabled, and returns the unserialized response.
     * If the request fails, returns $default.
     *
     * @param string $uri
     * @param array  $opts
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getJSON($uri, array $opts = [], $default = null)
    {
        $opts = array_merge($opts, [
            'http_errors' => false,
        ]);

        $response = $this->get($uri, $opts);
        if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
            return $response->getBody()->unserialize();
        }

        return $default;
    }
}
