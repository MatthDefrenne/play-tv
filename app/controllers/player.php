<?php

use PlayTv\Core\Channel\Channel;
use PlayTv\Utils\Product as ProductUtils;
use PlayTv\Utils\Channel as ChannelUtils;
use Playmedia\Component\Channel as ChannelComponent;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;

/**
 * Controller used to interact with player.
 *
 * @author PLAYMEDIA
 */
class player_controller extends ppl_app_controller
{
    public function embed_action($channel_alias, Request $request)
    {
        // requirements
        $content_type = 'html';
        $mode = 'embeddable';
        $flag = '';
        $site = '';
        $context = [];

        if ($request->isXmlHttpRequest()) {
            $content_type = 'json';
        }

        // When called from /television/zapping/
        if ($request->query->has('zapping') && $request->query->getBoolean('zapping')) {
            $mode = 'default';
            $content_type = 'json';
            $flag = 'zapping';
        }
        if ($request->query->has('webapp') && $request->query->getBoolean('webapp')) {
            $mode = 'default';
            $flag = 'webapp';
        }
        if ($request->query->has('popup') && $request->query->getBoolean('popup')) {
            $mode = 'default';
            $flag = 'popup';
        }
        if ($request->query->has('site') && '' !== $request->query->get('site')) {
            $site = $request->query->get('site');
        }

        // Required to control the inclusion of "partials/ads-ga-player.twig" view
        // See also the "controllers/player/embed.twig" view
        $context['display_ads'] = $this->app()->adverts_are_visible();

        // hand to hand
        $context['mode'] = $mode;
        $context['flag'] = $flag;
        $context['content_type'] = $content_type;
        $context['site'] = $site;

        // channel exists check
        $channelArray = $this->getSdk()['services.channel']->show($channel_alias);
        if (null === $channelArray) {
            $context['state'] = 'not-found';

            return $this->view_handler($context);
        }

        $country_code = $this->container['country_code'];
        $account = $this->container['account'];

        $channelArray = ChannelComponent::getStreamingKeys($channelArray, $country_code, $account);
        $channelArray['is_radio'] = ChannelUtils::isRadio($channelArray);
        $context['channel'] = $channelArray;

        // streaming incapacity check
        if (false === $channelArray['streamable']) {
            $context['state'] = 'not-streamable';

            return $this->view_handler($context);
        }

        // exclude France Television channels
        $channelId = $channelArray['id'];
        if (isset($this->container['france_television'][$channelId])) {
            $context['state'] = 'not-streamable';

            return $this->view_handler($context);
        }

        // SK: 2017-07-05 - exclude pay to view channels
        if (in_array($channelId, [
            847, // Hot Video
            856, // KZTV
            724, // Ginx TV
        ])) {
            $context['state'] = 'not-streamable';

            return $this->view_handler($context);
        }

        // SK: 2019-11-19 - geolocation hotfix
        $countryCode = mb_strtoupper($request->headers->get('x-geoip-country-code'));
        if (in_array($countryCode, [
            'FR',
            'MA',
        ]) && in_array($channelId, [
            76, // 2M Maroc
        ])) {
            $context['state'] = 'not-streamable';

            return $this->view_handler($context);
        }

        // external streaming capacity check
        if ('external' === $channelArray['streaming_source']) {
            switch ($channelArray['streaming_spec']) {
                case 'iframe':
                    $context['state'] = 'external-iframe';

                    $live_parameters = $this->container['live.parameters_factory']->get('externalIframe', ['channel' => $channelArray]);

                    if ($this->container['is_website_uk']) {
                        $live_parameters->setAds('play-tv-uk', 'inflow');
                    }
                    if ('' !== $site) {
                        $live_parameters->setAds($site, 'inflow');
                    } else {
                        // externalIframe default app. zone is 'desktop.replay' because of setOnePrerollAds() call.
                        // Some other part of code may rely on default value in PlayTv\Live\Parameters\AbstractParameters class.
                        // Change zone UID here to avoid unexpected behaviours.
                        if ($this->container['is_website_default']) {
                            // Set zoneUID to 'prerollliveplaytvuk' if play.* domain (uk.play.* does not exists anymore)
                            $live_parameters->setAds('play-tv-uk', 'preroll');
                        } else {
                            $live_parameters->setAds('desktop', 'preroll');
                        }
                    }

                    $context['live_parameters'] = $live_parameters;

                    return $this->view_handler($context);
                    break;

                case 'website':
                    $context['state'] = 'external-live';

                    return $this->view_handler($context);
                    break;

                // not expected case
                case 'stream':
                case 'wse':
                default:
                    throw new \InvalidArgumentException('Unexpected streaming_spec value "{$channelArray[\'streaming_spec\']}"');
                    break;
            }
        }

        // account subscribed to channel check
        if (false === $channelArray['stream_access']['account']) {
            $products = $this->getSdk()['channel.product_resolver']->getProducts($channelArray);
            $products_by_type = ProductUtils::groupByType($products);

            if (count($products_by_type['retail']) > 0) {
                $tmp_product = $products_by_type['retail'][0];
            } else {
                $tmp_product = $products_by_type['pack'][0];
            }

            $trial_period_days = $this->getSdk()->getApi()->config()->get(['key' => 'sales.trial_period_days']);
            $product = $this->container['product.formatter']->show($tmp_product['alias']);

            $context['state'] = 'not-subscribed';
            $context['trial_period_days'] = $trial_period_days;
            $context['product'] = $product;

            return $this->view_handler($context);
        }

        // embeddable blacklisted channels
        // embeddable channel requiring authentication
        if ('embeddable' === $mode) {
            $blacklisted_channels = [
                'i-tele' => 'i-tele',
            ];

            if (true === isset($blacklisted_channels[$channel_alias])) {
                $context['state'] = 'not-embeddable';

                return $this->view_handler($context);
            }
        }
        if ('embeddable' === $mode) {
            if (true === (bool) $channelArray['require_login'] && null === $account) {
                $context['state'] = 'not-embeddable';

                return $this->view_handler($context);
            }
        }

        // avaibility check
        if (null !== $channelArray['availability'] &&
            null !== $channelArray['availability']['from'] &&
            null !== $channelArray['availability']['to']
        ) {
            if (false == (ChannelUtils::isAvailable(
                    $channelArray['availability']['from'],
                    $channelArray['availability']['to'])
                )) {
                $diff = ChannelUtils::nextAvaibility($channelArray['availability']['from']);

                $context['state'] = 'not-available';
                $context['diff'] = $diff;

                return $this->view_handler($context);
            }
        }

        // otherwise, channel is streamable
        $context['state'] = 'streamable';

        $live_parameters = $this->container['live.parameters_factory']->get('player', ['channel' => $channelArray, 'mode' => $mode]);

        // Skip ads alias
        $picked_product = $this->getSdk()['channel.product_resolver']->pickProduct($channelArray);
        $skip_ads_product = [
            'alias' => $picked_product['alias'],
            'url' => "{$this->hosts['current_full']}/nos-offres/{$picked_product['alias']}/",
        ];

        // Products
        $product_resolver = $this->getSdk()['channel.product_resolver'];
        $products = $product_resolver->getProducts($channelArray, $account);

        $live_parameters
            ->setSkipAdsProduct($skip_ads_product)
            ->setProducts($products)
        ;

        if ($this->container['is_website_uk']) {
            $live_parameters->setAds('play-tv-uk', 'preroll');
        }
        if ('' !== $site) {
            $live_parameters->setAds($site, 'preroll');
        }

        if ($this->container['is_website_default']) {
            // Set zoneUID to 'prerollliveplaytvuk' if play.* domain (uk.play.* does not exists anymore)
            $live_parameters->setAds('play-tv-uk', 'preroll');
        }

        // Progress
        if ($channelArray['has_programs']) {
            $broadcast = $this->getSdk()['services.broadcast']->getLiveBroadcastByChannel($channelArray['channel_id']);
            $live_parameters->setBroadcast($broadcast);
        }

        $route_params = ChannelUtils::getRouteParameters(
            $this->container['router']->getRouteCollection()->get('television_channel_single'),
            $channelArray
        );
        $live_parameters
            ->setLinkTo($this->container['url_generator']->generate('television_channel_single', $route_params, UrlGeneratorInterface::ABSOLUTE_URL))
            ->setUrl('popup', $this->container['url_generator']->generate('television_channel_single', array_merge($route_params, ['popup' => 1]), UrlGeneratorInterface::ABSOLUTE_URL));

        // Configure player "stop" ad banner
        $displayAds = $this->container['device'] !== 'mobile'
            && $context['display_ads'] === true
            && ($this->container['is_connected'] === false || ($this->container['is_connected'] === true && $this->container['account']->isPremium() === false));

        $live_parameters->setAdBanner([
            'displayAds' => $displayAds,
            'buttonText' => $this->trans('stop_ad_banner_button', ['%channel%' => $channelArray['name']], 'player'),
        ]);

        $context['live_parameters'] = $live_parameters;

        return $this->view_handler($context);
    }

    /**
     * Player requirements.
     *
     * @param string  $channel_alias
     * @param Channel $channel
     */
    public function initialize_action($channel_alias, Channel $channel)
    {
        $this->robots(false);

        // full channel entity anyway bc of extented needs in parameters_factory
        $channelArray = $this->getSdk()['services.channel']->show($channel->getId());
        $channelArray['is_radio'] = ChannelUtils::isRadio($channelArray);

        $streams = $this->getSdk()->getApi()->streams()->getStreamsByChannel(
            $channel->getAlias(),
            $this->container['country_code'],
            $this->container['account']
        );

        $products = $this->container['sales.channel_product_resolver']->satisfies(
            $channel,
            $this->getSdk()['product.matrix']->getProductsByChannel($channel->getId())
        );

        $playlist_parameters = $this->container['live.parameters_factory']->get('playlist', [
            'channel' => $channelArray,
            'streams' => $streams,
            'products' => $products,
            'account' => $this->container['account'],
        ]);

        return $this->jsonResponse($playlist_parameters);
    }

    /**
     * Incoming get parameters.
     *
     * @param string  $channel_alias
     * @param Channel $channel
     */
    public function play_action($channel_alias, Request $request, Channel $channel)
    {
        $this->robots(false);

        // Invalid Requirements
        if (
            !$request->query->has('language') ||
            !$request->query->has('format')
        ) {
            $errors = [
                'message' => 'Invalid requirements',
                'errors' => [
                    'language' => 'Missing key',
                    'format' => 'Missing key',
                ],
            ];

            return $this->badRequestJsonResponse($errors);
        }

        // Tokenizer
        $bitrate = 0;
        if ($request->query->has('bitrate')) {
            $bitrate = $request->query->get('bitrate');
        }

        $tokenizedUrl = $this->getSdk()->getApi()->streams()->tokenizer(
            $channel->getId(),
            $request->query->get('format'),
            $request->query->get('language'),
            $bitrate,
            $this->container['country_code'],
            $this->container['account']
        );
        $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

        switch ($statusCode) {
            case 200:
                // Encryption password is "error" (See clappr-player.js module)
                $encoded = JWT::encode($tokenizedUrl, 'error');

                return new Response($encoded, 200, [
                    'Content-Type' => 'application/octet-stream',
                ]);
                // return $this->jsonResponse($tokenizedUrl);
                break;

            case 400:
                return $this->badRequestJsonResponse($this->getSdk()->getApi()->getLastResponse()->json());
                break;

            default:
                $errors = [
                    'message' => 'Une erreur est survenue. Veuillez réessayer un peu plus tard.',
                ];

                return $this->badRequestJsonResponse($errors);
                break;
        }
    }

    /**
     * Fetch live broadcasted program by channel.
     *
     * @param  $channel_alias
     * @param Channel $channel
     */
    public function broadcast_action($channel_alias, Channel $channel)
    {
        $this->robots(false);

        $progress_parameters = $this->container['live.parameters_factory']->get('progress');

        // Shortcut if no EPG
        if (false === $this->getSdk()['services.channel']->has_programs($channel->getId())) {
            return $this->jsonResponse($progress_parameters);
        }

        // Fill it otherwise
        $broadcast = $this->getSdk()['services.broadcast']->getLiveBroadcastByChannel($channel->getId());
        $progress_parameters->setBroadcast($broadcast);

        // Set HTTP cache
        if (null !== $broadcast['end']) {
            $now = $this->globals->get('date.datetime');
            $end = new \DateTime($broadcast['end'], $this->globals->get('date.timezone'));
            $maxAge = ($end->getTimestamp() - $now->getTimestamp()) + 5; // add 5 seconds delta

            $this->response->setCache([
                'public' => true,
                'max_age' => $maxAge,
            ]);
        }

        return $this->jsonResponse($progress_parameters);
    }

    /**
     * Social media shareing urls.
     *
     * @todo TRANSLATE and URL GENERATE
     *
     * @param string  $channel_alias
     * @param Channel $channel
     */
    public function share_action($channel_alias, Channel $channel)
    {
        $this->robots(false);

        // full channel entity anyway bc of extented needs in string replacement
        $channelArray = $this->getSdk()['services.channel']->show($channel->getId());

        $program_replacement = '';

        if ($channelArray['has_programs']) {
            $broadcast = $this->getSdk()['services.broadcast']->getLiveBroadcastByChannel($channel->getId());

            if ($broadcast['program']) {
                // $program_replacement .= (isset($broadcast['program']['hashtag']) && $broadcast['program']['hashtag']) ? '#'.$broadcast['program']['hashtag'] : '"'.$broadcast['program']['title'].'"';
                $program_replacement .= (isset($broadcast['program']['hashtag']) && $broadcast['program']['hashtag']) ? '#'.$broadcast['program']['hashtag'] : $broadcast['program']['title'];
                $program_replacement .= ' sur ';
            }
        }

        $channel_replacement = ($channelArray['hashtag']) ? '#'.$channelArray['hashtag'] : $channelArray['name'];

        $text = sprintf('Regarder %s%s en direct sur Play TV', $program_replacement, $channel_replacement);
        $text = urlencode($text);
        $url = "{$this->hosts['current_full']}/television/{$channelArray['alias']}/";

        return $this->jsonResponse([
            'twitter' => "https://twitter.com/intent/tweet?text={$text}&url={$url}",
            'facebook' => "https://www.facebook.com/sharer/sharer.php?p[url]={$url}",
        ]);
    }

    public function check_action()
    {
        $this->robots(false);

        return $this->jsonResponse(array(
            'isConnected' => $this->container['is_connected'],
        ));
    }

    /**
     * Activate 'player-flash' cookie debug feature.
     */
    public function debug_action()
    {
        $this->robots(false);

        $response = new stdClass();

        // is_playmedia() is defined in "app/src/functions.php"
        if (is_playmedia()) {
            $response->debug = $this->cookie->set('__ptv_pfdebug', 1);
        }

        return $this->jsonResponse($response);
    }

    /**
     * Handle view output (json|html) based on context value.
     * Allow to isolate embed algorithms for HTTP context only.
     *
     * @param array $context
     */
    protected function view_handler($context)
    {
        // SPECIAL: Decorate context with Uniroll ad player configuration
        $context = $this->decorateContextWithUnirollData($context);

        // SPECIAL: Dirty hack to get stream language and avoid "legacy player" initialize http request
        $context = $this->decorateContextWithStreamLanguage($context);

        // application/json
        if ('json' === $context['content_type']) {
            switch ($context['state']) {
                case 'streamable':
                    $response = [
                        'state' => $context['state'],
                            'html' => [
                                'player' => '<div class="pmd-js-Player pmd-PlayerContainer"><div id="pmd-Uniads"></div></div>',
                            ],
                        'javascript' => ['Data' => $context['live_parameters']],
                    ];
                    break;

                case 'external-iframe':
                    $response = [
                        'state' => $context['state'],
                            'html' => [
                                'player' => '<div class="pmd-js-ExternalIframe pmd-PlayerContainer"><div id="pmd-Uniads"></div></div>',
                            ],
                        'javascript' => ['Data' => $context['live_parameters']],
                    ];
                    break;

                default:
                    $context = array_merge($this->container['twig']->getGlobals(), $context);
                    $response = [
                        'state' => $context['state'],
                            'html' => [
                                'player' => $this->container['twig']->loadTemplate('controllers/player/embed.twig')->renderBlock('content', $context),
                            ],
                        'javascript' => '',
                    ];
                    break;
            }

            return JsonResponse::create($response, 200, [
                'X-Robots-Tag' => 'noindex',
            ]);
        }

        // text/html
        $this->robots(false);

        return $this->render($context);
    }

    /**
     * Decorate context "live parameters" with Uniroll ad player configuration.
     *
     * @param array $context The context
     *
     * @return array The context
     */
    protected function decorateContextWithUnirollData($context)
    {
        if (isset($context['live_parameters'])) {
            $channel = $context['live_parameters']->getChannel();
            $channelId = isset($channel) ? $channel['id'] : 0;
            $zoneUid = $this->convertZoneUid($context['live_parameters']->getAds());
            $config = $this->checkUnirollAdCampaign($zoneUid, $channelId);
            $context['live_parameters']->setUnirollConfig($config);
        }

        return $context;
    }

    /**
     * Decorate context "live parameters" with stream language code.
     * This is a dirty hack to avoid /player/initialize/{channel-alias}/ HTTP request.
     * This hack assume there is ONLY ONE language per channel.
     * Therefore, it BREAK the multi-language stream feature.
     *
     * The "streamLanguage" value is mandatory for /player/play/ http request.
     *
     * @see _fetch() method in javascript lib/clappr-player.js
     *
     * @param array $context The context
     *
     * @return array The context
     */
    protected function decorateContextWithStreamLanguage($context)
    {
        if (isset($context['live_parameters']) && isset($context['channel'])) {
            // Ensure stream is provided by wse-backend
            if ($context['channel']['streaming_spec'] === 'wse') {
                $streams = $this->getSdk()->getApi()->streams()->getStreamsByChannel(
                    $context['channel']['alias'],
                    $this->container['country_code'],
                    $this->container['account']
                );
                // Add language code from first stream results
                if (isset($streams[0]['languageCode'])) {
                    $context['live_parameters']->setStreamLanguage($streams[0]['languageCode']);
                }
            }
        }

        return $context;
    }
}
