<?php

namespace Playmedia\Component\Channel;

/**
 * Stream component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Stream
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
     * SQL Select clause.
     */
    private function getSelectClause()
    {
        return $this->conn->createQueryBuilder()
            ->select(
                'stream.id',
                'stream.format',
                'stream.aspect_ratio',
                'stream.scheme',
                'stream.host',
                'stream.port',
                'stream.path',
                'stream.file',
                'stream.bitrate',
                'stream.is_published',
                'stream.is_enabled',
                'stream.is_premium',
                'stream.channel_id',
                'stream.language_code'
            )
            ->from('live_stream', 'stream')
            ->orderBy('stream.bitrate', 'DESC')
        ;
    }

    /**
     * Return collection Streams.
     *
     * @cache 1h
     *
     * @return array
     */
    public function collection($country)
    {
        $cacheKey = 'streams_collection_v2';

        if (!$streams = $this->caching->get($cacheKey)) {
            $qb = $this->getSelectClause()
                ->where('stream.is_enabled = :is_enabled')
                    ->setParameter(':is_enabled', true)
                ->andWhere('stream.is_published = :is_published')
                    ->setParameter(':is_published', true);

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return array();
            }

            $streams = [];

            while ($stream = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $this->outputFormatted($stream);
                $streams[$stream['id']] = $stream;
            }

            $this->caching->set($cacheKey, $streams, 3600);
        }

        self::filter($streams, $this->getGeoConstraints(), $country);

        return $streams;
    }

    private function outputFormatted(&$stream)
    {
        $stream['is_published'] = (bool) $stream['is_published'];
        $stream['is_enabled'] = (bool) $stream['is_enabled'];
        $stream['is_premium'] = (bool) $stream['is_premium'];
    }

    public static function filter(&$streams, $constraints, $countryCode)
    {
        foreach ($constraints as $stream_id => $countryCodes) {
            if (!empty($countryCodes) && !isset($countryCodes[$countryCode])) {
                unset($streams[$stream_id]);
            }
        }
    }

    private function getGeoConstraints()
    {
        $cacheKey = 'streams_geo_constraints';

        if (!$constraints = $this->caching->get($cacheKey)) {
            $qb = $this->conn->createQueryBuilder()
                ->select(
                    'stream_geo.stream_id',
                    'stream_geo.country_code'
                )
                ->from('live_stream_geo', 'stream_geo');

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return array();
            }

            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $constraints = [];
            foreach ($rows as $row) {
                $constraints[$row['stream_id']][$row['country_code']] = $row['country_code'];
            }

            $this->caching->set($cacheKey, $constraints, 3600);
        }

        return $constraints;
    }
}
