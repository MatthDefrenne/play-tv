<?php

namespace Playmedia\Component\Channel;

/**
 * Geoloc component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Geoloc
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
     * Return all channel geolocs.
     *
     * @cache 1h
     *
     * @return array
     */
    public function collection()
    {
        $cacheKey = 'geolocs_collection';
        if (!$geolocs = $this->caching->get($cacheKey)) {
            $qb = $this->conn->createQueryBuilder();

            $qb
                ->select(
                    'channels_geoloc.channel_id',
                    'channels_geoloc.country_id'
                )
                ->from('tv_channels_geoloc', 'channels_geoloc');

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return array();
            }

            $geolocs = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $geolocs[$row['channel_id']][$row['country_id']] = $row['country_id'];
            }

            $this->caching->set($cacheKey, $geolocs, 3600);
        }

        return $geolocs;
    }
}
