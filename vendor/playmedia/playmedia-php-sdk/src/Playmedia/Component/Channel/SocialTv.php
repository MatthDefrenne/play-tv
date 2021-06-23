<?php

namespace Playmedia\Component\Channel;

/**
 * SocialTv component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class SocialTv
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
     * Get List of social tv's channel.
     *
     * @return array
     */
    public function collection()
    {
        $cacheKey = 'social_tv_collection';
        $socialTvCollection = $this->caching->get($cacheKey);

        if (false !== $socialTvCollection) {
            return $socialTvCollection;
        }

        $qb = $this->conn->createQueryBuilder();

        $qb
            ->select('searchs.channel_id')
            ->from('tw_searchs', 'searchs')
            ->where('searchs.channel_id IS NOT NULL')
        ;

        $stmt = $qb->execute();

        $socialTvCollection = $stmt->fetchAll(\PDO::FETCH_COLUMN);

        $this->caching->set($cacheKey, $socialTvCollection, 3600);

        return $socialTvCollection;
    }
}
