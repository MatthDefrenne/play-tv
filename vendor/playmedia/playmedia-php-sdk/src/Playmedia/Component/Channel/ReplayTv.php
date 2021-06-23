<?php

namespace Playmedia\Component\Channel;

/**
 * ReplayTv component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class ReplayTv
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
     * Get List of replay's channel.
     *
     * @cache 1h
     *
     * @return array
     */
    public function getReplaysChannel()
    {
        $cacheKey = 'replays_channel';
        $replaysChannel = $this->caching->get($cacheKey);

        if (false !== $replaysChannel) {
            return $replaysChannel;
        }

        $qb = $this->conn->createQueryBuilder();

        $qb
            ->select('channels_grabbers.channel_id')
            ->from('tv_channels_grabbers', 'channels_grabbers')
        ;

        $stmt = $qb->execute();

        $replaysChannel = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($replaysChannel as &$channel) {
            $channel['replay_count'] = $this->getNumberOfReplaysByChannel($channel['channel_id']);
        }
        $this->caching->set($cacheKey, $replaysChannel, 3600);

        return $replaysChannel;
    }

    /**
     * Get number of replays.
     *
     * @param int $channel_id
     *
     * @return array
     */
    public function getNumberOfReplaysByChannel($channelId)
    {
        $qb = $this->conn->createQueryBuilder();

        $qb
            ->select('COUNT(replay.replay_id) as replay_count')
            ->from('tv_replay', 'replay')
            ->where('replay.active = 1')
            ->andwhere('replay.last_updated_date IS NOT NULL')
            ->andwhere('replay.channel_id = :channelId')
                ->setParameter(':channelId', $channelId)
        ;

        $stmt = $qb->execute();

        if (0 === $stmt->rowCount()) {
            return 0;
        }

        return $stmt->fetch(\PDO::FETCH_COLUMN);
    }
}
