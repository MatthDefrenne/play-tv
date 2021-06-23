<?php

namespace Playmedia;

use Pimple;
use Symfony\Component\Validator\Validation;
use Doctrine\DBAL\DriverManager;
use Playmedia\Api\Api;
use Playmedia\Caching\NullCache;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\PoFileLoader;

/**
 * Sdk base class.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class Sdk extends Pimple
{
    /**
     * Default parameters.
     *
     * @var array
     */
    protected static $DEFAULTS = array(
        'env' => 'production',
        'debug' => false,
        'use_cache' => true,
        'database' => array(
            'driver' => 'pdo_mysql',
            'dbname' => 'playtv',
            'host' => '192.168.0.3',
            'user' => 'sdk',
            'password' => 'a9gaTXTtQCp0ImJWGD6C4SurEVSlZSqZ2wavuUFk',
            'charset' => 'utf8',
        ),
        'caching' => array(
            'identifier' => 'sdk',
            'host' => '192.168.0.4',
            'port' => 11212,
        ),
    );

    /**
     * List of available environments.
     *
     * @var array
     */
    protected static $ENVIRONMENTS = array(
        'dev', 'staging', 'production',
    );

    /**
     * @param array $config
     */
    public function __construct(array $parameters = array())
    {
        parent::__construct();

        $parameters = array_merge(self::$DEFAULTS, $parameters);
        $this->initContainer($parameters);
    }

    protected function initContainer(array $parameters)
    {
        if (!in_array($parameters['env'], self::$ENVIRONMENTS)) {
            throw new \Exception(sprintf('Env %s is not available', $parameters['env']));
        }

        $this['sdk.env'] = $parameters['env'];
        $this['sdk.debug'] = $parameters['debug'];

        unset($parameters['env'], $parameters['debug']);
        $this['sdk.parameters'] = $parameters;

        //
        // Validation
        //
        $this['validator'] = $this->share(function () {
            return Validation::createValidatorBuilder()
                ->setApiVersion(Validation::API_VERSION_2_5)
                ->getValidator();
        });

        //
        // Database
        //
        $this['database'] = $this->share(function () {
            return DriverManager::getConnection($this['sdk.parameters']['database']);
        });

        //
        // Distributed cache
        //
        $this['caching'] = $this->share(function ($c) {

            if ($this['sdk.parameters']['use_cache']) {
                $memcached = new \Memcached($this['sdk.parameters']['caching']['identifier']);

                $memcached->setOption(\Memcached::OPT_SERIALIZER, \Memcached::SERIALIZER_IGBINARY);
                $memcached->setOption(\Memcached::OPT_HASH, \Memcached::HASH_MD5);

                if (count($memcached->getServerList()) < 1) {
                    $memcached->addServer($this['sdk.parameters']['caching']['host'], $this['sdk.parameters']['caching']['port']);
                }

                return $memcached;
            }

            return new NullCache();
        });

        //
        // API Context
        //
        $this['api.config'] = array();

        //
        // External APIs
        //
        $filepath = __DIR__.'/../../resources/config/'.$this['sdk.env'].'/external.php';
        $externalParameters = require $filepath;
        $externalParameters = (1 === $externalParameters) ? array() : $externalParameters;

        $this['external.parameters'] = $externalParameters;

        $this['twitter'] = $this->share(function ($c) {
            return new \tmhOAuth($c['external.parameters']['twitter']);
        });

        $this['paymill'] = $this->share(function ($c) {
            return new \Paymill\Request($c['external.parameters']['paymill']['private_key']);
        });

        $this['playmedia'] = $this->share(function ($c) {
            return $c['external.parameters']['playmedia'];
        });

        //
        // Cellpass
        //
        $cellpassConfig = $this['external.parameters']['cellpass'];

        \StubCellpass::$EDITOR_ID = $cellpassConfig['editor_id'];
        \StubCellpass::$SECRET = $cellpassConfig['secret'];
        if (isset($cellpassConfig['cellpass_url'])) {
            \StubCellpass::$CELLPASS_URL = $cellpassConfig['cellpass_url'];
        }

        //
        // FROM API
        //
        $this['product.matrix'] = $this->share(function ($c) {
            $data = $c->getApi()->products()->matrix();
            if (!$c->getApi()->getLastResponse()->isSuccessful()) {
                $data = [];
            }

            return new \Playmedia\Component\Channel\ProductMatrix($data);
        });

        $this['channel.product_resolver'] = $this->share(function ($c) {
            return new \Playmedia\Component\Channel\ProductResolver($c['product.matrix'], $c['product.free']);
        });

        $this['product.free'] = $this->share(function ($c) {
            $data = $c->getApi()->products()->show('pack-decouverte');
            if (!$c->getApi()->getLastResponse()->isSuccessful()) {
                return;
            }

            return $data;
        });

        $this['is_i18n'] = getenv('APP_ENV_I18N');

        //
        // COMPONENTS
        //
        $this['services.channel.stream'] = $this->share(function ($c) {
            $parameters = $c['sdk.parameters']['database'];
            $parameters['dbname'] = 'playmedia';
            $conn = DriverManager::getConnection($parameters);

            return new \Playmedia\Component\Channel\Stream($conn, $c['caching']);
        });

        $this['services.channel.geoloc'] = $this->share(function ($c) {
            return new \Playmedia\Component\Channel\Geoloc($c['database'], $c['caching']);
        });

        $this['services.channel.social_tv'] = $this->share(function ($c) {
            return new \Playmedia\Component\Channel\SocialTv($c['database'], $c['caching']);
        });

        $this['services.channel.network'] = $this->share(function ($c) {
            return new \Playmedia\Component\Channel\Network($c['database'], $c['caching']);
        });

        $this['services.channel.replay_tv'] = $this->share(function ($c) {
            return new \Playmedia\Component\Channel\ReplayTv($c['database'], $c['caching']);
        });

        $this['services.channel.category'] = $this->share(function ($c) {
            return new \Playmedia\Component\Channel\Category($c['database'], $c['caching']);
        });

        $this['services.channel.theme'] = $this->share(function ($c) {
            return new \Playmedia\Component\Channel\Theme($c['database'], $c['caching']);
        });

        $this['services.channel'] = $this->share(function ($c) {
            $channelComponent = new \Playmedia\Component\Channel(
                $c['database'],
                $c['caching'],
                $c['external.parameters']['playmedia.cdn']['static_url'],
                $c['is_i18n']
            );

            $channelComponent
                ->setProductMatrix($c['product.matrix'])
                ->setFreeProduct($c['product.free'])
                ->setGeolocsCollection($c['services.channel.geoloc']->collection())
                ->setChannelSocialTv($c['services.channel.social_tv']->collection())
                ->setChannelReplayTv($c['services.channel.replay_tv']->getReplaysChannel())
            ;

            return $channelComponent;
        });

        $this['services.program'] = $this->share(function ($c) {
            return new \Playmedia\Component\Program(
                $c['database'],
                $c['caching'],
                $c['external.parameters']['playmedia.cdn']['static_url'],
                $c['translator'],
                $c['is_i18n']
            );
        });

        $this['services.broadcast'] = $this->share(function ($c) {
            return new \Playmedia\Component\Broadcast($c['database'], $c['caching'], $c['services.channel'], $c['services.program']);
        });

        $this['services.group'] = $this->share(function ($c) {
            return new \Playmedia\Component\Group(
                $c['database'],
                $c['caching'],
                $c['external.parameters']['playmedia.cdn']['static_url'],
                $c['services.program'],
                $c['translator'],
                $c['is_i18n']
            );
        });

        $this['services.audience'] = $this->share(function ($c) {
            return new \Playmedia\Component\Audience($c['database'], $c['caching'], $c['services.channel'], $c['services.broadcast']);
        });

        $this['services.casting'] = $this->share(function ($c) {
            return new \Playmedia\Component\Casting($c['database'], $c['caching'], $c['services.broadcast'], $c['services.group'], $c['translator'], $c['is_i18n']);
        });

        $this['services.product'] = $this->share(function ($c) {
            return new \Playmedia\Component\Product($c->getApi());
        });

        $this['services.replay_tv'] = $this->share(function ($c) {
            return new \Playmedia\Component\ReplayTv($c['database'], $c['caching'], $c['services.channel'], $c['services.group'], $c['services.program'], $c['translator'], $c['is_i18n']);
        });

        $this['services.social_tv'] = $this->share(function ($c) {
            return new \Playmedia\Component\SocialTv($c['database'], $c['caching'], $c['services.channel']);
        });

        $this['services.channel.mosaic'] = $this->share(function ($c) {
            return new \Playmedia\Component\Channel\Mosaic($c['database'], $c['caching'], $c['is_i18n']);
        });

        \Playmedia\Utils\Tool::init(array(
            'static_url' => $this['external.parameters']['playmedia.cdn']['static_url'],
        ));

        //
        // UTILS
        //
        $this['utils.program'] = $this->share(function () {
            return new \Playmedia\Utils\Program();
        });

        $this['utils.tool'] = $this->share(function () {
            return new \Playmedia\Utils\Tool();
        });

        $this['translator'] = $this->share(function ($c) {

            $locale = isset($c['locale']) ? $c['locale'] : 'fr';

            $translator = new Translator($locale);
            $translator->addLoader('po', new PoFileLoader());

            $localesDir = realpath(__DIR__.'/../../resources/locales/');

            foreach (['de', 'en', 'it', 'pt', 'tr', 'es'] as $language) {
                foreach (['tv_genres', 'tv_casts'] as $domain) {
                    $translator->addResource('po', $localesDir.'/'.$language.'/'.$domain.'.po', $language, $domain);
                }
            }

            return $translator;
        });

        $this['playmedia.cdn_resolver'] = $this->protect(function ($name) {
            $appsHost = $this['external.parameters']['playmedia.cdn']['apps_url'];

            return str_replace('{app_name}', $name, $appsHost);
        });
    }

    /**
     * Returns a unique Api instance per context.
     *
     * @return Playmedia\Api\Api
     */
    public function getApi()
    {
        $config = $this['api.config'];
        $config['sdk.env'] = $this['sdk.env'];
        $config['sdk.debug'] = $this['sdk.debug'];

        $key = sprintf('api_%s', bin2hex(implode('_', $config)));

        if (!isset($this[$key])) {
            $this[$key] = Api::factory($config);
        }

        return $this[$key];
    }

    public function getForm($className)
    {
        $class = sprintf('Playmedia\\Form\\%s', $className);
        if (!class_exists($class)) {
            throw new \Exception(sprintf('No form class %s found', $className));
        }

        return new $class($this['validator']);
    }

    public function getTwitter()
    {
        return $this['twitter'];
    }

    public function getPaymill()
    {
        return $this['paymill'];
    }

    public function getPlaymedia()
    {
        return $this['playmedia'];
    }

    public function setLanguage($language)
    {
        $this['language'] = $language;

        return $this;
    }

    /**
     * Set Client Ip.
     *
     * @param bool $isHtml5
     *
     * @return $this
     */
    public function setClientIp($clientIp)
    {
        if (isset($this['api.config'])) {
            $this['api.config'] = array_merge($this['api.config'], ['context.clientIp' => $clientIp]);
        }

        return $this;
    }

    /**
     * @deprecated
     */
    public function getDefaultLanguage()
    {
        return $this['language'];
    }

    public function setLocale($locale)
    {
        $this['locale'] = $locale;
        $this['translator'] = $this->extend('translator', function ($translator, $c) use ($locale) {
            $translator->setLocale($locale);

            return $translator;
        });
    }
}
