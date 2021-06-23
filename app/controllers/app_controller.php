<?php

use Playmedia\Sdk;
use Playmedia\Utils\Intl as IntlUtils;
use Playmedia\Component\BroadcastTimezone;
use Playmedia\Program\Broadcast\DaypartFactoryGb;
use Playmedia\Api\Client as ApiClient;
use Playmedia\Api\Serializer as ApiSerializer;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Routing;
use PlayTv\Live\ParametersFactory;
use PlayTv\Product\Formatter as ProductFormatter;
use PlayTv\Sales\ChannelProductResolver;
use PlayTv\Sales\CellpassUtils;
use PlayTv\Sales\PaymentGatewayResolver;
use PlayTv\Core\Website;
use PlayTv\Core\Channel\Channel;
use PlayTv\Core\Serializer as CoreSerializer;
use PlayTv\Core\Normalizer as CoreNormalizer;
use PlayTv\Utils\Feature;
use PlayTv\Twig\FeatureExtension;
use PHPlay\Forward;
use Monolog\Logger;
use Monolog\Handler;
use Monolog\Registry;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

/**
 * All controllers may extend this application main controller.
 *
 * @author PLAYMEDIA
 */
abstract class ppl_app_controller extends ppl_controller implements TranslatorInterface
{
    use PlayTv\WidgetableTrait;

    /**
     * The page headers default Values.
     *
     * @var array
     */
    protected $head = array(
        'meta' => array(
            'title' => 'Play TV',
            'description' => null,
            'keywords' => [],
        ),
        'alternate_urls' => [],
    );

    /**
     * The hosts root URIs.
     *
     * @var array
     */
    protected $hosts;

    /**
     * The mobiles root URIs.
     *
     * @var array
     */
    protected $mobiles;

    /**
     * The analytics configuration parameters
     * (Page tracking).
     *
     * @var array
     */
    protected $analytics;

    /**
     * Playmedia sdk.
     */
    protected $sdk;

    /**
     * The account component object instance.
     *
     * @var account_component
     */
    protected $account = null;

    /**
     * The tools component object instance.
     *
     * @var tools_component
     */
    protected $tools = null;

    /**
     * The app component object instance.
     *
     * @var app_component
     */
    protected $app = null;

    /**
     * The redirect component object instance.
     *
     * @var redirect_component
     */
    protected $redirect = null;

    /**
     * @var Pimple
     */
    protected $container;

    /**
     * @var string
     */
    protected $locale;

    protected function isDebug()
    {
        return $this->container['debug'];
    }

    protected function isSecure()
    {
        return $this->container['is_secure'];
    }

    protected function isMobileDevice()
    {
        return 'mobile' === $this->container['device'];
    }

    protected function hasMobileFriendly()
    {
        return $this->container['mobile_friendly'];
    }

    protected function isMobileLayout()
    {
        return $this->container['mobile_layout'];
    }

    protected function hasRequestedDesktopSite()
    {
        return $this->container['request_desktop_site'];
    }

    protected function resolveLocale()
    {
        if (preg_match('/^(uk|it|de|tr|pt|es)\.[a-z]+\.[a-z]+$/', $this->request->host, $matches)) {
            $country = $matches[1];

            return $country == 'uk' ? 'en_GB' : $country;
        }

        return $this->container->getLocale();
    }

    protected function getLocales()
    {
        return array_filter($this->container['locales'], function ($locale) {
            return 'fr' !== $locale;
        });
    }

    /**
     * @TODO implement a file dumper
     */
    protected function getLanguages()
    {
        $caching = $this->container['caching.default'];
        $cacheKey = 'app:available_languages';

        if (!$languages = $caching->get($cacheKey)) {
            $languages = [];
            foreach ($this->getLocales() as $locale) {
                $languages[$locale] = IntlUtils::getLanguageName($locale, $locale);
            }
            $caching->set($cacheKey, $languages, 3600);
        }

        return $languages;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
        $this->container->setLocale($locale);

        \Locale::setDefault($locale);

        $lcTime = sprintf('%s_%s.utf8', $locale, strtoupper($locale));
        if (false !== strpos($locale, '_')) {
            $lcTime = $locale;
        }
        setlocale(LC_TIME, $lcTime);

        $this->request->attributes->set('_locale', $locale);

        return $this;
    }

    public function trans($id, array $parameters = array(), $domain = null, $locale = null)
    {
        return $this->container['translator']->trans($id, $parameters, $domain, $locale);
    }

    public function transChoice($id, $number, array $parameters = array(), $domain = null, $locale = null)
    {
        return $this->container['translator']->transChoice($id, $number, $parameters, $domain, $locale);
    }

    protected function getCountrySlugs($locale = 'fr_FR')
    {
        $caching = $this->container['caching.default'];
        $cacheKey = 'app:country_filter_slugs_'.strtolower($locale);

        if (!($countries = $caching->get($cacheKey))) {
            $_tools = $this->load('tools');

            $countries = [];
            foreach (IntlUtils::getCountries($locale) as $code => $name) {
                $countries[$code] = $_tools->permalink($name);
            }

            $caching->set($cacheKey, $countries, 84600);
        }

        return $countries;
    }

    protected function getCountryCodeBySlug($slug, $locale = 'fr_FR')
    {
        $slugs = array_flip($this->getCountrySlugs($locale));

        return isset($slugs[$slug]) ? $slugs[$slug] : null;
    }

    public function getSdk()
    {
        return $this->container['sdk'];
    }

    public function initialize()
    {
        // Grab container, warmup dependencies manually
        $this->container = $this->globals->get('container');

        // Setup parameters
        $this->hosts = $this->app()->get_hosts();
        $this->analytics = $this->app()->get_analytics();

        // Override app values
        $this->setLocale($this->resolveLocale());

        // Services
        $this->container['product.formatter'] = $this->container->share(function ($c) {
            return new ProductFormatter(
                $this->getSdk()['services.product'],
                $c['core.mosaic.mosaic_manager'],
                $this->getSdk()['services.channel']->collection(),
                $c['country_code']
            );
        });

        $this->container['sales.channel_product_resolver'] = $this->container->share(function ($c) {
            return new ChannelProductResolver($c['sdk']['product.matrix'], $c['sdk']['product.free']);
        });

        $this->container['sales.cellpass_utils'] = $this->container->share(function ($c) {
            return new CellpassUtils($this->getSdk()->getApi());
        });

        $this->container['sales.payment.gateway_resolver'] = $this->container->share(function ($c) {
            return new PaymentGatewayResolver($c['country_code'], $c['sales.cellpass_utils']);
        });

        $this->container['sales.paypal.api_context'] = $this->container->share(function ($c) {
            $paypal = $this->getSdk()->getApi()->config()->get(['key' => 'paypal']);

            $apiContext = new ApiContext(
                new OAuthTokenCredential(
                    $paypal['client_id'],
                    $paypal['client_secret']
                )
            );
            $apiContext->setConfig([
                'mode' => $paypal['mode'],
            ]);

            return $apiContext;
        });

        // Web application specific
        $this->container['is_secure'] = ('https' === $this->request->protocol) ? true : false;
        $this->container['country_code'] = (null !== $this->request->get_client()->get_country_code()) ? $this->request->get_client()->get_country_code() : 'FR';
        $this->container['sdk_country_code'] = $this->container->share(function ($c) { // business logic to be moved into API
            $franceArray = array(
                'MC', // MONACO
                'CH', // SUISSE
                'GP', // GUADELOUPE
                'GF', // GUYANE
                'MQ', // MARTINIQUE
                'RE', // REUNION
                'YT', // MAYOTTE
                'PF', // POLYNESIE
                'BL', // SAINT BARTHELEMY
                'MF', // SAINT MARTIN
                'PM', // SAINT PIERRE ET MIQUELON
                'WF', // WALLIS ET FUTUNA
                'NC', // NOUVELLE CALEDONIE
            );

            $countryCode = $c['country_code'];
            if (in_array($c['country_code'], $franceArray)) {
                $countryCode = 'FR';
            }

            return $c['host_resolver']->getFixedCountryCodeForHost($this->request->host, $countryCode);
        });
        $this->container['language'] = $this->request->get_client()->get_language() ?: 'fr';
        $this->container['skin'] = 'default';
        $this->container['controller_name'] = $this->_name();
        $this->container['action_name'] = $this->_action();
        $this->container['route_name'] = $this->request->attributes->get('_route');
        $this->container['bundle_name'] = $this->request->attributes->get('bundle');

        // Multi apps related detections
        $this->container['is_website_default'] = $this->container['host_resolver']->isDotTv($this->request->getHost(), true);
        $this->container['is_website_fr'] = $this->container['host_resolver']->isDotFr($this->request->getHost(), true);
        $this->container['is_website_uk'] = $this->request->getHost() === $this->container['host_resolver']->getHostForCountry('GB');

        // Devices and related detections
        $this->container['device'] = 'full';
        $this->container['request_desktop_site'] = false;

        $template_file = $this->defaultTemplateFile();
        $this->mobileFriendlyTemplateFile($template_file);
        $this->container['mobile_friendly'] = $this->container['twig.loader']->exists($template_file);
        $this->container['mobile_layout'] = false;

        $this->request->attributes->set('mobile_friendly', $this->container['mobile_friendly']);

        // Playmedia CDN
        $this->container['static_base_url'] = $this->container['sdk']['external.parameters']['playmedia.cdn']['static_url'];
        $this->container['apps_base_url'] = $this->container['sdk']['playmedia.cdn_resolver']('play-tv');
        $this->globals->set('static_base_url', $this->container['static_base_url']); // allow use within legacy components

        // App states depending on SDK
        $this->container['is_connected'] = $this->container->share(function ($c) {
            return $this->account()->is_connected();
        });
        $this->container['account'] = $this->container->share(function ($c) {
            return $c['is_connected'] ? $this->account()->get_current_account() : null;
        });

        // Customize SDK setup w/ app paramaters

        $this->container['sdk']
            ->setLanguage($this->container['language'])
            ->setClientIp($this->request->client_ip);

        $this->container['sdk']['services.channel']->setStreamsCollection(
            $this->container['sdk']['services.channel.stream']->collection($this->container['country_code'])
        );

        // Guzzle 6 API client
        $this->container['api_client'] = $this->container->share(function ($c) {
            return new ApiClient([
                'base_uri' => str_replace('/v1', '/', $this->getSdk()->getApi()->getBaseUrl()),
                'cache_memcached' => $c['caching.desktop'],
            ]);
        });

        $this->container['api_serializer'] = $this->container->share(function ($c) {
            return new ApiSerializer($c['api_client']);
        });

        $this->container['static_url_generator'] = $this->container->share(function ($c) {
            $requestContext = new Routing\RequestContext();
            $requestContext->setHost(str_replace('https://', '', $c['static_base_url']));
            $requestContext->setScheme('https');

            $routeCollection = new Routing\RouteCollection();
            $routeCollection->add('channel_image', new Routing\Route('/img/tv_channels/{channel_id}_{format}.png'));
            $routeCollection->add('program_image', new Routing\Route('/img/tv_programs/{image_dir}/{image_id}_{format}.jpg'));
            $routeCollection->add('featured_program_image', new Routing\Route('/img/tv_featured/{image_dir}/{image_id}_{format}.jpg'));

            return new Routing\Generator\UrlGenerator($routeCollection, $requestContext);
        });

        $this->container['core_normalizer.replay'] = $this->container->share(function ($c) {
            return new CoreNormalizer\ReplayNormalizer(
                $c['url_generator'],
                $c['static_url_generator'],
                $this->getSdk()['services.channel'],
                $this->getSdk()['services.group'],
                $this->getSdk()['services.program']
            );
        });

        $this->container['core_serializer'] = $this->container->share(function ($c) {
            return new CoreSerializer([
                $this->container['core_normalizer.replay'],
            ]);
        });

        // Featured broadcasts
        $this->container['broadcasts.featured'] = $this->container->share(function ($c) {
            $mosaic = $c['core.mosaic.mosaic_manager']->getMosaic($c['country_code'])->toArray();
            $broadcasts = $this->getSdk()['services.broadcast']->getFeaturedBroadcast($mosaic);
            $now = date('Y-m-d H:i:s');

            return array_filter($broadcasts, function ($f) use ($now) {
                if ($f['start'] > $now) {
                    return $f;
                }
            });
        });

        $timezone = $this->container['host_resolver']->getTimezoneForHost($this->request->getHost());
        if ($timezone->getName() !== date_default_timezone_get()) {
            $this->getSdk()['services.broadcast'] = $this->getSdk()->share($this->getSdk()->extend('services.broadcast', function ($broadcastComponent, $c) use ($timezone) {
                $broadcastComponent = new BroadcastTimezone($c['database'], $c['caching'], $c['services.channel'], $c['services.program'], $timezone);
                $broadcastComponent->setDayPartFactory(new DaypartFactoryGb());

                return $broadcastComponent;
            }));
        }

        // player
        $this->container['live.parameters_factory'] = $this->container->share(function ($c) {
            return new ParametersFactory(
                $this->hosts['current_full'],
                $c['apps_base_url'],
                $c['locale'],
                $this->isMobileDevice(),
                $this->isI18n()
            );
        });

        $this->container['widget.manager'] = $this->container->share(function ($c) {
            return new \PlayTv\Widget\WidgetManager($c['api_client'], $this->getSdk()['services.channel']);
        });

        $this->container['core.mosaic.mosaic_manager'] = $this->container->share(function ($c) {
            return new \PlayTv\Core\Mosaic\MosaicManager(
                $this->getSdk()['services.channel']->collection(),
                $this->getSdk()['channel.product_resolver'],
                $this->container['websites'],
                $this->request->attributes->get('website'),
                $this->getSdk()['services.channel'],
                $this->getSdk()['services.channel.network'],
                $this->getSdk()['services.channel.replay_tv'],
                $this->getSdk()['services.channel.social_tv']->collection(),
                $this->logger('mosaic')
            );
        });

        // Define request_desktop_site, layout, tracking

        // Define skin
        if (isset($this->request->get['skin'])) {
            $this->set_skin($this->request->get['skin']);
        }
        // Override device
        // Wireless devices (cell phones or tablets) -> mobile; otherwise -> full
        if ($this->request->get_client()->is_mobile() || $this->request->get_client()->is_tablet()) {
            $this->container['device'] = 'mobile';
        }

        // If __pmd_request_desktop_mobile cookie set with '1' value, force full layout instead of mobile one if any
        if (true === $this->isMobileDevice() &&
            '1' === $this->cookie->get('__pmd_request_desktop_mobile')
        ) {
            $this->container['request_desktop_site'] = true;
        }

        // Requirements to display mobile layout
        // Display mobile layouts to cell phones only if mobile friendly template exists and no request_desktop_site cookie exists
        if (true === $this->request->get_client()->is_mobile() && false === $this->request->get_client()->is_tablet() &&
            true === $this->hasMobileFriendly() &&
            false === $this->hasRequestedDesktopSite()
        ) {
            $this->container['mobile_layout'] = true;
        }

        // Change GA upon layout
        // playtv.fr (mobile)
        if ($this->isMobileLayout()) {
            $this->analytics['ga'] = 'UA-20364866-15';
        }

        // play.tv
        if ($this->isI18n()) {
            $this->analytics['ga'] = 'UA-20364866-20';
        }

        // uk.play.tv
        if ($this->request->getHost() === $this->container['host_resolver']->getHostForCountry('GB')) {
            $this->analytics['ga'] = 'UA-20364866-21';
        }

        // NewRelic
        // $this->addNewRelicCustomParameter('isConnected', (bool) $this->container['is_connected']);
        // $this->addNewRelicCustomParameter('isMobileLayout', $this->isMobileLayout());
        // $this->addNewRelicCustomParameter('hasRequestedDesktopSite', $this->hasRequestedDesktopSite());
        // $this->addNewRelicCustomParameter('isI18N', (bool) $this->isI18n());

        // Customize Twig
        // Add imumutables variables that can be declared globally

        // App
        $this->container['twig']->addGlobal('app_env', $this->container['env']);
        $this->container['twig']->addGlobal('debug', $this->container['debug']);
        $this->container['twig']->addGlobal('locale', $this->container['locale']);
        $this->container['twig']->addGlobal('languages', $this->getLanguages());
        $this->container['twig']->addGlobal('device', $this->container['device']);
        $this->container['twig']->addGlobal('request_desktop_site', $this->container['request_desktop_site']);
        $this->container['twig']->addGlobal('is_secure', $this->container['is_secure']);
        $this->container['twig']->addGlobal('country', $this->container['country_code']);
        $this->container['twig']->addGlobal('is_ajax', $this->request->is_ajax);
        $this->container['twig']->addGlobal('hosts', $this->hosts);
        $this->container['twig']->addGlobal('static_base_url', $this->container['static_base_url']);
        $this->container['twig']->addGlobal('apps_base_url', $this->container['apps_base_url']);
        $this->container['twig']->addGlobal('domain', $this->request->current_domain);
        $this->container['twig']->addGlobal('external_apis', $this->container['sdk']['external.parameters']);
        $this->container['twig']->addGlobal('controller_name', $this->container['controller_name']);
        $this->container['twig']->addGlobal('action_name', $this->container['action_name']);
        $this->container['twig']->addGlobal('route_name', $this->container['route_name']);
        $this->container['twig']->addGlobal('bundle_name', $this->container['bundle_name']);
        $this->container['twig']->addGlobal('templates_dir', $this->container['app.templates_dir']);

        // Date, time and timezones
        $this->container['twig']->addGlobal('datetime', $this->globals->get('date.datetime')->format(DateTime::ISO8601));
        $this->container['twig']->addGlobal('now', $this->globals->get('date.now'));
        $this->container['twig']->addGlobal('timezone', date('Z', $this->globals->get('date.now')));

        // Request
        $this->container['twig']->addGlobal('request', $this->request);

        // Tracking
        $this->container['twig']->addGlobal('analytics', $this->analytics);

        // Account
        $this->container['twig']->addGlobal('is_connected', $this->container['is_connected']);
        $this->container['twig']->addGlobal('current_account', $this->container['account']);

        // Exclude France Television channels
        $this->container['twig']->addGlobal('france_television', $this->container['france_television']);

        // Country code is required for cookie consent banner.
        // Country code is set to 'FR' only if NOT production, because default behaviour is to NOT display banner if country not detected.
        $cc = $this->request->get_client()->get_country_code();
        if (empty($cc) && $this->container['env'] !== 'production') {
            $cc = 'FR';
        }
        $this->container['twig']->addGlobal('cookie_consent_cc', $cc);

        // Bundles feature
        $route_to_feature = [
            'account_profile' => Feature::ACCOUNT,
            // 'sales_plans' => Feature::SALES,
            'sales_noop' => Feature::SALES,
            'live_tweets_index' => Feature::SOCIAL_TV,
            'replay_tv_index' => Feature::CATCHUP_TV,
            'programmes_prime_a_ne_pas_manquer' => Feature::BROADCAST_HIGHLIGHTS,
            'aide_index' => Feature::SUPPORT,
            'faq_index' => Feature::FAQ,
            'toplive_index' => Feature::TOPLIVE,
        ];
        foreach ($route_to_feature as $route_name => $feature_name) {
            if (null !== $this->container['router']->getRouteCollection()->get($route_name)) {
                Feature::activate($feature_name);
            }
        }
        if (false === $this->container['twig']->hasExtension('playtv_feature')) {
            $this->container['twig']->addExtension(new FeatureExtension());
        }

        // Hosts feature
        $this->container['twig']->addGlobal('is_website_default', $this->container['is_website_default']);
        $this->container['twig']->addGlobal('is_website_fr', $this->container['is_website_fr']);
        $this->container['twig']->addGlobal('is_website_uk', $this->container['is_website_uk']);

        // Crowdfunding
        // $crowdfunding_display = $this->has_feature('sales') && (!$this->container['is_connected'] || !$this->container['account']->isSubscribedToProductOfType('prepaid'));
        // SK: 2016-07-05 - Disable bottombar-crowdfunding
        $crowdfunding_display = false;

        // if (!$this->has_feature('sales')) {
        //     $crowdfunding_iscapped = true;
        // } else {
        //     $crowdfunding_iscapped = (bool) '1' == $this->cookie->get('__pmd_crowdfunding_popin');
        // }
        $crowdfunding_iscapped = true; // no automatic crowdfunding popin triggered anymore
        $crowdfunding_open_popin = $crowdfunding_display && !$crowdfunding_iscapped;

        $this->container['twig']->addGlobal('crowdfunding_display', $crowdfunding_display);
        $this->container['twig']->addGlobal('crowdfunding_open_popin', $crowdfunding_open_popin);
        $this->container['twig']->addGlobal('crowdfunding_iscapped', $crowdfunding_iscapped);

        // Assets
        $rev_manifest_filename = "{$this->config->path->web}assets/rev-manifest.php";
        $assets = include $rev_manifest_filename;

        array_walk($assets['scripts'], function (&$value, $key, $userdata) {
            $value = "{$userdata['host']}/scripts/{$value}";
        }, array(
            'host' => $this->container['apps_base_url'],
        ));

        array_walk($assets['styles'], function (&$value, $key, $userdata) {
            $value = "{$userdata['host']}/styles/{$value}";
        }, array(
             'host' => $this->container['apps_base_url'],
        ));

        $this->container['twig']->addGlobal('assets', $assets);
    }

    /**
     * {@inheritdoc}
     */
    public function before_render()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function after_render()
    {
    }

    /**
     * On before action.
     * This action is executed before all controllers actions.
     *
     * WARNING : Please note that globals are setup in app component constructor
     *
     * @see ppl_controller::before_action()
     */
    public function before_action()
    {
    }

    /**
     * On after action.
     * This action is executed after all controllers actions.
     *
     * @deprecated this method is not called anymore since the app is based on HttpKernel
     * @see ppl_controller::before_action()
     */
    public function after_action()
    {
    }

    /**
     * Returns true if a feature is active on the current website.
     *
     * @param string $feature_name
     *
     * @return bool
     */
    protected function has_feature($feature_name)
    {
        return Feature::isActive($feature_name);
    }

    /**
     * Setup search engines indexation for current page.
     *
     * @param bool $enabled set to TRUE to enable search engine indexation
     */
    public function robots($enabled = true)
    {
        if (false === $enabled) {
            $robots = 'noindex';

            $this->head['robots'] = $robots;
            $this->response->set_header('X-Robots-Tag: '.$robots);
        }
    }

    /**
     * Set page title meta.
     *
     * @param string $title      The page title
     * @param bool   $add_suffix Indicates if suffix must be added
     */
    public function set_page_title($title, $add_suffix = true)
    {
        if ($add_suffix === true) {
            $title .= ' - Play TV';
        }
        $this->head['meta']['title'] = $title;
    }

    public function set_page_title_trans($id, array $parameters = array(), $add_suffix = true)
    {
        if (false === strpos($id, '.title')) {
            $id = "{$id}.title";
        }

        $value = $this->trans($id, $parameters, 'seo');
        if ($value !== $id) {
            $this->set_page_title($value, $add_suffix);
        }
    }

    /**
     * Set page description meta.
     *
     * @param string $description The page description
     */
    public function set_page_description($description)
    {
        if ($description !== '') {
            $this->head['meta']['description'] = $description;
        }
    }

    public function set_page_description_trans($id, array $parameters = array())
    {
        if (false === strpos($id, '.meta.description')) {
            $id = "{$id}.meta.description";
        }

        $value = $this->trans($id, $parameters, 'seo');
        if ($value !== $id) {
            $this->set_page_description($value);
        }
    }

    /**
     * Set page keywords meta.
     *
     * @param array $keywords The keywords list
     */
    public function set_page_keywords($keywords)
    {
        if (!is_array($keywords)) {
            $keywords = array_map('trim', explode(',', $keywords));
        }

        if (is_array($keywords) && count($keywords) > 0) {
            $this->head['meta']['keywords'] = array_merge($this->head['meta']['keywords'], $keywords);
        }
    }

    public function set_page_keywords_trans($id, array $parameters = array())
    {
        if (false === strpos($id, '.meta.keywords')) {
            $id = "{$id}.meta.keywords";
        }

        $value = $this->trans($id, $parameters, 'seo');
        if ($value !== $id) {
            $this->set_page_keywords($value);
        }
    }

    protected function alternate_urls($enabled = true)
    {
        if ($enabled) {
            $this->head['alternate_urls'] = $this->container['alternate_link_generator']->getLinks($this->request);
        } else {
            $this->head['alternate_urls'] = [];
        }
    }

    public function set_skin($skin)
    {
        if (in_array($skin, ['light', 'minimal'])) {
            $this->container['skin'] = $skin;
        }
    }

    /**
     * Output a JSON based reponse to the client.
     *
     * @param mixed $data       Data to output
     * @param int   $statusCode A valid status code
     */
    public function jsonResponse($data = null, $statusCode = 200)
    {
        if (null === $data) {
            $data = new \ArrayObject();
        }

        // Encode <, >, ', &, and " for RFC4627-compliant JSON, which may also be embedded into HTML.
        $responseData = json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);

        $this->response->set_status((int) $statusCode);

        // Define content type based on callback
        if (null !== ($callbackName = $this->getJSONPCallback())) {
            $this->response->set_content_type('text/javascript');
            $this->response->write(sprintf('%s(%s);', $callbackName, $responseData));
        } else {
            $this->response->set_content_type('application/json');
            $this->response->write($responseData);
        }
    }

    public function badRequestJsonResponse($data = null)
    {
        return $this->jsonResponse($data, 400);
    }

    public function notFoundJsonResponse($data = null)
    {
        return $this->jsonResponse($data, 404);
    }

    public function createNotFoundResponse()
    {
        return $this->forward('errors', 'not_found');
    }

    public function createGoneResponse()
    {
        return $this->forward('errors', 'gone');
    }

    /**
     * Check and validate a JSONP callback.
     *
     * @return mixed null | a valid string
     */
    private function getJSONPCallback()
    {
        $name = (isset($_GET['callback'])) ? $_GET['callback'] : null;
        if (null !== $name) {
            // taken from http://www.geekality.net/2011/08/03/valid-javascript-identifier/
            $pattern = '/^[$_\p{L}][$_\p{L}\p{Mn}\p{Mc}\p{Nd}\p{Pc}\x{200C}\x{200D}]*+$/u';
            $parts = explode('.', $name);
            foreach ($parts as $part) {
                if (!preg_match($pattern, $part)) {
                    return;
                }
            }
        }

        return $name;
    }

    /**
     * Get account component object instance.
     *
     * @return account_component The account object instance
     */
    public function account()
    {
        if ($this->account === null) {
            $this->account = $this->load('account', $this->getSdk()->getApi());
        }

        return $this->account;
    }

    /**
     * Get app component object instance.
     *
     * @return app_component The app object instance
     */
    public function app()
    {
        if (is_null($this->app)) {
            $this->app = $this->load('app');
        }

        return $this->app;
    }

    /**
     * Get tools component object instance.
     *
     * @return tools_component The tools object instance
     */
    public function tools()
    {
        if ($this->tools === null) {
            $this->tools = $this->load('tools');
        }

        return $this->tools;
    }

    public function isI18n()
    {
        return $this->container->isI18n();
    }

    /**
     * @param mixed  $date
     * @param string $dateFormat
     * @param string $timeFormat
     */
    protected function localized_date($date, $dateFormat = 'medium', $timeFormat = 'medium')
    {
        if (!$date instanceof \DateTime) {
            if (is_numeric($date)) {
                $dateTime = new \DateTime();
                $dateTime->setTimestamp($date);
                $date = $dateTime;
            } elseif (is_string($date)) {
                $date = new \DateTime($date);
            } else {
                return '';
            }
        }

        // Borrowed from Twig\Extensions\Extension\Intl
        $formatValues = array(
            'none' => \IntlDateFormatter::NONE,
            'short' => \IntlDateFormatter::SHORT,
            'medium' => \IntlDateFormatter::MEDIUM,
            'long' => \IntlDateFormatter::LONG,
            'full' => \IntlDateFormatter::FULL,
        );

        // calendar=gregorian is supported ATM
        $formatter = \IntlDateFormatter::create(
            $this->container['locale'],
            $formatValues[$dateFormat],
            $formatValues[$timeFormat],
            $date->getTimezone()->getName(),
            \IntlDateFormatter::GREGORIAN
        );

        return $formatter->format($date->getTimestamp());
    }

    protected function render(array $context = [], $template_file = '')
    {
        $this->resolveTemplateFile($template_file);

        // Add mutables variables that can't be declared globally bc pimple singleton alike feature
        $context = array_merge([
            'head' => $this->head,
            'skin' => $this->container['skin'],
            'layout' => $this->isMobileLayout() ? 'mobile' : 'default',
            'current_url' => sprintf('%s%s', $this->hosts['current_full'], $this->request->uri),
            'canonical_url' => '',
            'display_ads' => $this->app()->adverts_are_visible(),
            'show_skin_ad' => $this->app()->ad_skin_is_visible(),
            'display_inflow_popin' => $this->app()->inflow_popin_is_visible(),
            'notifier_website' => $this->request->attributes->get('notifier_website'),
        ], $context);

        return $this->container['twig']->render($template_file, $context);
    }

    protected function normalizeTemplateFile(&$template_file)
    {
        $template_file = str_replace('_', '-', $template_file);
    }

    protected function defaultTemplateFile()
    {
        $template_file = "controllers/{$this->_name()}/{$this->_action()}.twig";
        $this->normalizeTemplateFile($template_file);

        return $template_file;
    }

    protected function mobileFriendlyTemplateFile(&$template_file)
    {
        $template_file = str_replace('.twig', '_mobile.twig', $template_file);
    }

    protected function resolveTemplateFile(&$template_file)
    {
        // Do nothing if provided, leave "as is"
        if (!empty($template_file)) {
            return;
        }

        // Full (default) processing
        $template_file = $this->defaultTemplateFile();

        // Mobile processing
        if (true === $this->isMobileLayout()) {
            $mobile_template_file = $template_file;
            $this->mobileFriendlyTemplateFile($mobile_template_file);

            $template_file = $mobile_template_file;
        }
    }

    public function forward($controller, $action = null, $params = null, $http_code = null)
    {
        return new Forward($controller, $action, $params ?: array());
    }

    /**
     * @param string $name
     *
     * @return Monolog\Logger
     */
    protected function logger($name)
    {
        if (Registry::hasLogger($name)) {
            return Registry::getInstance($name);
        }

        $streamHandler = new Handler\StreamHandler(realpath($this->container['app.log_dir'])."/{$name}.log", Logger::INFO);
        $bufferHandler = new Handler\BufferHandler($streamHandler, 10, Logger::INFO, true, true);

        $logger = new Logger($name);
        $logger->pushHandler($bufferHandler);

        Registry::addLogger($logger);

        return $logger;
    }

    /**
     * Checks if an Uniroll ad campaign matches current user criteria.
     *
     * @param string $zoneUid   The zone unique identifier
     * @param int    $channelId The channel id
     *
     * @return array The Uniroll ad player configuration
     */
    public function checkUnirollAdCampaign($zoneUid, $channelId = 0)
    {
        // Get current domain
        $domain = $this->request->getHost();

        // Get current user ip address
        // $this->request->getClientIp() does not return the "true" public ip
        // Using legacy ppl_request->client_ip
        $ip = $this->request->client_ip;

        // Get current user account id
        $account = $this->container['account'];
        $accountId = $account === null ? 0 : $account->getId();

        // Build Uniroll "check" query parameters
        $apiCheckArgs = [
            'domain' => $domain,
            'userIp' => $ip,
            'zoneUid' => $zoneUid,
            'accountId' => $accountId,
            'channelId' => $channelId,
            'isSecure' => 1, // Enable HTTPS
        ];

        // Default ad player configuration is an empty "no ad" response
        $config = $this->unirollDefaultConfig($zoneUid);

        try {
            // Performs API query
            $response = $this->container['api_client']->get(
                '/uniroll/check/',
                ['query' => $apiCheckArgs]
            );

            // Get and verify unserialized API response
            $response = $response->getBody()->unserialize();
            if (isset($response['config'])) {
                $config = $response['config'];
            } else {
                throw new Exception(sprintf(
                    "Missing 'config' key in Uniroll check api response. Args: %s",
                    json_encode($apiCheckArgs)
                ));
            }
        } catch (Exception $e) {
            $this->logger('uniroll')->error($e->getMessage());
        }

        // Add debug cookie configuration (if exists)
        $config = array_merge($config, $this->readUnirollCookieConfig());

        return $config;
    }

    /**
     * Get Uniroll default ad player configuration.
     *
     * @param string $zoneUid   The zone unique identifier
     *
     * @return array The Uniroll ad player configuration
     */
    public function unirollDefaultConfig($zoneUid)
    {
        // Default ad player configuration is an empty "no ad" response
        return [
            'flashUrl' => 'Error',
            'requestUrl' => 'Error',
            'version' => '0.0.0',
            'requestParams' => null,
            'zoneUid' => $zoneUid,
        ];
    }

    /**
     * Get Uniroll "no ad" configuration.
     * (used for trailer on mobile devices)
     *
     * @param string $zoneUid   The zone unique identifier
     *
     * @return array The Uniroll ad player configuration
     */
    public function unirollNoAd($zoneUid)
    {
        $config = $this->unirollDefaultConfig($zoneUid);

        // With debug cookie configuration (if exists)
        return array_merge($config, $this->readUnirollCookieConfig());
    }

    /**
     * Read Uniroll debug cookie configuration.
     *
     * Uniroll javascript library is served on .playmedia-cdn.net (sub)domain.
     * Therefore, the javascript can't read cookie set on playtv.* domain.
     *
     * @return array the Uniroll debug configuration
     */
    protected function readUnirollCookieConfig()
    {
        $debugConfig = [
            'forceHtmlVideo' => true, // 2017-04-21 : Force HTML5 by default.
        ];

        $debugCookie = $this->request->cookies->get('__urcc_');

        if ($debugCookie === null) {
            return $debugConfig;
        }

        // Cookie content is base 64 encoded JSON array
        $debugCookie = json_decode(base64_decode($debugCookie), true);

        if (!is_array($debugCookie)) {
            return $debugConfig;
        }

        // Check if 'debug' parameter is set
        if (isset($debugCookie['debug']) && $debugCookie['debug'] === true) {
            $debugConfig['debug'] = true;
        }

        // Check if 'io' parameter is set
        if (isset($debugCookie['io']) && $debugCookie['io'] !== false) {
            $debugConfig['io'] = $debugCookie['io'];
        }

        // Check if 'forceHtmlVideo' parameter is set
        if (isset($debugCookie['forceHtmlVideo']) && $debugCookie['forceHtmlVideo'] === true) {
            $debugConfig['forceHtmlVideo'] = true;
        }

        return $debugConfig;
    }

    /**
     * Converts Uniads zone identifier to Uniroll zone identifier.
     *
     * @param string $uid The Uniads zone identifier
     *
     * @return string The Uniroll zone identifier
     */
    public function convertZoneUid($uid)
    {
        $zoneMap = [
            'desktop.preroll' => 'prerolllivetv',
            'desktop.replay' => 'inflowreplay',
            'desktop.trailer' => 'prerolltrailerplaytv',
            'play-tv-uk.preroll' => 'prerollliveplaytvuk',
            'play-tv-uk.inflow' => 'inflowplaytvuk',
        ];

        // First check in zone mapping array
        if (isset($zoneMap[$uid])) {
            return $zoneMap[$uid];
        }

        // Otherwise transform expected 'site.type' format,
        // where type equals 'preroll' or 'inflow'
        $a = explode('.', $uid);
        if (count($a) !== 2) {
            return $uid;
        }
        list($site, $type) = $a;

        if ($type === 'preroll') {
            $type = 'prerolllive';
        }

        return $type.$site;
    }
}
