<?php

namespace Playmedia\Component;

use Playmedia\Api\Entity\Account;
use Playmedia\Component\Channel\ProductMatrix;
use Playmedia\Utils\Intl as IntlUtils;

/**
 * Channel component.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class Channel
{
    private $conn;
    private $caching;
    private $staticBaseUrl;
    private $isI18n;

    protected $productMatrix;
    protected $freeProduct;
    protected $streamsCollection;
    protected $geolocsCollection = array();
    protected $channelSocialTv = array();
    protected $channelReplayTv = array();

    const HOTVIDEO_ID = 847;
    const HOTVIDEO_ALIAS = 'hotvideotv';

    protected static $availability = [
        'hotvideotv' => [
            'from' => '23:00:00',
            'to' => '05:00:00',
        ],
        'mce' => [
            'from' => '06:00:00',
            'to' => '23:00:00',
        ],
    ];

    protected static $euronewsLanguage = [
        'AR' => 'ar',
        'DE' => 'de',
        'ES' => 'es',
        'IR' => 'fa',
        'IT' => 'it',
        'PT' => 'pt',
        'RU' => 'ru',
        'TR' => 'tr',
        'UA' => 'uk',
        'GB' => 'en',
        'US' => 'en',
    ];

    /**
     * Constructor.
     *
     * @param mixed $conn          Database connection instance
     * @param mixed $caching       Caching instance
     * @param mixed $staticBaseUrl Playmedia host
     * @param bool  $isI18n
     */
    public function __construct($conn, $caching, $staticBaseUrl, $isI18n = false)
    {
        $this->conn = $conn;
        $this->caching = $caching;
        $this->staticBaseUrl = $staticBaseUrl;
        $this->isI18n = $isI18n;
    }

    /**
     * Set Product Matrix.
     *
     * @param ProductMatrix $account
     *
     * @return $this
     */
    public function setProductMatrix(ProductMatrix $productMatrix)
    {
        $this->productMatrix = $productMatrix;

        return $this;
    }

    public function setFreeProduct(array $freeProduct)
    {
        $this->freeProduct = $freeProduct;

        return $this;
    }

    /**
     * Set Channel Streams.
     *
     * @param array $channelStreams
     *
     * @return $this
     */
    public function setStreamsCollection(array $streamsCollection)
    {
        foreach ($streamsCollection as $stream) {
            $this->streamsCollection[$stream['channel_id']][] = $stream;
        }

        return $this;
    }

    /**
     * Set Channel Geolocs.
     *
     * @param array $channelGeolocs
     *
     * @return $this
     */
    public function setGeolocsCollection($geolocsCollection)
    {
        $this->geolocsCollection = $geolocsCollection;

        return $this;
    }

    /**
     * Set Channel SocialTv.
     *
     * @param array $channelSocialTv
     *
     * @return $this
     */
    public function setChannelSocialTv($channelSocialTv)
    {
        foreach ($channelSocialTv as $channel) {
            $this->channelSocialTv[$channel] = $channel;
        }

        return $this;
    }

    /**
     * Set Channel ReplayTv.
     *
     * @param array $channelReplayTv
     *
     * @return $this
     */
    public function setChannelReplayTv($channelReplayTv)
    {
        foreach ($channelReplayTv as $channel) {
            $this->channelReplayTv[$channel['channel_id']] = $channel;
        }

        return $this;
    }

    public function getSelectClause()
    {
        return $this->conn->createQueryBuilder()
            ->select(
                'channel.channel_id',
                'channel.channel',
                'channel.tvbase',
                'channel.order',
                'channel.alias',
                'channel.theme_id',
                'channel.category_id',
                'channel.tvplayer_id',
                'channel.geoloc',
                'channel.enable',
                'channel.estat',
                'channel.description',
                'channel.tagline',
                'channel.website',
                'channel.live',
                'channel.created',
                'channel.previous_name',
                'channel.is_embed',
                'channel.hashtag',
                'channel.twitter_account',
                'channel.require_login',
                'channel.free_access',
                'channel.access_id',
                'channel.country',
                'channel.language',
                'channel.has_hd',
                'channel.created_at',
                'channel.updated_at'
            )
            ->addSelect(
                'theme.name as theme_name',
                'theme.alias as theme_alias',
                'theme.order as theme_order'
            )
            ->addSelect(
                'category.name as category_name',
                'category.alias as category_alias',
                'category.order as category_order'
            )
            ->addSelect(
                'program_provider.name as program_provider'
            )
            ->from('television_channel', 'channel')
            ->leftjoin('channel', 'television_theme', 'theme', 'theme.id = channel.theme_id')
            ->leftjoin('channel', 'television_category', 'category', 'category.id = channel.category_id')
            ->leftjoin('channel', 'television_channel_program_provider', 'program_provider', 'channel.channel_id = program_provider.channel_id')
        ;
    }

    /**
     * Get channel informations.
     *
     * @cache 1h
     *
     * @param mixed $identifier id|alias
     * @param bool  $isEnable   if wanted only enable channels
     *
     * @return array infos
     */
    public function show($identifier, $isEnable = true)
    {
        $cacheKey = $this->getCacheKey('show', array('identifier' => $identifier));
        $channel = $this->caching->get($cacheKey);

        if (false === $channel) {
            $qb = $this->getSelectClause()
                ->setMaxResults(1)
            ;

            if (is_numeric($identifier)) {
                $qb
                    ->where('channel.channel_id = :channel_id')
                        ->setParameter(':channel_id', $identifier)
                ;
            } else {
                $qb
                    ->where('channel.alias = :alias')
                        ->setParameter(':alias', $identifier)
                ;
            }

            if ($isEnable) {
                $qb
                    ->andWhere('channel.enable = 1')
                ;
            }

            $stmt = $qb->execute();
            if ($stmt->rowCount() === 0) {
                return;
            }
            $channel = $stmt->fetch(\PDO::FETCH_ASSOC);

            $this->outputFormatted($channel);

            $this->caching->set($this->getCacheKey('show', ['identifier' => $channel['id']]), $channel, 3600);
            $this->caching->set($this->getCacheKey('show', ['identifier' => $channel['alias']]), $channel, 3600);
        }

        $channel['has_streams'] = $this->hasStreams($channel['id']);
        $channel['geolocs'] = $this->getChannelGeolocs($channel['id']);
        $channel['products'] = $this->getProducts($channel['id']);
        $channel['has_social_tv'] = $this->hasSocialTv($channel['id']);
        $channel['has_replay_tv'] = $this->hasReplayTv($channel['id']);

        $this->translate($channel);

        return $channel;
    }

    public function has_programs($identifier)
    {
        $qb = $this->conn->createQueryBuilder()
            ->addSelect(
                'channel.tvbase'
            )
            ->addSelect(
                'program_provider.name as program_provider'
            )
            ->from('television_channel', 'channel')
            ->leftjoin('channel', 'television_channel_program_provider', 'program_provider', 'channel.channel_id = program_provider.channel_id')
            ->setMaxResults(1)
        ;

        if (is_numeric($identifier)) {
            $qb
                ->where('channel.channel_id = :channel_id')
                    ->setParameter(':channel_id', $identifier)
            ;
        } else {
            $qb
                ->where('channel.alias = :alias')
                    ->setParameter(':alias', $identifier)
            ;
        }

        $stmt = $qb->execute();
        if ($stmt->rowCount() === 0) {
            return false;
        }
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return null !== $row['tvbase'] || null !== $row['program_provider'];
    }

    public function has_products($identifier)
    {
        if (!is_numeric($identifier)) {
            throw new \InvalidArgumentException('Only numeric values are allowed');
        }

        $products = $this->getProducts($identifier);

        return count($products) > 0;
    }

    public function is_adult($identifier)
    {
        if (is_numeric($identifier)) {
            return $identifier === self::HOTVIDEO_ID;
        }

        return $identifier === self::HOTVIDEO_ALIAS;
    }

    /**
     * Get channels collection.
     *
     * @cache 1h
     *
     * @param bool $isEnable
     *
     * @return array infos
     */
    public function collection($isEnable = true)
    {
        $cacheKey = $this->getCacheKey('collection', array('enable' => $isEnable));
        $channels = $this->caching->get($cacheKey);

        if (false === $channels) {
            $qb = $this->getSelectClause();

            if ($isEnable) {
                $qb->andWhere('channel.enable = 1');
            }

            $stmt = $qb->execute();
            if ($stmt->rowCount() === 0) {
                return array();
            }
            $channels = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($channels as &$channel) {
                $this->outputFormatted($channel);
            }

            $this->caching->set($cacheKey, $channels, 3600);
        }

        foreach ($channels as &$channel) {
            $channel['has_streams'] = $this->hasStreams($channel['id']);
            $channel['geolocs'] = $this->getChannelGeolocs($channel['id']);
            $channel['products'] = $this->getProducts($channel['id']);
            $channel['has_social_tv'] = $this->hasSocialTv($channel['id']);
            $channel['has_replay_tv'] = $this->hasReplayTv($channel['id']);
        }

        array_walk($channels, function (&$channel) {
            $this->translate($channel);
        });

        return $channels;
    }

    /**
     * Output formatted for all application.
     *
     * @param array $channel
     *
     * @return array $channel
     */
    public function outputFormatted(&$channel)
    {
        $channel['id'] = (int) $channel['channel_id'];
        $channel['name'] = $channel['channel'];

        $channel['images'] = array(
            'mini' => sprintf('%s/img/tv_channels/%s_%s.png', $this->staticBaseUrl, $channel['id'], 'mini'),
            'small' => sprintf('%s/img/tv_channels/%s_%s.png', $this->staticBaseUrl, $channel['id'], 'small'),
            'medium' => sprintf('%s/img/tv_channels/%s_%s.png', $this->staticBaseUrl, $channel['id'], 'medium'),
            'large' => sprintf('%s/img/tv_channels/%s_%s.png', $this->staticBaseUrl, $channel['id'], 'large'),
            'source' => sprintf('%s/img/tv_channels/%s_source.png', $this->staticBaseUrl, $channel['id']),
        );

        $channel['channel_url'] = self::getUrl($channel);
        $channel['channel_play_url'] =
        $channel['channel_live_url'] = self::getLiveUrl($channel);
        $channel['channel_broadcast_url'] = self::getBroadcastUrl($channel);
        $channel['channel_replay_url'] = sprintf('/replay-tv/videos/%s/', $channel['alias']);
        $channel['channel_tweet_url'] = sprintf('/live-tweets/%s/', $channel['alias']);

        $channel['theme'] = isset($channel['theme_name']) ? $channel['theme_name'] : null;
        $channel['category'] = isset($channel['category_name']) ? $channel['category_name'] : null;

        if (!empty($channel['program_provider'])) {
            $channel['has_programs'] = true;
        } elseif (!empty($channel['tvbase'])) { // Legacy
            $channel['has_programs'] = true;
        } else {
            $channel['has_programs'] = false;
        }

        // Specific for hotvideo tv (the only wya to know if is a adult channel)
        $channel['is_adult'] = self::HOTVIDEO_ALIAS == $channel['alias'];

        // Specific for channels with it's not diffuse during a timeslot
        $channel['availability'] = $this->timeslotAvailable($channel['alias']);

        $channel['country_code'] = $channel['country'];
        $channel['country_name'] = IntlUtils::getCountryName($channel['country']);

        $channel['is_free'] = in_array($channel['id'], $this->freeProduct['channels']);
    }

    public function hasStreams($channelId)
    {
        if (null === $this->streamsCollection) {
            throw new \LogicException('$this->streamsCollection was never set');
        }

        return isset($this->streamsCollection[$channelId]) && !empty($this->streamsCollection[$channelId]);
    }

    /**
     * Return all channel streams geolocs.
     *
     * @param int $channelId
     *
     * @return array
     */
    public function getChannelGeolocs($channelId)
    {
        return isset($this->geolocsCollection[$channelId]) ? $this->geolocsCollection[$channelId] : [];
    }

    /**
     * Return TRUE if the channel has social TV.
     *
     * @param int $channelId
     *
     * @return bool
     */
    public function hasSocialTv($channelId)
    {
        return isset($this->channelSocialTv[$channelId]);
    }

    /**
     * Return TRUE if the channel has replay TV.
     *
     * @param int $channelId
     *
     * @return bool
     */
    public function hasReplayTv($channelId)
    {
        return isset($this->channelReplayTv[$channelId]);
    }

    /**
     * Get product matrix for a channel.
     *
     * @param int $channelId
     *
     * @return array
     */
    public function getProducts($channelId)
    {
        return empty($this->productMatrix) ? [] : $this->productMatrix->getProductsByChannel($channelId);
    }

    /**
     * Precache each channel.
     *
     * @cache 1h
     *
     * @return array
     */
    public function precacheChannel()
    {
        $qb = $this->getSelectClause();
        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $channelCollection = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($channelCollection as $channel) {
            // cache with Alias
            $cacheKeyByAlias = $this->getCacheKey('show', array('identifier' => $channel['alias']));
            $this->caching->set($cacheKeyByAlias, $channel, 3600);

            // cache with id
            $cacheKeyById = $this->getCacheKey('show', array('identifier' => $channel['channel_id']));
            $this->caching->set($cacheKeyById, $channel, 3600);
        }
    }

    /**
     * Get cache key for specific method.
     *
     * @param string $type
     * @param array  $params
     *
     * @return mixed string on success, otherwise null
     */
    public function getCacheKey($type, $params = null)
    {
        switch ($type) {
            case 'show': // for live broadcast by channel
                if (!isset($params['identifier'])) {
                    return;
                }

                return sprintf('channel_show_%s', $params['identifier']);

            case 'collection': // For broadcasts by program
                if (!isset($params['enable'])) {
                    return;
                }

                return sprintf('channels_collection_%s', $params['enable'] ? 'enabled' : 'disabled');

            default :
                return;
        }
    }

    /**
     * Know if the channel can be streamable during this timeslot.
     *
     * @param string $channelAlias
     *
     * @return array if exist otherwise null
     */
    public function timeslotAvailable($channelAlias)
    {
        return isset(self::$availability[$channelAlias]) ? self::$availability[$channelAlias] : null;
    }

    public static function getUrl($channel, $isI18n = false)
    {
        if ($isI18n) {
            return '/tv-channel/'.$channel['id'].'/'.$channel['alias'].'/';
        }

        return '/chaine-tv/'.$channel['alias'].'/';
    }

    public static function getLiveUrl($channel, $isI18n = false)
    {
        if ($isI18n) {
            return '/live-tv/'.$channel['id'].'/'.$channel['alias'].'/';
        }

        return '/television/'.$channel['alias'].'/';
    }

    public static function getBroadcastUrl($channel, $isI18n = false)
    {
        if ($isI18n) {
            return '/tv-channel/'.$channel['id'].'/'.$channel['alias'].'/listings/';
        }

        return '/programmes-tv/'.$channel['alias'].'/';
    }

    public function translate(&$channel)
    {
        $channel['channel_url'] = self::getUrl($channel, $this->isI18n);
        $channel['channel_play_url'] =
        $channel['channel_live_url'] = self::getLiveUrl($channel, $this->isI18n);
        $channel['channel_broadcast_url'] = self::getBroadcastUrl($channel, $this->isI18n);
    }

    public static function isTnt($channel)
    {
        return 2 == $channel['category_id'];
    }

    public static function getEuronewsLanguage($country, $default)
    {
        if (isset(self::$euronewsLanguage[$country])) {
            return self::$euronewsLanguage[$country];
        }

        return $default;
    }

    public static function isStreamableByCountry($channel, $country)
    {
        if (null === $country) {
            throw new \InvalidArgumentException('Parameter $country is null');
        }

        if (empty($channel['geolocs'])) {
            return true;
        }

        return isset($channel['geolocs'][$country]);
    }

    public static function isStreamableByAccount($channel, $account = null)
    {
        if ($channel['is_free']) {
            return true;
        }

        // If account is connected, check subscriptions
        if (null !== $account) {
            $account_products = [];
            foreach ($account['subscriptions'] as $subscription) {
                $account_products[] = $subscription['product']['id'];
            }

            $channel_products = [];
            foreach ($channel['products'] as $product) {
                $channel_products[] = $product['id'];
            }

            $matches = array_intersect($channel_products, $account_products);

            return count($matches) > 0;
        }

        return false;
    }

    /**
     * Return stream_acess, is_watchable & streamable keys.
     *
     * @param array  $channel
     * @param string $country
     * @param mixed  $account
     *
     * @return array
     */
    public static function getStreamingKeys(array $channel, $country, $account = null)
    {
        if (null === $country) {
            throw new \InvalidArgumentException('Parameter $country is null');
        }

        $channel['stream_access'] = [
            'country' => self::isStreamableByCountry($channel, $country),
            'account' => self::isStreamableByAccount($channel, $account),
        ];

        // unstreamable channel (for whatever reasons) : none
        // streamable via wse : internal
        // streamable via iframe, public stream, website url : external
        $channel['streaming_source'] = 'none';
        if ($channel['stream_access']['country']) {
            if ($channel['has_streams']) {
                $channel['streaming_source'] = 'internal';
            } elseif (null !== $channel['live']) {
                $channel['streaming_source'] = 'external';
            }
        }

        $channel['streamable'] = ('none' !== $channel['streaming_source']);

        // unstreamable (for whatever reasons) : none
        // streamable internal = wse
        // streamable external iframe url = iframe
        // streamable external stream url = stream
        // streamable external raw url = website
        $channel['streaming_spec'] = 'none';
        if ($channel['streamable']) {
            if ('internal' === $channel['streaming_source']) {
                $channel['streaming_spec'] = 'wse';
            } elseif ('external' === $channel['streaming_source']) {
                if (false !== strpos($channel['live'], 'iframe|')) {
                    $channel['streaming_spec'] = 'iframe';
                    $channel['live'] = substr($channel['live'], strlen('iframe|'));
                } elseif (false !== strpos($channel['live'], 'stream|')) {
                    $channel['streaming_spec'] = 'stream';
                    $channel['live'] = substr($channel['live'], strlen('stream|'));
                } else {
                    $channel['streaming_spec'] = 'website';
                }
            }
        }

        return $channel;
    }
}
