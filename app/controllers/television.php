<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use PlayTv\Core\Channel\Channel;
use PlayTv\Utils\Product as ProductUtils;
use PlayTv\Utils\Channel as ChannelUtils;
use PlayTv\Utils\Feature;
use Playmedia\Component\Channel as ChannelComponent;
use Playmedia\Component\Channel\Mosaic;

/**
 * Controller used to display television pages.
 *
 * @author PLAYMEDIA
 */
class television_controller extends ppl_app_controller
{
    /**
     * Display the television main page.
     */
    public function index_action()
    {
        $this->set_page_title($this->trans('television_index.title', [], 'seo'));
        $this->set_page_description($this->trans('television_index.meta.description', ['%count%' => 500], 'seo'));
        $this->set_page_keywords_trans('television_index');

        $mosaic = $this->mosaic('television');

        return $this->render(array(
            'view_is_html' => true,
            'mosaic' => $mosaic,
            'television_content' => $this->television_content(),
            'player_responsive' => false,
            'mode' => 'index',
        ));
    }

    /**
     * Display the live television dedicated page.
     *
     * @param string $channel_alias The channel alias
     */
    public function channel_action($channel_id, $channel_alias = null)
    {
        if (null === $channel_alias && !is_numeric($channel_id)) {
            $channel_alias = $channel_id;
            $channel_id = null;
        }

        // If mode defined as GET, forward to player controller and embed action
        if (isset($this->request->get['popup']) && 1 === (int) $this->request->get['popup']) {
            return $this->forward(
                'player',
                'embed',
                ['channel_alias' => $channel_alias]
            );
        }

        if (isset($channel_id)) {
            $channel = $this->getSdk()['services.channel']->show($channel_id);
        } else {
            $channel = $this->getSdk()['services.channel']->show($this->getSdk()['utils.tool']->slugify($channel_alias));
        }

        if (null === $channel) {
            return $this->createNotFoundResponse();
        }

        // Potential redirect
        if (!$this->isI18n() && urldecode($this->request->uri) !== $channel['channel_play_url']) {
            return $this->response->redirect($channel['channel_play_url'], 301);
        }

        // Replace player w/ adb content if adb flag exists in query string
        if (isset($this->request->get['adb']) && 1 === (int) $this->request->get['adb']) {
            $render_data['adb'] = $this->adblock();
        }

        $country_code = $this->container['country_code'];
        $account = $this->container['account'];

        $channel = ChannelComponent::getStreamingKeys($channel, $country_code, $account);

        $pack = null;
        foreach ($channel['products'] as $product) {
            $pack = $product['alias'];
        }

        $channel['is_radio'] = ChannelUtils::isRadio($channel);

        if ($channel['is_radio']) {
            $this->set_page_title($this->trans('television_radio_single.title', ['%channel%' => $channel['name']], 'seo'));
            $this->set_page_description($this->trans('television_radio_single.meta.description', ['%channel%' => $channel['name']], 'seo'));
            $this->set_page_keywords_trans('television_radio_single', ['%channel%' => $channel['name']]);
        } else {
            $this->set_page_title($this->trans('television_channel_single.title', ['%channel%' => $channel['name']], 'seo'));
            $this->set_page_description($this->trans('television_channel_single.meta.description', ['%channel%' => $channel['name']], 'seo'));
            $this->set_page_keywords_trans('television_channel_single', ['%channel%' => $channel['name']]);
        }

        $render_data['channel'] = $channel;
        $render_data['trial_period_days'] = $this->getSdk()->getApi()->config()->get(['key' => 'sales.trial_period_days']); // Trial period days
        $render_data['pack'] = $pack;
        $render_data['canonical_url'] = $this->container['url_generator']->generate(
            'television_channel_single',
            ChannelUtils::getRouteParameters($this->container['router']->getRouteCollection()->get('television_channel_single'), $channel)
        );
        $render_data['block_live_program_by_channel'] = $this->live_program_by_channel($channel, 'television'); // Live program by channel
        $render_data['block_next_programs_by_channel'] = $this->next_programs_by_channel($channel); // Next programs by channel
        $render_data['block_social_tv_posts'] = null; // Social Tv posts by channel

        // create opengraph description from player share
        $channel_broadcast_live = $this->getSdk()['services.broadcast']->getLiveBroadcastByChannel($channel['id']);

        $program_replacement = '';
        if ($channel_broadcast_live['program']) {
            $program_replacement .= (isset($channel_broadcast_live['program']['hashtag']) && $channel_broadcast_live['program']['hashtag']) ? '#'.$channel_broadcast_live['program']['hashtag'] : $channel_broadcast_live['program']['title'];
            $program_replacement .= ' sur ';
        }
        $channel_replacement = ($channel['hashtag']) ? '#'.$channel['hashtag'] : $channel['name'];

        $channel_broadcast_live['opengraph_description'] = sprintf('Regarder %s%s en direct sur Play TV', $program_replacement, $channel_replacement);
        $render_data['channel_broadcast_live'] = $channel_broadcast_live;

        // Get the output of /player/embed/{channel_alias}/?zapping=1
        $player = $this->get_player_embed_zapping($channel['alias']);
        $render_data['player_embed'] = $player;

        $render_data['player_responsive'] = 'streamable' === $player['state'] || 'external-iframe' === $player['state'];

        // Native player sniffing, no controls for iPhone (whatever the browser) and Android Browser
        $mobile_detect = $this->request->get_client()->mobile_detect();
        if (
            ($mobile_detect->is('iOS') && $mobile_detect->is('iPhone')) ||
            ($mobile_detect->is('AndroidOS') && $mobile_detect->is('Webkit') && !($mobile_detect->is('Chrome')))
        ) {
            $render_data['native'] = 1;
        } else {
            $render_data['native'] = 0;
        }

        if (false === $this->isMobileLayout()) {
            $render_data['mosaic'] = $this->mosaic('television');
        }
        if ($this->isMobileLayout()) {
            $render_data['block_social_tv_posts'] = $this->social_tv_posts(null, null, $channel);
        }

        $render_data['television_content'] = $this->television_content();
        $render_data['mode'] = 'channel';

        return $this->render($render_data);
    }

    private function get_player_embed_zapping($channel_alias)
    {
        $request = Request::create("/player/embed/{$channel_alias}/", 'GET',
            ['zapping' => 1],
            $this->request->cookies->all(),
            [],
            $this->request->server->all()
        );

        $response = $this->container['kernel']->handle($request, HttpKernelInterface::SUB_REQUEST);
        if ($response->isSuccessful()) {
            return json_decode($response->getContent(), true);
        }
    }

    public function country_action($country_slug)
    {
        if (!$country_code = $this->getCountryCodeBySlug($country_slug, $this->isI18n() ? 'en_GB' : 'fr_FR')) {
            return $this->response->redirect('/television/', 302);
        }

        $this->container['twig']->addGlobal('country_filter', $country_code);

        return $this->index_action(null);
    }

    /**
     * Display the "standalone" mosaic page filtered by types.
     *
     * @param string $type The mosaic type
     *
     * @TODOS HTTP CACHE 1 DAY
     */
    public function mosaique_action($type)
    {
        $types = array('direct', 'categories', 'themes', 'replay-tv');

        if (!in_array($type, $types)) {
            return $this->createNotFoundResponse();
        }

        $render_params = array(
            'type' => $type,
        );

        switch ($type) {

            case 'direct':
                $this->set_page_title($this->trans('television_mosaique_direct.title', [], 'seo'));
                $block_mosaic = $this->mosaic('live');
                $render_params['client_country'] = $this->container['sdk_country_code'];
                break;

            case 'categories':
                $this->set_page_title($this->trans('television_mosaique_categories.title', [], 'seo'));
                $block_mosaic = $this->mosaic('categories');
                break;

            case 'themes':
                $this->set_page_title($this->trans('television_mosaique_themes.title', [], 'seo'));
                $block_mosaic = $this->mosaic('themes');

                break;

            case 'replay-tv':
                $this->set_page_title($this->trans('television_mosaique_replay_tv.title', [], 'seo'));
                $block_mosaic = $this->mosaic('replay_tv');
                break;
        }

        $render_params['block_mosaic'] = $block_mosaic;

        return $this->render($render_params);
    }

    /**
     * Display channel tooltip information in JSON format.
     *
     * @todo Implement an Event Listener for CORS
     *
     * @param string  $channel_alias The channel alias
     * @param Channel $channel
     */
    public function tooltip_action($channel_alias, Channel $channel)
    {
        $data = [];
        $maxAge = 65;

        $data['isAdult'] = $this->getSdk()['services.channel']->is_adult($channel->getId());

        if ($this->getSdk()['services.channel']->has_programs($channel->getId())) {
            $broadcast = $this->getSdk()['services.broadcast']->getLiveBroadcastByChannel($channel->getId());

            if (!empty($broadcast['program'])) {
                $data = $broadcast['program'];
                $data['progress'] = $broadcast['progress'];
                $data['start'] = strtotime($broadcast['start']);
                $data['end'] = strtotime($broadcast['end']);

                $now = $this->globals->get('date.datetime');
                $end = new \DateTime($broadcast['end'], $this->globals->get('date.timezone'));
                $maxAge = ($end->getTimestamp() - $now->getTimestamp()) + 5; // add 5 seconds delta
            }
        }

        if ($this->has_feature(Feature::SALES) &&
            $this->getSdk()['services.channel']->has_products($channel->getId())
        ) {
            // apply both account filter and product premium filter
            $products = $this->container['sales.channel_product_resolver']->satisfies(
                $channel,
                $this->getSdk()['product.matrix']->getProductsByChannel($channel->getId()),
                $this->container['account'],
                true
            );

            $data['products'] = ProductUtils::groupByType($products, 2);
        }

        if ($this->request->headers->has('Origin')) {
            $this->response->headers->set('Access-Control-Allow-Origin', $this->request->headers->get('Origin'));
        }

        $this->response->setCache([
            'public' => true,
            'max_age' => $maxAge,
        ]);

        return $this->jsonResponse($data);
    }

    /**
     * HTTP layer outputing HTML for next programs block.
     * Accept both standard and AJAX requests.
     *
     * @param mixed $channel_alias Either a string for the alias or an array
     */
    public function block_next_programs_by_channel_action($channel_alias)
    {
        $this->robots(false);

        $channel = $this->getSdk()['services.channel']->show($channel_alias);

        $channel['is_radio'] = ChannelUtils::isRadio($channel);

        $html = $this->next_programs_by_channel($channel);

        $maxAge = 65;
        $this->response->setCache([
            'public' => true,
            'max_age' => $maxAge,
        ]);

        $this->response->write($html);
    }

    /**
     * HTTP layer outputing HTML for live program block.
     * Accept both standard and AJAX requests.
     *
     * @param mixed $channel_alias Either a string for the alias or an array
     */
    public function block_live_program_by_channel_action($channel_alias)
    {
        $this->robots(false);

        $channel = $this->getSdk()['services.channel']->show($channel_alias);

        $country_code = $this->container['country_code'];
        $account = $this->container['account'];
        $channel = ChannelComponent::getStreamingKeys($channel, $country_code, $account);

        $channel['is_radio'] = ChannelUtils::isRadio($channel);

        if (isset($_GET['context']) && 'social_tv' == $_GET['context']) {
            $html = $this->live_program_by_channel($channel, 'social_tv');
        } else {
            $html = $this->live_program_by_channel($channel);
        }

        $maxAge = 65;
        $this->response->setCache([
            'public' => true,
            'max_age' => $maxAge,
        ]);

        $this->response->write($html);
    }

    public function streamable_filter_action()
    {
        $this->robots(false);

        $this->container['twig']->addGlobal('streamable_filter', true);

        return $this->index_action();
    }

    public function my_channels_action()
    {
        $this->robots(false);

        if ($this->request->is_ajax) {
            $channels = [];
            if (null !== $this->container['account']) {
                foreach ($this->container['account']->getSubscriptions() as $subscription) {
                    if ($subscription['product']['type'] == 'retail') {
                        $channels = array_merge($channels, array($subscription['product']['channel']));
                    } else {
                        $channels = array_merge($channels, $subscription['product']['channels']);
                    }
                }
            }

            $channelService = $this->getSdk()['services.channel'];

            array_walk($channels, function (&$channel) use ($channelService) {
                $channel = $channelService->show($channel);
            });

            // Apply mosaic rules
            $mosaic = $this->container['core.mosaic.mosaic_manager']->createSortedMosaic($channels, $this->container['sdk_country_code']);
            $mosaic = new \PlayTv\Core\Mosaic\Filter\GeolocFilter($mosaic, $this->container['sdk_country_code']);

            $channels = $mosaic->toArray();

            // Filter unsecure keys
            $keys = ['id', 'name', 'alias', 'tvplayer_id', 'has_programs', 'images', 'disabled', 'highlight', 'streaming_source', 'is_adult'];
            array_walk($channels, function (&$channel) use ($keys) {
                $channel = array_intersect_key($channel, array_flip($keys));
            });

            return $this->jsonResponse(array_values($channels));
        }

        $this->container['twig']->addGlobal('my_channels_filter', true);

        return $this->index_action();
    }

    /**
     * Endpoints when user using remote control to change channel that needs a requirements check.
     *
     * @param string $channel_alias
     */
    public function zapping_action($channel_alias)
    {
        $this->request->query->set('zapping', 1);

        return $this->forward(
            'player',
            'embed',
            ['channel_alias' => $channel_alias]
        );
    }
}
