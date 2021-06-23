<?php

namespace PlayTv;

use Playmedia\Sdk;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\PoFileLoader;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\EventDispatcher;
use PHPlay\RequestAdapter;
use PHPlay\ResponseAdapter;
use PHPlay\Component\Loader as ComponentLoader;
use PHPlay\EventListener\BeforeActionListener;
use PHPlay\EventListener\NullResponseListener;
use PHPlay\EventListener\StringToResponseListener;
use PHPlay\EventListener\OverwriteResponseListener;
use PlayTv\EventListener\RouterListener;
use PlayTv\EventListener\ForwardResponseListener;
use PlayTv\EventListener\CustomResponseHeadersListener;
use PlayTv\EventListener\AdblockerListener;
use PlayTv\EventListener\WiboxListener;
use PlayTv\EventListener\ExceptionListener;
use PlayTv\EventListener\WebsiteAttributeListener;
use PlayTv\EventListener\ChannelAttributeListener;
use PlayTv\EventListener\Seo\BelongsToWebsiteListener;
use PlayTv\EventListener\NotifierWebsiteListener;
use PlayTv\Controller\ControllerResolver;
use PlayTv\Meta\AlternateLinkGenerator;
use PlayTv\Routing\RouterResolver;
use PlayTv\Routing\HostResolver;
use PlayTv\Sitemap\Resolver as SitemapResolver;
use PlayTv\Core\Website;
use PlayTv\Core\Channel\ChannelManager;
use Symfony\Component\Routing\Router;

class Application extends \Pimple implements HttpKernelInterface
{
    protected $phplay;
    protected $core;

    /**
     * PHPlay constructor.
     *
     * {@inheritdoc}
     */
    public function __construct($application_name, $root_dir, $debug = false, $report_level = 0, $cache_type = 'none')
    {
        // @see http://php.net/manual/fr/function.session-cache-limiter.php
        ini_set('session.cache_limiter', '');

        $this['debug'] = $debug;
        $this['env'] = getenv('APP_ENV');
        $this['app.root_dir'] = realpath($root_dir).'/';

        $this->phplay = new PHPlay($application_name, $root_dir, $debug, $report_level, $cache_type);

        $this->setLocale($this->isI18n() ? 'en' : 'fr');
    }

    public function boot()
    {
        $this->phplay->boot();
        $this->core = $this->phplay->core;

        $this['app.log_dir'] = $this->phplay->core->context->config->path->log;
        $this['app.cache_dir'] = $this->phplay->core->context->config->path->cache;
        $this['app.templates_dir'] = $this->phplay->core->context->config->path->views;
        $this['app.templates_i18n_dir'] = rtrim($this->phplay->core->context->config->path->views, '/').'-i18n';
        $this['app.web_dir'] = $this->phplay->core->context->config->path->web;
        $this['app.locales_dir'] = $this['app.root_dir'].'app/locales';
        $this['app.config_dir'] = $this->core->context->config->path->config;

        // SDK
        $this['sdk.config'] = array(
            'env' => $this['env'],
            'debug' => $this['debug'],
        );

        $this['sdk.api.config'] = array(
            'context.app' => 'Play TV',
            'context.contentLanguage' => $this['locale'],
            'context.clientIp' => 'N/A',
            'client.logDir' => $this['app.log_dir'],
            'client.isCacheable' => !$this['debug'],
        );

        $this['sdk'] = $this->share(function ($c) {
            $sdk = new Sdk($c['sdk.config']);
            $sdk['api.config'] = $c['sdk.api.config'];

            return $sdk;
        });

        // Caching
        $this['caching.config'] = parse_ini_file($this->phplay->environment['path']['config'].'/memcache.conf', true);
        $this['caching.factory'] = $this->protect(function ($name) {
            $config = $this['caching.config'][$name];

            $mc = new \Memcached($name);
            $mc->setOption(\Memcached::OPT_SERIALIZER, \Memcached::SERIALIZER_IGBINARY);
            $mc->setOption(\Memcached::OPT_HASH, \Memcached::HASH_MD5);

            // bc persistend_id is defined, avoid multiple additions
            if (count($mc->getServerList()) < 1) {
                $mc->addServer($config['host'], $config['port']);
            }

            return $mc;
        });
        foreach (['desktop', 'uniads'] as $name) {
            $this['caching.'.$name] = $this->share(function ($c) use ($name) {
                return $c['caching.factory']($name);
            });
        }
        $this['caching.default'] = $this->share(function ($c) {
            return $c['caching.desktop'];
        });

        // i18n, l10n
        $this['locales'] = $this->getLocales();

        // Translator
        $this['translator'] = $this->share(function ($c) {

            // $translator = new Translator($c['locale']); // @debug
            $translator = new Translator($c['locale'], null, $c['app.cache_dir'].'translator', $c['debug']);
            $translator->addLoader('po', new PoFileLoader());

            $files = glob($c['app.locales_dir'].'/*/*.po');
            foreach ($files as $filename) {
                $language = basename(dirname($filename));
                $domain = basename($filename, '.po');
                $translator->addResource('po', $filename, $language, $domain);
            }

            $translator->setFallbackLocales(['en']);

            return $translator;
        });

        // Twig
        $this['twig.options'] = array(
            'cache' => $this['debug'] ? false : "{$this['app.cache_dir']}twig",
            'auto_reload' => ('dev' === $this['env']) ? true : false,
            'debug' => ('dev' === $this['env']) ? true : false,
            'strict_variables' => true,
        );
        $this['twig.path'] = array(
            $this['app.templates_dir'],
        );

        $this['twig.loader'] = $this->share(function ($c) {
            return new \Twig_Loader_Filesystem($c['twig.path']);
        });

        $this['twig.environment_factory'] = $this->protect(function ($c) {
            return new \Twig_Environment($c['twig.loader'], $c['twig.options']);
        });

        $this['component_loader'] = $this->share(function ($c) {
            return new ComponentLoader($this->core->context);
        });

        $this['url_generator'] = $this->share(function ($c) {
            return $c['router']->getGenerator();
        });

        $this['alternate_link_generator'] = $this->share(function ($c) {
            return new AlternateLinkGenerator($c['host_resolver'], $c['router_resolver'], $c['sdk']);
        });

        $this['host_resolver'] = $this->share(function ($c) {
            $hostsCountries = (array) $this->core->context->config->custom->i18n->host_country;
            $hostsLocales = (array) $this->core->context->config->custom->i18n->host_locale;
            $hostsTimezones = (array) $this->core->context->config->custom->i18n->host_timezone;
            $hostsKeys = (array) $this->core->context->config->custom->i18n->host_key;

            $dotTvHost = $this->core->context->config->custom->i18n->dot_tv_host;
            $dotFrHost = $this->core->context->config->custom->i18n->dot_fr_host;

            return new HostResolver($hostsCountries, $hostsLocales, $hostsTimezones, $hostsKeys, $dotTvHost, $dotFrHost);
        });

        $this['router_resolver'] = $this->share(function ($c) {
            $filesByHost = (array) $this->core->context->config->custom->routing->route_filename;

            return new RouterResolver($c['app.config_dir'], $filesByHost, $c['host_resolver'], $this->core->context->config->path->cache.'routing');
        });

        $this['sitemap_resolver'] = $this->share(function ($c) {
            $pathsByHost = (array) $this->core->context->config->custom->sitemap->paths;

            return new SitemapResolver($pathsByHost);
        });

        $this['twig'] = $this->share(function ($c) {
            $twig = $c['twig.environment_factory']($c);

            $twig->addExtension(new \Twig_Extensions_Extension_Text());
            $twig->addExtension(new TranslationExtension($c['translator']));
            $twig->addExtension(new \PlayTv\Twig\IntlExtension());
            $twig->addExtension(new \PlayTv\Twig\Extension($c['translator']));
            if ($twig->isDebug()) {
                $twig->addExtension(new \Twig_Extension_Debug());
            }

            if ('cli' === PHP_SAPI) {
                // When used via CLI, url_generator is not available.
                // We register a stub function for "path" & "url" to avoid Twig syntax errors.
                $twig->registerUndefinedFunctionCallback(function ($name) {
                    if (in_array($name, ['path', 'url'])) {
                        return new \Twig_SimpleFunction($name, function () {
                            return '#';
                        });
                    }
                });
            } else {
                $twig->addExtension(new \PlayTv\Twig\RoutingExtension($c['router']));
            }

            return $twig;
        });

        // contains Websites for which we need to apply restrictions when associated to Channel
        $this['websites'] = $this->share(function ($c) {
            $websites = [];

            $host = $c['host_resolver']->getHostForCountry('GB');
            $key = $c['host_resolver']->getKeyForHost($host);

            $websites['GB'] = new Website($key, $host, 'GB');

            return $websites;
        });

        // override
        $this['sdk']['services.channel'] = $this['sdk']->share($this['sdk']->extend('services.channel', function ($channelComponent, $c) {

            $channelComponent = new \Playmedia\Component\WebsiteAwareChannel(
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
                ->setChannelReplayTv($c['services.channel.replay_tv']->getReplaysChannel());

            foreach ($this['websites'] as $website) {
                $channelComponent->addWebsite($website);
            }

            return $channelComponent;
        }));

        //
        // Domain Driven
        //
        $this['core.channel.channel_manager'] = $this->share(function ($c) {
            return new ChannelManager(
                $c['sdk']['database'],
                $c['caching.default'],
                $c['websites']
            );
        });

        //
        // Exclude France Television channels ids bc of court decisions
        // key/value for better performance
        //
        $this['france_television'] = [
            2 => true,
            3 => true,
            4 => true,
            5 => true,
            6 => true,
            9 => true, // Exclude Arte (SK: 2019-12-13)
        ];

        // Store container in globals to be retrieved in app_controller
        $globals = $this->phplay->core->context->get_globals();
        $globals->set('container', $this);
    }

    public function isI18n()
    {
        return getenv('APP_ENV_I18N');
    }

    public function setLocale($locale)
    {
        $this['locale'] = $locale;
        if ($this->phplay->isBooted()) {
            $this['sdk']->setLocale($locale);
        }
    }

    public function getLocale()
    {
        return $this['locale'];
    }

    public function getLocales()
    {
        $caching = $this['caching.default'];
        $cacheKey = 'app:locales';

        if (!$locales = $caching->get($cacheKey)) {
            $locales = array_map('basename', glob($this['app.locales_dir'].'/*', GLOB_ONLYDIR));

            $caching->set($cacheKey, $locales, 3600);
        }

        return $locales;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        return $this['kernel']->handle($request, $type, $catch);
    }

    public function run()
    {
        $this->boot();

        $this['component.app'] = $this->share(function ($c) {
            // Create app_component with $setup_hosts = true
            return $c['component_loader']->load('app', false, true, false, false);
        });

        $this['component.partners'] = $this->share(function ($c) {
            return $c['component_loader']->load('partners');
        });

        $this['dispatcher'] = $this->share(function ($c) {

            $dispatcher = new EventDispatcher();

            // KernelEvents::REQUEST
            $dispatcher->addSubscriber(new RouterListener($c['router']));
            // SK: 2019-12-27 - disable Wibox http redirects
            //$dispatcher->addSubscriber(new WiboxListener($c['component.partners'], $c['component.app']->get_hosts('wibox_full')));

            // KernelEvents::CONTROLLER
            $dispatcher->addSubscriber(new BeforeActionListener());
            $dispatcher->addSubscriber(new AdblockerListener($c['resolver']));
            $dispatcher->addSubscriber(new WebsiteAttributeListener($c['host_resolver'], $c['sdk']));
            $dispatcher->addSubscriber(new ChannelAttributeListener($c['core.channel.channel_manager']));
            $dispatcher->addSubscriber(new BelongsToWebsiteListener());
            $dispatcher->addSubscriber(new NotifierWebsiteListener($c['host_resolver'], $c['alternate_link_generator']));

            // KernelEvents::VIEW
            $dispatcher->addSubscriber(new ForwardResponseListener());
            $dispatcher->addSubscriber(new StringToResponseListener());
            $dispatcher->addSubscriber(new NullResponseListener($this->core));

            // KernelEvents::RESPONSE
            $dispatcher->addSubscriber(new OverwriteResponseListener($this->core));
            $dispatcher->addSubscriber(new CustomResponseHeadersListener());

            // KernelEvents::CONTROLLER
            // KernelEvents::RESPONSE
            $dispatcher->addSubscriber(new ExceptionListener('errors_controller::exception_action'));

            return $dispatcher;
        });

        $this['resolver'] = $this->share(function ($c) {
            return new ControllerResolver($this->core);
        });

        $this['kernel'] = $this->share(function ($c) {
            return new HttpKernel($c['dispatcher'], $c['resolver']);
        });

        $legacyRequest = new \ppl_request($this->core->context->config);

        $this->core->context->request = $request = new RequestAdapter($legacyRequest);
        $this->core->context->response = new ResponseAdapter();
        $this->core->context->session = new \ppl_session($this->core->context->config, $legacyRequest);

        $this['router'] = $this->share(function ($c) use ($request) {
            return $c['router_resolver']->getRouter($request->getHost(), $request);
        });

        $response = $this->handle($request);
        $response->prepare($request);
        $response->send();

        $this['kernel']->terminate($request, $response);
    }
}
