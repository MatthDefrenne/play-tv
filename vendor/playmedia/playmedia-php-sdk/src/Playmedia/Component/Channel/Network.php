<?php

namespace Playmedia\Component\Channel;

/**
 * Network component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Network
{
    private $conn;
    private $caching;

    /**
     * Constructor.
     *
     * @param mixed $conn    Database connection instance
     * @param mixed $caching Caching instance
     */
    public function __construct($conn, $caching)
    {
        $this->conn = $conn;
        $this->caching = $caching;
    }

    /**
     * Get networks.
     *
     * @cache 1h
     *
     * @return array networks
     */
    public function collection()
    {
        $cacheKey = 'network_collection';
        $networks = $this->caching->get($cacheKey);

        if (false !== $networks) {
            return $networks;
        }

        $qb = $this->conn->createQueryBuilder();

        $qb
            ->select(
                'networks.network',
                'networks.alias',
                'networks.enable'
            )
            ->from('tv_networks', 'networks')
        ;

        $stmt = $qb->execute();

        $networks = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $networks = array_merge(array(
            array('network' => 'TNT', 'alias' => 'tnt', 'enable' => 1),
        ), $networks);

        $this->caching->set($cacheKey, $networks, 3600);

        return $networks;
    }

    /**
     * Get network show.
     *
     * @cache 1h
     *
     * @param string $networkAlias
     *
     * @return array networks
     */
    public function show($networkAlias)
    {
        $cacheKey = "network_{$networkAlias}";
        $network = $this->caching->get($cacheKey);

        if (false !== $network) {
            return $network;
        }

        if ('tnt' === $networkAlias) {
            $network = array(
               'network' => 'TNT',
               'alias' => 'tnt',
               'enable' => 1,
            );
        } else {
            $qb = $this->conn->createQueryBuilder();

            $qb
                ->select(
                    'networks.network',
                    'networks.alias',
                    'networks.enable'
                )
                ->from('tv_networks', 'networks')
                ->where('networks.alias = :alias')
                    ->setParameter(':alias', $networkAlias)
            ;

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return;
            }

            $network = $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        $this->caching->set($cacheKey, $network, 3600);

        return $network;
    }

    /**
     * Precache each channel network.
     *
     * @cache 1h
     *
     * @return array
     */
    public function precacheChannelNetwork()
    {
        $qb = $this->conn->createQueryBuilder();

        $qb
            ->select(
                'networks.network',
                'networks.alias',
                'networks.enable'
            )
            ->from('tv_networks', 'networks')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $channelNetworkCollection = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($channelNetworkCollection as $channel) {
            $cacheKey = "network_{$channel['alias']}";
            $this->caching->set($cacheKey, $channel, 3600);
        }
    }

    /**
     * Get channels network.
     *
     * @cache 1h
     *
     * @param string $networkAlias
     *
     * @return mixed array
     */
    public function getChannelsNetwork($networkAlias)
    {
        $cacheKey = "channels_network_{$networkAlias}";
        $channelsNetwork = $this->caching->get($cacheKey);

        if (false !== $channelsNetwork) {
            return $channelsNetwork;
        }

        $qb = $this->conn->createQueryBuilder();

        $qb
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
                'channel.language_id',
                'channel.country',
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
            ->from('television_channel', 'channel')
            ->innerjoin('channel', 'tv_networks_channels', 'network_channels', 'network_channels.channel_id = channel.channel_id')
            ->innerjoin('network_channels', 'tv_networks', 'networks', 'networks.network_id = network_channels.network_id')
            ->leftjoin('channel', 'television_theme', 'theme', 'theme.id = channel.theme_id')
            ->leftjoin('channel', 'television_category', 'category', 'category.id = channel.category_id')
            ->where('channel.tvbase IS NOT NULL')
            ->andwhere('networks.alias = :alias')
                ->setParameter(':alias', $networkAlias)
            ->orderby('network_channels.order', 'ASC')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return array();
        }

        $channelsNetwork = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $this->caching->set($cacheKey, $channelsNetwork, 3600);

        return $channelsNetwork;
    }
}
