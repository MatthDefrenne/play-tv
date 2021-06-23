<?php

namespace PlayTv;

use PlayTv\Core\Channel\Channel;
use Playmedia\Utils\Intl as IntlUtils;
use PlayTv\Utils\Broadcast as BroadcastUtils;
use PlayTv\Utils\Date as DateUtils;
use PlayTv\Utils\Feature;
use PlayTv\Utils\ReplayTv as ReplayUtils;
use PlayTv\Core\Mosaic;
use PlayTv\Core\Website;

/**
 * Add new business logic for reusing controller methods.
 * Especially for former modules.
 *
 * @author David Guyon <d.guyon@playmedia.fr>
 */
trait WidgetableTrait
{
    protected function buildCacheKey($base, array $attributes = [], array $exclude = [])
    {
        // variadic
        $cacheKey = $base;

        if (count($attributes) > 0) {
            $cacheKey .= implode('_', array_values($attributes));
        }

        // fixed
        if (!isset($exclude['sdk_country_code'])) {
            $cacheKey .= ':'.$this->container['sdk_country_code'];
        }
        if (!isset($exclude['locale'])) {
            $cacheKey .= ':'.$this->container['locale'];
        }
        if (!isset($exclude['layout'])) {
            $layout = $this->isMobileLayout() ? 'mobile' : 'default';
            $cacheKey .= ':'.$layout;
        }

        $cacheKey = strtolower($cacheKey);

        return $cacheKey;
    }

    /**
     * Unify block mosaic rendering.
     *
     * @cache 10 mins (except homepage and television)
     *
     * @param string $context Type of layout
     *
     * @return string
     */
    public function mosaic($context = 'television')
    {
        $cache_id = $this->buildCacheKey('block_mosaic_', [
            'context' => $context,
        ]);
        $html = $this->container['caching.default']->get($cache_id);

        // Return cached response
        // $html = false; // @debug
        if (false !== $html) {
            return $html;
        }

        $country_code = $this->container['sdk_country_code'];

        // Render and cache fetched template by type
        $channels = $panels = $countries = $country_slugs = null;

        $channels_by_country = array();

        switch ($context) {
            case 'homepage':
                $channels = $this->container['core.mosaic.mosaic_manager']->getHomepageMosaic($country_code)->toArray();
                break;

            case 'live':
                $channels = $this->container['core.mosaic.mosaic_manager']->getTelevisionMosaic($country_code, $this->container['account'])->toArray();
                break;

            case 'social_tv':
                $channels = $this->container['core.mosaic.mosaic_manager']->getSocialMosaic($country_code)->toArray();
                break;

            case 'categories':
                $channels = $this->container['core.mosaic.mosaic_manager']->getCategoryMosaic($country_code)->toArray();
                break;

            case 'themes':
                $channels = $this->container['core.mosaic.mosaic_manager']->getThemeMosaic($country_code)->toArray();
                break;

            case 'replay_tv':
            case 'replay_tv_page': // replay TV page with submene asking number of channels.
                $channels = $this->container['core.mosaic.mosaic_manager']->getReplayMosaic($country_code)->toArray();
                break;

            case 'television' :
            default :

                if (!$this->container['is_website_default']) {
                    // Change the streams collection to use the website country code
                    $this->getSdk()['services.channel']->setStreamsCollection($this->getSdk()['services.channel.stream']->collection($country_code));
                    // Change the channels collection
                    $this->container['core.mosaic.mosaic_manager']->setChannels($this->getSdk()['services.channel']->collection());
                }

                $channels = $this->container['core.mosaic.mosaic_manager']->getTelevisionMosaic($country_code, $this->container['account'], array(
                    'with_external_streams' => true,
                    'with_exclusive_channels' => $this->has_feature(Feature::SALES),
                ))->toArray();

                $panels = ceil(count($channels) / (6 * 6)); // 6 cols, 6 rows

                $channels_by_country = $this->groupByCountryLanguage($channels);

                $country_slugs = $this->getCountrySlugs($this->isI18n() ? 'en_GB' : 'fr_FR');

                break;
        }

        $template_file = sprintf('controllers/widgets/mosaic%s.twig', $this->isMobileLayout() ? '_mobile' : '');
        $html = $this->render(array(
            'context' => $context,
            'channels' => $channels,
            'pages' => $panels,
            'channels_by_country' => $channels_by_country,
            'countries' => array_keys($channels_by_country),
            'country_slugs' => $country_slugs,
        ), $template_file);

        if ('dev' !== mb_strtolower($this->container['env'])) {
            $this->container['caching.default']->set($cache_id, $html, 1800);
        }

        return $html;
    }

    private function groupByCountryLanguage($channels)
    {
        $channelsByCountryLanguage = [];
        foreach ($channels as $channel) {
            $countries = IntlUtils::getLanguageCountryCodes($channel['language']);
            foreach ($countries as $country) {
                $channelsByCountryLanguage[$country][] = $channel;
            }
        }

        foreach ($channelsByCountryLanguage as $country => $channels) {
            foreach ($channels as $key => $channel) {
                if ($channel['country'] != $country) {
                    unset($channelsByCountryLanguage[$country][$key]);
                }
            }
            if (count($channelsByCountryLanguage[$country]) == 0) {
                unset($channelsByCountryLanguage[$country]);
            }
        }

        return $channelsByCountryLanguage;
    }

    /**
     * Unify block live program rendering.
     *
     * @param array  $channel A valid channel
     * @param string $context View context (television|social_tv)
     *
     * @return string
     */
    protected function live_program_by_channel(array $channel, $context = 'television')
    {
        $cache_id = $this->buildCacheKey('live_program_by_channel_', [
            'context' => $context,
            'channel' => $channel['alias'],
        ]);
        $html = $this->container['caching.default']->get($cache_id);

        // Return cached response for freemium visitors
        if (false !== $html && true === $this->account()->is_freemium()) {
            return $html;
        }

        $liveBroadcast = $this->getSdk()['services.broadcast']->getLiveBroadcastByChannel($channel['id']);

        if (null !== $liveBroadcast) {
            $liveBroadcast['casts'] = $this->getSdk()['services.program']->getCastingByProgram($liveBroadcast['program']['id']);

            // Formatted summary
            $liveBroadcast['program']['summary'] = $this->getSdk()['utils.program']->summaryFormatted($liveBroadcast['program']['summary']);
        }

        $template_file = sprintf('controllers/widgets/block-live-program-by-channel%s.twig', $this->isMobileLayout() ? '_mobile' : '');
        $html = $this->render(array(
            'context' => $context,
            'channel' => $channel,
            'live_program' => $liveBroadcast,
        ), $template_file);

        if (true === $this->account()->is_freemium()) {
            $this->container['caching.default']->set($cache_id, $html, 60);
        }

        return $html;
    }

    /**
     * Unify block next programs rendering.
     *
     * @param array $channel A valid channel
     *
     * @return string
     */
    protected function next_programs_by_channel(array $channel)
    {
        $cache_id = $this->buildCacheKey('next_programs_by_channel_', [
            'channel' => $channel['alias'],
        ]);
        $html = $this->container['caching.default']->get($cache_id);

        // Return cached response
        if (false !== $html) {
            return $html;
        }

        $next_programs = $this->getSdk()['services.broadcast']->getNextBroadcastByChannel($channel['channel_id']);
        if (null !== $next_programs) {
            $next_programs = array_slice($next_programs, 0, 6);
        }

        $template_file = sprintf('controllers/widgets/block-next-programs-by-channel%s.twig', $this->isMobileLayout() ? '_mobile' : '');
        $html = $this->render(array(
            'channel' => $channel,
            'next_programs' => $next_programs,
        ), $template_file);

        $this->container['caching.default']->set($cache_id, $html, 60);

        return $html;
    }

    /**
     * Unify block social tv posts rendering.
     *
     * @param string $context  Visual context (trending)
     * @param mixed  $since_id Social tv post identifier
     * @param mixed  $channel  Channel object
     *
     * @return string Templated string
     */
    protected function social_tv_posts($context = null, $since_id = null, $channel = null)
    {
        if (null !== $channel) {
            $channelAlias = ($channel instanceof Channel) ? $channel->getAlias() : $channel['alias'];
            if ('trending' === $context) {
                $posts = $this->getSdk()['services.social_tv']->getTrendingPostsByChannel($channelAlias, 25, $since_id);
            } else {
                $posts = $this->getSdk()['services.social_tv']->getTweetsByChannel($channelAlias, 25, $since_id);
            }
        } else {
            if ('trending' === $context) {
                $posts = $this->getSdk()['services.social_tv']->getTrendingPosts(25, $since_id);
            } else {
                $posts = $this->getSdk()['services.social_tv']->getTweets(25, $since_id);
            }
        }

        $template_file = sprintf('controllers/widgets/social-tv-posts%s.twig', $this->isMobileLayout() ? '_mobile' : '');
        $html = $this->render(array(
            'posts' => $posts,
        ), $template_file);

        return $html;
    }

    public function broadcasts_live($limit = null, $network = null)
    {
        $cacheAttributes = [];
        if ($network) {
            $cacheAttributes['network'] = $network;
        }
        if ($limit) {
            $cacheAttributes['limit'] = 'limit'.$limit;
        }
        $cache_id = $this->buildCacheKey('broadcasts_live_', $cacheAttributes);
        $html = $this->container['caching.default']->get($cache_id);

        // Return cached response
        // $html = false; // @debug
        if (false !== $html) {
            return $html;
        }

        $mosaic = $this->container['core.mosaic.mosaic_manager']->getBroadcastMosaic($this->container['sdk_country_code'], $network);
        $mosaic = new Mosaic\Decorator\StreamingDecorator($mosaic, $this->container['sdk_country_code'], $this->container['account']);

        $channels = $mosaic->toArray();

        // broadcasts
        $channels_broadcasts_live = $live = [];

        $live = $this->getSdk()['services.broadcast']->getLiveBroadcasts($channels);

        foreach ($channels as $channel) {
            $channels_broadcasts_live[$channel['alias']] = $channel;
            $channels_broadcasts_live[$channel['alias']]['broadcasts'][] = $live[$channel['id']];
        }

        unset($live);

        // limit
        $channels_broadcasts_live = array_slice($channels_broadcasts_live, 0, $limit);

        $template_file = sprintf('controllers/widgets/broadcasts-live%s.twig', $this->isMobileLayout() ? '_mobile' : '');
        $html = $this->render(array(
            'channels_broadcasts_live' => $channels_broadcasts_live,
        ), $template_file);

        $this->container['caching.default']->set($cache_id, $html, 60);

        return $html;
    }

    public function broadcasts_presets($presets = null, $date = null, $limit = null, $network = null)
    {
        // presets requirements
        if (null === $presets) {
            $presets = ['primetime'];
            if (false === $this->isMobileLayout()) {
                $presets[] = 'latefringe';
            }
        }

        if (!is_array($presets)) {
            $presets = (array) $presets;
        }

        // date requirements
        if (null === $date) {
            $date = date('Y-m-d');
        } elseif (is_numeric($date)) {
            $date = date('Y-m-d', $date);
        }

        $cacheAttributes = [];
        $cacheAttributes['presets'] = implode('_', $presets);
        $cacheAttributes['date'] = $date;
        if ($network) {
            $cacheAttributes['network'] = $network;
        }
        if ($limit) {
            $cacheAttributes['limit'] = 'limit'.$limit;
        }
        $cache_id = $this->buildCacheKey('broadcasts_presets_', $cacheAttributes);
        $html = $this->container['caching.default']->get($cache_id);

        // Return cached response
        // $html = false; // @debug
        if (false !== $html) {
            return $html;
        }

        $mosaic = $this->container['core.mosaic.mosaic_manager']->getBroadcastMosaic($this->container['sdk_country_code'], $network);
        $mosaic = new Mosaic\Decorator\StreamingDecorator($mosaic, $this->container['sdk_country_code'], $this->container['account']);

        $channels = $mosaic->toArray();

        // broadcasts
        $channels_broadcasts_presets = $primetime = $latefringe = [];

        if (in_array('primetime', $presets)) {
            $primetime = $this->getSdk()['services.broadcast']->getPrimeBroadcasts($date, $channels, 'primetime');
        }

        if (in_array('latefringe', $presets)) {
            $latefringe = $this->getSdk()['services.broadcast']->getPrimeBroadcasts($date, $channels, 'latefringe', $primetime);
        }

        foreach ($channels as $channel) {
            $channels_broadcasts_presets[$channel['alias']] = array_merge($channel, ['broadcasts' => []]);

            if (isset($primetime[$channel['id']])) {
                $channels_broadcasts_presets[$channel['alias']]['broadcasts'][] = $primetime[$channel['id']];
            }

            if (isset($latefringe[$channel['id']])) {
                $channels_broadcasts_presets[$channel['alias']]['broadcasts'][] = $latefringe[$channel['id']];
            }
        }

        unset($primetime, $latefringe);

        // limit
        $channels_broadcasts_presets = array_slice($channels_broadcasts_presets, 0, $limit);

        $template_file = sprintf('controllers/widgets/broadcasts-presets%s.twig', $this->isMobileLayout() ? '_mobile' : '');
        $html = $this->render(array(
            'channels_broadcasts_presets' => $channels_broadcasts_presets,
        ), $template_file);

        $this->container['caching.default']->set($cache_id, $html, 1800);

        return $html;
    }

    public function broadcasts($channel, $context = 'daily', $timestamp = null)
    {
        if (false === is_array($channel)) {
            $channel_id = $channel;
        } else {
            $channel_id = $channel['id'];
        }

        $cacheAttributes = [];
        $cacheAttributes['context'] = $context;
        $cacheAttributes['channel'] = 'channel'.$channel_id;
        if ($timestamp) {
            $cacheAttributes['timestamp'] = $timestamp;
        }

        $cache_id = $this->buildCacheKey('broadcasts_', $cacheAttributes);
        $html = $this->container['caching.default']->get($cache_id);

        // Return cached response
        if (false !== $html) {
            return $html;
        }

        switch ($context) {
            case 'live':
                $broadcasts = $this->getSdk()['services.broadcast']->getLiveBroadcastByChannel($channel_id);
                $broadcasts = (null === $broadcasts) ? [] : [$broadcasts];
                break;

            case 'next':
                $broadcasts = $this->getSdk()['services.broadcast']->getNextBroadcastByChannel($channel_id);
                $broadcasts = array_slice($broadcasts, 0, 6);
                break;

            case 'daily':
            default:

                if (null === $timestamp) {
                    $date = date('Y-m-d', time());
                } else {
                    $date = date('Y-m-d', $timestamp);
                }
                $broadcasts = $this->getSdk()['services.broadcast']->getDailyBroadcastByChannel($channel_id, $date);
                break;
        }

        $template_file = sprintf('controllers/widgets/broadcasts%s.twig', $this->isMobileLayout() ? '_mobile' : '');
        $html = $this->render(array(
            'broadcasts' => $broadcasts,
        ), $template_file);

        $this->container['caching.default']->set($cache_id, $html, 1800);

        return $html;
    }

    public function adblock()
    {
        $refreshUrl = $this->request->uri;
        $queryString = $this->request->get;
        unset($queryString['adb']);
        if (count($queryString) > 0) {
            $refreshUrl = $refreshUrl.'?'.http_build_query($queryString);
        }
        $template_file = sprintf('controllers/widgets/adblock.twig');

        $html = $this->render([
            'refresh_url' => $refreshUrl,
        ], $template_file);

        return $html;
    }

    public function thumbnails($context, $ads_enabled = false, Website $website = null)
    {
        $cache_attributes = [
            'context' => $context,
            'ads_enabled' => ($ads_enabled) ? 'ads' : 'no-ads',
        ];
        $cache_exclude = [];

        if (0 === strpos($context, 'channels-')) {
            if ($this->container['is_website_fr']) {
                $website = 'website-fr';
                $widget_country = 'FR';
            } elseif ($this->container['is_website_uk']) {
                $website = 'website-uk';
                $widget_country = 'GB';
            } else {
                $website = 'website-default';
                $widget_country = 'WORLD';
            }

            $cache_attributes['website'] = $website;
            $cache_exclude['sdk_country_code'] = true;
            $cache_exclude['locale'] = true;
        }
        $cache_id = $this->buildCacheKey('thumbnails_', $cache_attributes, $cache_exclude);
        $html = $this->container['caching.default']->get($cache_id);

        // Return cached response
        // $html = false; // @debug
        if (false !== $html) {
            return $html;
        }

        // defines
        $country_code = $this->container['sdk_country_code'];
        $urlGenerator = $this->container['url_generator'];
        $now = $this->globals->get('date.datetime');
        $ttl = 1800;

        $this->logger('homepage')->info(sprintf('thumbnails[%s][%s] Generating content for country = %s, ads_enabled = %s',
            $this->request->getHost(), $context, $country_code, var_export($ads_enabled, true)));

        // Closure to add images.large key
        $exists_channel_large_image = function ($channel) {
            $channel['images']['large'] = null;
            if (isset($channel['id']) && file_exists($this->config->custom->static->mounted_path."/img/tv_channels/{$channel['id']}_large.png")) {
                $channel['images']['large'] = $this->container['static_base_url']."/img/tv_channels/{$channel['id']}_large.png";
            }

            return $channel;
        };

        switch ($context) {
            case 'broadcasts-live':
                $channels = $this->container['core.mosaic.mosaic_manager']->getBroadcastMosaic($country_code, 'tnt')->toArray();

                $thumbnails = $live = [];

                $live = $this->getSdk()['services.broadcast']->getLiveBroadcasts($channels);

                foreach ($channels as $channel) {
                    if (!isset($live[$channel['id']]['program'])) {
                        continue;
                    }

                    $live[$channel['id']]['channel'] = $channel;
                    $thumbnails[$channel['alias']] = $live[$channel['id']];
                }

                // Pick the first finishing broadcast to calculate ttl
                $first = BroadcastUtils::pickFirstFinishingBroadcast($thumbnails);

                $ttl = DateUtils::diffSeconds(new \DateTime($first['end']), $now);

                $title = [
                    'label' => $this->trans('broadcasts_live.title', [], 'widget'),
                    'url' => $urlGenerator->generate('television_index'),
                ];
                $type = 'broadcast';
                break;

            case 'broadcasts-tonight':

                $date = date('Y-m-d');

                $mosaic = $this->container['core.mosaic.mosaic_manager']->getBroadcastMosaic($country_code, 'tnt');
                $mosaic = new Mosaic\Decorator\StreamingDecorator($mosaic, $country_code, $this->container['account']);

                $channels = $mosaic->toArray();

                $thumbnails = [];

                $primetime = $this->getSdk()['services.broadcast']->getPrimeBroadcasts($date, $channels, 'primetime');
                foreach ($channels as $channel) {
                    if (!isset($primetime[$channel['id']]) || !isset($primetime[$channel['id']]['program'])) {
                        continue;
                    }

                    $primetime[$channel['id']]['channel'] = $channel;
                    $thumbnails[] = $primetime[$channel['id']];
                }

                $latefringe = $this->getSdk()['services.broadcast']->getPrimeBroadcasts($date, $channels, 'latefringe', $primetime);
                foreach ($channels as $channel) {
                    if (!isset($latefringe[$channel['id']]) || !isset($latefringe[$channel['id']]['program'])) {
                        continue;
                    }

                    $latefringe[$channel['id']]['channel'] = $channel;
                    $thumbnails[] = $latefringe[$channel['id']];
                }

                // Keep only broadcasts that have not started yet
                $thumbnails = BroadcastUtils::filterStartedBroadcasts($thumbnails, $now);

                // Pick the first starting broadcast to calculate ttl
                $first = BroadcastUtils::pickFirstStartingBroadcast($thumbnails);

                $ttl = DateUtils::diffSeconds(new \DateTime($first['start']), $now);

                $title = [
                    'label' => $this->trans('broadcasts_tonight.title', [], 'widget'),
                    'url' => $urlGenerator->generate('programmes_prime_tonight'),
                ];
                $type = 'broadcast';
                break;

            case 'replays-news':
                $requestOptions = null !== $website ? ['query' => 'website='.$website->getKey()] : [];
                $replays = $this->container['api_client']->getJSON('/replays/latest/news/', $requestOptions, $default = []);

                $thumbnails = array_map(function ($replay) {
                    return $this->container['core_serializer']->normalize(
                        $this->container['api_serializer']->denormalize($replay, 'PlayTv\Core\Replay')
                    );
                }, $replays);

                ReplayUtils::sortByLatest($thumbnails, $this->container['core.mosaic.mosaic_manager']->getReplayMosaic($this->container['sdk_country_code']));

                $title = [
                    'label' => $this->trans('replays_news.title', [], 'widget'),
                    'url' => $urlGenerator->generate(
                        'replay_videos',
                        ['gender' => 'actualite']
                    ),
                ];
                $type = 'replay';
                break;

            case 'replays-last':
                $requestOptions = null !== $website ? ['query' => 'website='.$website->getKey()] : [];
                $replays = $this->container['api_client']->getJSON('/replays/latest/prime/', $requestOptions, $default = []);

                $thumbnails = array_map(function ($replay) {
                    return $this->container['core_serializer']->normalize(
                        $this->container['api_serializer']->denormalize($replay, 'PlayTv\Core\Replay')
                    );
                }, $replays);

                ReplayUtils::sortByLatest($thumbnails, $this->container['core.mosaic.mosaic_manager']->getReplayMosaic($this->container['sdk_country_code']));

                $title = [
                    'label' => $this->trans('replays_last.title', [], 'widget'),
                    'url' => $urlGenerator->generate('replay_tv_index'),
                ];
                $type = 'replay';
                break;

            case 'channels-arabic':
                $thumbnails = $this->container['widget.manager']->getWidget('arabic', $widget_country);

                if (empty($thumbnails)) {
                    return;
                }

                $thumbnails = array_map($exists_channel_large_image, $thumbnails);
                $title = [
                    'label' => $this->trans('channels_arabic.title', [], 'widget'),
                ];
                $type = 'channel';
                break;

            case 'channels-news':
                $thumbnails = $this->container['widget.manager']->getWidget('news', $widget_country);

                if (empty($thumbnails)) {
                    return;
                }

                $thumbnails = array_map($exists_channel_large_image, $thumbnails);
                $title = [
                    'label' => $this->trans('channels_news.title', [], 'widget'),
                ];
                $type = 'channel';
                break;

            case 'channels-thematic':
                $thumbnails = $this->container['widget.manager']->getWidget('thematic', $widget_country);

                if (empty($thumbnails)) {
                    return;
                }

                $thumbnails = array_map($exists_channel_large_image, $thumbnails);
                $title = [
                    'label' => $this->trans('channels_thematic.title', [], 'widget'),
                ];
                $type = 'channel';
                break;

            case 'channels-local':
                $thumbnails = $this->container['widget.manager']->getWidget('local', $widget_country);

                if (empty($thumbnails)) {
                    return;
                }

                $thumbnails = array_map($exists_channel_large_image, $thumbnails);
                $title = [
                    'label' => $this->trans('channels_local.title', [], 'widget'),
                ];
                $type = 'channel';
                break;

            case 'channels-community':
                $thumbnails = $this->container['widget.manager']->getWidget('community', $widget_country);

                if (empty($thumbnails)) {
                    return;
                }

                $thumbnails = array_map($exists_channel_large_image, $thumbnails);
                $title = [
                    'label' => $this->trans('channels_community.title', [], 'widget'),
                ];
                $type = 'channel';
                break;

            case 'channels-turk':
                $thumbnails = $this->container['widget.manager']->getWidget('turk', $widget_country);

                if (empty($thumbnails)) {
                    return;
                }

                $thumbnails = array_map($exists_channel_large_image, $thumbnails);
                $title = [
                    'label' => $this->trans('channels_turk.title', [], 'widget'),
                ];
                $type = 'channel';
                break;

            default:
                break;
        }

        // If ttl = 0, item would be cached forever
        if ($ttl === 0) {
            $ttl = 60;
        }

        // cache it anyway, futher request in $tll
        if (empty($thumbnails)) {
            $html = '';
            $this->container['caching.default']->set($cache_id, $html, $ttl);

            return $html;
        }

        $template_file = sprintf('controllers/widgets/thumbnails%s.twig', $this->isMobileLayout() ? '_mobile' : '');
        $html = $this->render(array(
            'context' => $context,
            'title' => $title,
            'type' => $type,
            'ads_enabled' => $ads_enabled,
            'thumbnails' => $thumbnails,
        ), $template_file);

        $this->container['caching.default']->set($cache_id, $html, $ttl);

        return $html;
    }

    public function television_content()
    {
        $cache_attributes = [
            'account' => null !== $this->container['account'] ? $this->container['account']->getUsername() : 'default',
        ];
        $cache_id = $this->buildCacheKey('television_content_', $cache_attributes);

        $html = $this->container['caching.default']->get($cache_id);

        // $html = false; // @debug
        if (false !== $html) {
            return $html;
        }

        $channels = $this->container['core.mosaic.mosaic_manager']->getTelevisionMosaic($this->container['sdk_country_code'], $this->container['account'], array(
            'with_external_streams' => true,
            'with_exclusive_channels' => $this->has_feature(Feature::SALES),
        ))->toArray();

        $channels_by_id = array();
        foreach ($channels as $channel) {
            $channels_by_id[$channel['id']] = $channel;
        }

        $live_broadcasts = $this->getSdk()['services.broadcast']->getLiveBroadcasts($channels);
        // Keep only broadcasts with associated program
        $live_broadcasts = array_filter($live_broadcasts, function ($broadcast) {
            return isset($broadcast['program']);
        });
        // Set channel key
        $live_broadcasts = array_map(function ($broadcast) use ($channels_by_id) {
            $broadcast['channel'] = $channels_by_id[$broadcast['channel_id']];

            return $broadcast;
        }, $live_broadcasts);

        // Pick the first finishing broadcast to calculate ttl
        $first = BroadcastUtils::pickFirstFinishingBroadcast($live_broadcasts);
        $ttl = DateUtils::diffSeconds(new \DateTime($first['end']), $this->globals->get('date.datetime'));

        // If ttl = 0, item would be cached forever
        if ($ttl === 0) {
            $ttl = 60;
        }

        $template_file = sprintf('controllers/widgets/television-content%s.twig', $this->isMobileLayout() ? '_mobile' : '');
        $html = $this->render(array(
            'broadcasts' => $live_broadcasts,
        ), $template_file);

        $this->container['caching.default']->set($cache_id, $html, $ttl);

        return $html;
    }
}
