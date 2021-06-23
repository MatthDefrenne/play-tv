<?php

namespace Playmedia\Component\Channel;

use Playmedia\Component\Channel as ChannelComponent;
use Playmedia\Utils\Intl as IntlUtils;
use Playmedia\Component\Channel\Mosaic\FilterInterface;

/**
 * Mosaic component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Mosaic
{
    private $conn;
    private $caching;
    private $isI18n;
    private $filters = array();

    /**
     * Constructor.
     *
     * @param mixed $conn    Database connection instance
     * @param mixed $caching Caching instance
     * @param bool  $isI18n
     */
    public function __construct($conn, $caching, $isI18n = false)
    {
        $this->conn = $conn;
        $this->caching = $caching;
        $this->isI18n = $isI18n;
    }

    private static function getLanguagePriority(array $channel, $country)
    {
        return IntlUtils::isCountryLanguage($country, $channel['language']) ? 1 : 2;
    }

    private static function getCountryPriority(array $channel, $country)
    {
        return $country == $channel['country'] ? 1 : 2;
    }

    public function addFilter(FilterInterface $filter)
    {
        $this->filters[] = $filter;

        return $this;
    }

    /**
     * Get the Broadcast Mosaic according playtv network.
     *
     * @cache 1h
     *
     * @param array  $channelCollection
     * @param string $country
     * @param string $network
     *
     * @return array
     */
    public function getBroadcastMosaic(array $channelCollection, $country, $network = null)
    {
        if (null !== $network && $network !== 'tnt') {
            return $channelCollection;
        }

        // $network is "tnt" or NULL
        $networkMosaic = array();
        $channelCollection = self::filterByGeoloc($channelCollection, $country);
        foreach ($channelCollection as $channelItem) {
            // Skip channels without programs
            if (false === $channelItem['has_programs']) {
                continue;
            }
            // Skip non TNT channels if $network is "tnt"
            if ('tnt' === $network && !ChannelComponent::isTnt($channelItem)) {
                continue;
            }
            // Skip channels with wrong country
            if ($country !== $channelItem['country']) {
                continue;
            }
            $networkMosaic[] = $channelItem;
        }

        return $networkMosaic;
    }

    /**
     * Get social TV mosaic channels.
     *
     * @param array $socialChannelsList social channels list
     * @param array $channelCollection  channels Collection
     *
     * @return array $channels
     */
    public function getSocialMosaic(array $socialChannelsList, array $channelCollection)
    {
        $channels = array();

        // Select only Social TV channel
        $channelsFilters = array_filter($channelCollection, function ($channel) use ($socialChannelsList) {

            foreach ($socialChannelsList as $socialChannelId) {
                if ($socialChannelId == $channel['channel_id']) {
                    return $channel;
                }
            }

        });

        // Set Channel alias as key
        foreach ($channelsFilters as $channelItem) {
            if (isset($channels[$channelItem['alias']])) {
                continue;
            }
            $channels[$channelItem['alias']] = $channelItem;
        }

        return $channels;
    }

    /**
     * Get replay TV mosaic channels.
     *
     * @param array  $replaysChannel    List of replay's channel
     * @param array  $channelCollection channels Collection
     * @param string $country
     *
     * @return array $channels
     */
    public function getReplayMosaic(array $replaysChannel, array $channelCollection, $country)
    {
        $channels = array();

        $channelCollection = self::filterByGeoloc($channelCollection, $country);

        // Select only replay channel
        $channelsFilters = array_filter($channelCollection, function ($channel) use ($replaysChannel) {
            foreach ($replaysChannel as $replayChannel) {
                if ($replayChannel['channel_id'] == $channel['channel_id']) {
                    return $channel;
                }
            }
        });

        // Add replay_count on channel List
        $channelsFilters = array_map(function ($channel) use ($replaysChannel) {
            foreach ($replaysChannel as $replayChannel) {
                if ($replayChannel['channel_id'] == $channel['channel_id']) {
                    $channel['replay_count'] = $replayChannel['replay_count'];

                    return $channel;
                }
            }
        }, $channelsFilters);

        // Set Channel alias as key
        foreach ($channelsFilters as $channelItem) {
            if (isset($channels[$channelItem['alias']])) {
                continue;
            }
            $channels[$channelItem['alias']] = $channelItem;
        }

        return $channels;
    }

    /**
     * Get Television Mosaic.
     *
     * @param array $channels     channels Collection
     * @param bool  $keepExternal flag for external streaming capacity
     *
     * @return array $channels
     */
    public function getTelevisionMosaic(array $channels, $country, $account = null, $keepExternal = false)
    {
        foreach ($channels as $key => $channel) {
            $channels[$key] = ChannelComponent::getStreamingKeys($channel, $country, $account);
            if (false === $channels[$key]['streamable']) {
                unset($channels[$key]);
            } elseif ('external' === $channels[$key]['streaming_source'] && false === $keepExternal) {
                unset($channels[$key]);
            } elseif ($this->isI18n && ('internal' === $channels[$key]['streaming_source'] && !$channels[$key]['stream_access']['account'])) {
                unset($channels[$key]);
            }
        }

        return $channels;
    }

    /**
     * Group mosaic channels by countries language
     * Already formatted channel resource.
     *
     * @param array $channels
     *
     * @return array
     */
    public function groupByCountryLanguage(array $channels)
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
     * Get Theme TV mosaic channels.
     *
     * @param array $themesList
     * @param array $channelCollection
     *
     * @return array $channels
     */
    public function getThemeMosaic(array $themesList, array $channelCollection)
    {
        $themes = array();

        // Set theme id as key and theme name as value
        array_map(function (&$theme) use (&$themes) {

            $themes[$theme['theme_id']] = $theme['theme'];

        }, $themesList);

        $channels = array();
        $channelsFilters = array();

        // Set theme name as key and channel as value
        array_map(function (&$channel) use (&$channelsFilters, $themes) {

            $channelsFilters[$themes[$channel['theme_id']]][] = $channel;

        }, $channelCollection);

        return $channelsFilters;
    }

    /**
     * Get Categories TV mosaic channels.
     *
     * @param array $categoriesList
     * @param array $channelCollection
     *
     * @return array $channels
     */
    public function getCategoryMosaic(array $categoriesList, array $channelCollection)
    {
        $categories = array();

        // Set category id as key and category name as value
        array_map(function (&$category) use (&$categories) {

            $categories[$category['category_id']] = $category['category'];

        }, $categoriesList);

        $channels = array();
        $channelsFilters = array();

        // Set category name as key and channel as value
        array_map(function (&$channel) use (&$channelsFilters, $categories) {

            if ($channel['category_id'] <= 5) {
                $channelsFilters[$categories[$channel['category_id']]][] = $channel;
            }

        }, $channelCollection);

        // Reorder TNT channels by country code rules
        uasort($channelsFilters['TNT'], function ($channel1, $channel2) {
            if ($channel1['country_priority'] == $channel2['country_priority']) {
                if ($channel1['order'] == $channel2['order']) {
                    return 0;
                }

                return ($channel1['order'] < $channel2['order']) ? -1 : 1;
            }

            return ($channel1['country_priority'] < $channel2['country_priority']) ? -1 : 1;
        });

        return $channelsFilters;
    }

    /**
     * Get mosaic channels.
     *
     * @cache 1h
     *
     * @param array  $channelCollection
     * @param string $country
     *
     * @return array $channels
     */
    public function getMosaic(array $channelCollection, $country)
    {
        if (null === $country) {
            throw new \InvalidArgumentException('Parameter $country is null');
        }

        // Channels List can be different for each country
        $cacheKey = "channels_mosaic_{$country}";

        if (!$mosaic = $this->caching->get($cacheKey)) {
            $mosaic = [];

            // Add language priority, country priority and streams
            foreach ($channelCollection as $key => $channel) {
                // For Euronews, set the channel language to pull up the channel's position.
                if ($channel['alias'] == 'euronews') {
                    $channel['language'] = ChannelComponent::getEuronewsLanguage($country, $channel['language']);
                }

                $mosaic[$key] = $channel;
            }

            $this->order($mosaic, $country);

            $this->caching->set($cacheKey, $mosaic, 3600);
        }

        foreach ($mosaic as $key => $channel) {
            foreach ($this->filters as $filter) {
                if (true === $filter->filter($channel)) {
                    unset($mosaic[$key]);
                }
            }
        }

        if ($this->isI18n) {
            array_walk($mosaic, function (&$channel) {
                $channel['channel_url'] = ChannelComponent::getUrl($channel, true);
                $channel['channel_play_url'] =
                $channel['channel_live_url'] = ChannelComponent::getLiveUrl($channel, true);
                $channel['channel_broadcast_url'] = ChannelComponent::getBroadcastUrl($channel, true);
            });
        }

        return $mosaic;
    }

    /**
     * Order channels according to user's country.
     *
     * @param array $channels
     */
    public function order(&$channels, $country)
    {
        if (null === $country) {
            throw new \InvalidArgumentException('Parameter $country is null');
        }

        $list = [];

        // Set language id to key and inset channel in it
        foreach ($channels as $channel) {
            $channel['language_priority'] = self::getLanguagePriority($channel, $country);
            $channel['country_priority'] = self::getCountryPriority($channel, $country);
            $list[$channel['language']][$channel['alias']] = $channel;
        }

        // Filter TNT Channels
        $this->filterByTntChannels($list, $country);

        // Filter Theme Channels
        $this->filterByThemeChannels($list, $country);

        // Filter Local channels
        $this->filterByLocaleChannels($list, $country);

        // Filter Internationale channels
        $this->filterByInternationaleChannels($list);

        // Filter other channels
        $this->filterByOtherChannels($list);

        // Filter other locale channels
        $this->filterByOtherLocaleChannels($list);

        // Remove channel
        $flat = [];
        foreach ($list as $channel) {
            if (empty($channel)) {
                continue;
            }
            foreach ($channel as $alias => $value) {
                $flat[$alias] = $value;
            }
        }

        $channels = $flat;
    }

    /**
     * Filter and Order TNT channels.
     *
     * @param array $channels
     *
     * @return array $tntChannels
     */
    protected function filterByTntChannels(&$channels, $country)
    {
        // Filter TNT Channels
        foreach ($channels as $channelLanguage => $channelItem) {
            foreach ($channelItem as $channelAlias => $channelValue) {
                if ($channelValue['category_alias'] !== 'tnt') {
                    continue;
                }

                if ($channelValue['country_code'] !== $country) {
                    continue;
                }

                $channels['tnt'][$channelAlias] = $channelValue;
            }
        }

        // Reorder TNT channels
        if (!empty($channels['tnt'])) {
            uasort($channels['tnt'], function ($channel1, $channel2) {

                if ($channel1['order'] == $channel2['order']) {
                    return strcmp(strtolower($channel1['name']), strtolower($channel2['name']));
                }

                return ($channel1['order'] < $channel2['order']) ? -1 : 1;
            });
        }
    }

    /**
     * Filter and Order Theme channels in user language.
     *
     * @param array $channels
     */
    protected function filterByThemeChannels(&$channels, $country)
    {
        // Filter by Theme
        foreach ($channels as $channelLanguage => $channelItem) {
            if (!IntlUtils::isCountryLanguage($country, $channelLanguage)) {
                continue;
            }

            foreach ($channelItem as $channelAlias => $channelValue) {
                if ('locale' === $channelValue['category_alias']) {
                    continue;
                }

                $channels['theme'][$channelAlias] = $channelValue;

                unset($channels[$channelLanguage][$channelAlias]);
            }
        }

        // Reorder themes channels
        if (!empty($channels['theme'])) {
            uasort($channels['theme'], function ($channel1, $channel2) {

                if ($channel1['theme_order'] == $channel2['theme_order']) {
                    if ($channel1['country_priority'] == $channel2['country_priority']) {
                        if ($channel1['language_priority'] == $channel2['language_priority']) {
                            if ($channel1['country_priority'] == $channel2['country_priority']) {
                                return strcmp(strtolower($channel1['name']), strtolower($channel2['name']));
                            }

                            return ($channel1['country_priority'] < $channel2['country_priority']) ? -1 : 1;
                        }

                        return ($channel1['country_priority'] < $channel2['country_priority']) ? -1 : 1;
                    }

                    return ($channel1['country_priority'] < $channel2['country_priority']) ? -1 : 1;
                }

                return ($channel1['theme_order'] < $channel2['theme_order']) ? -1 : 1;

            });
        }
    }

    /**
     * Filter or Order Local user country channels.
     *
     * @param array $channels
     */
    protected function filterByLocaleChannels(&$channels, $country)
    {
        // Filter by local channels
        foreach ($channels as $channelLanguage => $channelItem) {
            foreach ($channelItem as $channelAlias => $channelValue) {
                if ($channelValue['category_alias'] !== 'locale') {
                    continue;
                }

                if ($channelValue['country_code'] !== $country) {
                    continue;
                }

                $channels['locale'][$channelAlias] = $channelValue;
            }
        }

        // Reorder locale channels
        if (!empty($channels['locale'])) {
            uasort($channels['locale'], function ($channel1, $channel2) {

                if ($channel1['theme_order'] == $channel2['theme_order']) {
                    if ($channel1['country_priority'] == $channel2['country_priority']) {
                        if ($channel1['language_priority'] == $channel2['language_priority']) {
                            if ($channel1['country_priority'] == $channel2['country_priority']) {
                                return strcmp(strtolower($channel1['name']), strtolower($channel2['name']));
                            }

                            return ($channel1['country_priority'] < $channel2['country_priority']) ? -1 : 1;
                        }

                        return ($channel1['country_priority'] < $channel2['country_priority']) ? -1 : 1;
                    }

                    return ($channel1['country_priority'] < $channel2['country_priority']) ? -1 : 1;
                }

                return ($channel1['theme_order'] < $channel2['theme_order']) ? -1 : 1;

            });
        }
    }

    /**
     * Filter and order By Internationale channels but not in country user languages.
     *
     * @param array $channels
     */
    protected function filterByInternationaleChannels(&$channels)
    {
        // Filter by international Channels
        $avoidKey = array('tnt', 'theme', 'locale', 'other');

        foreach ($channels as $channelKey => $channelItem) {
            if (in_array($channelKey, $avoidKey)) {
                continue;
            }

            foreach ($channelItem as $channelAlias => $channelValue) {
                if ($channelValue['category_alias'] !== 'internationale') {
                    continue;
                }

                $channels['internationale'][$channelAlias] = $channelValue;
            }
        }

        // Reorder internationale channels
        if (!empty($channels['internationale'])) {
            uasort($channels['internationale'], function ($channel1, $channel2) {
                if ($channel1['theme_order'] == $channel2['theme_order']) {
                    return strcmp(strtolower($channel1['name']), strtolower($channel2['name']));
                }

                return ($channel1['theme_order'] < $channel2['theme_order']) ? -1 : 1;
            });
        }
    }

    /**
     * Filter and order Other country channels.
     *
     * @param array $channels
     *
     * @return array $otherChannels
     */
    protected function filterByOtherChannels(&$channels)
    {
        // Filter other Channels
        $avoidKey = array('tnt', 'theme', 'locale', 'internationale', 'other', 'other_locale');

        foreach ($channels as $channelKey => $channelItem) {
            if (in_array($channelKey, $avoidKey)) {
                continue;
            }

            foreach ($channelItem as $channelAlias => $channelValue) {
                if ('locale' === $channelValue['category_alias']) {
                    continue;
                }

                $channels['other'][$channelAlias] = $channelValue;

                unset($channels[$channelKey][$channelAlias]);
            }
        }

        // Reorder other channels
        if (!empty($channels['other'])) {
            uasort($channels['other'], function ($channel1, $channel2) {
                if (strcmp(strtolower($channel1['country_name']), strtolower($channel2['country_name'])) == 0) {
                    if ($channel1['theme_order'] == $channel2['theme_order']) {
                        return strcmp(strtolower($channel1['name']), strtolower($channel2['name']));
                    }

                    return ($channel1['theme_order'] < $channel2['theme_order']) ? -1 : 1;
                }

                return strcmp(strtolower($channel1['country_name']), strtolower($channel2['country_name']));
            });
        }
    }

    /**
     * Filter and order Other Locale country channels.
     *
     * @param array $channels
     *
     * @return array $otherChannels
     */
    protected function filterByOtherLocaleChannels(&$channels)
    {
        // Filter by other local Channels
        $avoidKey = array('tnt', 'theme', 'locale', 'internationale', 'other', 'other_locale');

        foreach ($channels as $channelKey => $channelItem) {
            if (in_array($channelKey, $avoidKey)) {
                continue;
            }

            foreach ($channelItem as $channelAlias => $channelValue) {
                $channels['other_locale'][$channelAlias] = $channelValue;

                unset($channels[$channelKey][$channelAlias]);
            }
        }

        // Reorder other locale channels
        if (!empty($channels['other_locale'])) {
            uasort($channels['other_locale'], function ($channel1, $channel2) {
                if ($channel1['theme_order'] == $channel2['theme_order']) {
                    return strcmp(strtolower($channel1['name']), strtolower($channel2['name']));
                }

                return ($channel1['theme_order'] < $channel2['theme_order']) ? -1 : 1;
            });
        }
    }

    /**
     * Remove not available channels in the current country.
     *
     * @param array  $channels
     * @param string $country
     *
     * @return array
     */
    public static function filterByGeoloc(array $channels, $country)
    {
        if (null === $country) {
            throw new \InvalidArgumentException('Parameter $country is null');
        }

        foreach ($channels as $key => $channel) {
            if (!ChannelComponent::isStreamableByCountry($channel, $country)) {
                unset($channels[$key]);
            }
        }

        return $channels;
    }
}
