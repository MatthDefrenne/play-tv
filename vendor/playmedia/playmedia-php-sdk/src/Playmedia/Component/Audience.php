<?php

namespace Playmedia\Component;

use Playmedia\Component\Channel as ChannelComponent;
use Playmedia\Component\Broadcast as BroadcastComponent;

/**
 * Audience component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Audience
{
    private $conn;
    private $caching;
    private $channelComponent;
    private $broadcastComponent;

    const TOPLIVE_BY_HOUR = 'toplive_hour';
    const TOPLIVE_BY_DAY = 'toplive_day';
    const TOPLIVE_TREND_UP = 'toplive_by_trend_up';
    const TOPLIVE_TREND_DOWN = 'toplive_by_trend_down';

    /**
     * Constructor.
     *
     * @param mixed              $conn               Database connection instance
     * @param mixed              $caching            Caching instance
     * @param ChannelComponent   $channelComponent   Channel Component
     * @param BroadcastComponent $broadcastComponent Broadcast Component
     */
    public function __construct($conn, $caching, ChannelComponent $channelComponent, BroadcastComponent $broadcastComponent)
    {
        $this->conn = $conn;
        $this->caching = $caching;
        $this->channelComponent = $channelComponent;
        $this->broadcastComponent = $broadcastComponent;
    }

    /**
     * Get share by hour.
     *
     * @param string $country
     * @param int    $limit
     * @param string $channelAlias
     *
     * @return array $audiences
     */
    public function shareByHour($country, $limit = null, $channelAlias = null)
    {
        $audiencesFromCache = $this->fetch(static::TOPLIVE_BY_HOUR);

        if (false === $audiencesFromCache) {
            return;
        }

        if (isset($channelAlias)) { // Get only the channel we want
            $audiencesFromCache = array_filter($audiencesFromCache, function ($audience) use ($channelAlias) {
                return (bool) ($channelAlias === $audience['alias']);
            });
        }

        $audiences = array();
        foreach ($audiencesFromCache as $key => $audienceFromCache) {
            $audience = $this->outputFormatted($audienceFromCache, $country);

            if (null !== $audience) {
                $audiences[] = $audience;

                if (count($audiences) == $limit) {
                    break;
                }
            }
        }

        return $audiences;
    }

    /**
     * Get share by day.
     *
     * @return array $audiences
     */
    public function shareByDay($country)
    {
        $audiencesFromCache = $this->fetch(static::TOPLIVE_BY_DAY);

        if (false === $audiencesFromCache) {
            return;
        }

        $audiences = array();
        foreach ($audiencesFromCache as $key => $audienceFromCache) {
            $audience = $this->outputFormatted($audienceFromCache, $country);

            if (null !== $audience) {
                $audiences[] = $audience;
            }
        }

        return $audiences;
    }

    /**
     * Get the 5 first trend up.
     *
     * @return array $audiences
     */
    public function trendUp($country)
    {
        $audiencesFromCache = $this->fetch(static::TOPLIVE_TREND_UP);

        if (false === $audiencesFromCache) {
            return;
        }

        $audiences = array();
        $limit = 5;
        foreach ($audiencesFromCache as $key => $audienceFromCache) {
            $audience = $this->outputFormatted($audienceFromCache, $country);

            if (null !== $audience) {
                $audiences[] = $audience;

                if (count($audiences) == $limit) {
                    break;
                }
            }
        }

        return $audiences;
    }

    /**
     * Get the 5 first trend down.
     *
     * @return array $audiences
     */
    public function trendDown($country)
    {
        $audiencesFromCache = $this->fetch(static::TOPLIVE_TREND_DOWN);

        if (false === $audiencesFromCache) {
            return;
        }

        $audiences = array();
        $limit = 5;
        foreach ($audiencesFromCache as $key => $audienceFromCache) {
            $audience = $this->outputFormatted($audienceFromCache, $country);

            if (null !== $audience) {
                $audiences[] = $audience;

                if (count($audiences) == $limit) {
                    break;
                }
            }
        }

        return $audiences;
    }

    /**
     * Store audience data in memcached.
     *
     * @return array $audiences
     */
    public function storeData()
    {
        $shareByHour = $this->getAudience('hour');
        if ($shareByHour !== false) {
            $this->save(static::TOPLIVE_BY_HOUR, $shareByHour);
        }

        $shareByDay = $this->getAudience('day');
        if ($shareByDay !== false) {
            $this->save(static::TOPLIVE_BY_DAY, $shareByDay);
        }

        $trendUp = $this->getAudience('trend_up');
        if ($trendUp !== false) {
            $this->save(static::TOPLIVE_TREND_UP, $trendUp);
        }

        $trendDown = $this->getAudience('trend_down');
        if ($trendDown !== false) {
            $this->save(static::TOPLIVE_TREND_DOWN, $trendDown);
        }
    }

    /**
     * Get Audience.
     *
     * @param string $list        can be hour, day, trend_up or trend_down
     * @param string $last_update
     */
    private function getAudience($list)
    {
        // Get last updated audience
        $lastUpdate = $this->getLastUpdateAudience();

        $sql =
<<<_
SELECT s.session_id, s.channel_id, s.last_update, s.sessions, s.trend, s.difference, c.alias FROM tv_sessions as s
INNER JOIN television_channel as c ON c.channel_id = s.channel_id
_;
        switch ($list) {
            case 'hour':

                $sql .=
<<<_

WHERE `last_update` = :lastUpdate
ORDER BY sessions DESC
_;
                break;

            case 'day':
                $lastUpdate = (date('G') > 0 ? date('Y-m-d 00:00:00') : (date('Y-m-d 00:00:00', strtotime(date('Y-m-d 00:00:00')) - 86400)));
                $sql .=
<<<_

WHERE `last_update` >= :lastUpdate
ORDER BY sessions DESC
_;
                break;

            case 'trend_up':
                $sql .=
<<<_

WHERE `last_update` = :lastUpdate
ORDER BY trend DESC
_;
                break;

            case 'trend_down':
                $sql .=
<<<_

WHERE `last_update` = :lastUpdate
ORDER BY trend ASC
_;
                break;

            default:
                return false;
        }

        $sql .=
<<<_
, c.order ASC
_;

        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':lastUpdate', $lastUpdate, \PDO::PARAM_STR);

        $statement->execute();

        if ($statement->rowCount() === 0) {
            return false;
        }

        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $audiences = array();
        $total = $this->getTotalAudience($list, $lastUpdate);

        foreach ($results as $result) {
            if ('day' === $list || 'hour' === $list) {
                if (isset($audiences[$result['alias']])) {
                    $audiences[$result['alias']]['sessions'] += $result['sessions'];
                    $audiences[$result['alias']]['trend'] += $result['trend'];
                    $audiences[$result['alias']]['difference'] += $result['difference'];
                } else {
                    $audiences[$result['alias']] = $result;
                }

                $audiences[$result['alias']]['share'] = ($audiences[$result['alias']]['sessions'] / $total) * 100;
            } else {
                $audiences[$result['alias']] = $result;
                $audiences[$result['alias']]['share'] = ($result['difference'] / $total) * 100;
            }
        }

        if ('day' === $list || 'hour' === $list) {
            uasort($audiences, function ($audience1, $audience2) {
                if ($audience1['share'] == $audience2['share']) {
                    return 0;
                }

                return ($audience1['share'] > $audience2['share']) ? -1 : 1;
            });
        }

        return $audiences;
    }

    /**
     * Get Last update audience date.
     *
     * @param string $lastUpdate
     */
    public function getLastUpdateAudience()
    {
        $sql =
<<<_
SELECT last_update
FROM tv_sessions
ORDER BY last_update DESC
LIMIT 0,1
_;

        $statement = $this->conn->prepare($sql);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_COLUMN);
    }

    /**
     * Get total Audience.
     *
     * @param string $list        can be day or other
     * @param string $last_update date of last updating audience
     *
     * @return int
     */
    private function getTotalAudience($list, $lastUpdate)
    {
        if ('day' === $list) {
            $sql =
<<<_
SELECT SUM(sessions) as total
FROM tv_sessions
WHERE `last_update` >= :lastUpdate
_;
        } elseif ('hour' === $list) {
            $sql =
<<<_
SELECT SUM(sessions) as total
FROM tv_sessions
WHERE `last_update` = :lastUpdate
_;
        } else {
            $sql =
<<<_
SELECT SUM(difference) as total
FROM tv_sessions
WHERE `last_update` = :lastUpdate
_;
        }

        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':lastUpdate', $lastUpdate, \PDO::PARAM_STR);
        $statement->execute();

        $results = $statement->fetch(\PDO::FETCH_ASSOC);

        return $results['total'];
    }

    /**
     * Get audience data from memcached.
     *
     * @param string $key
     *
     * @return mixed array|false
     */
    private function fetch($key)
    {
        return $this->caching->get($key);
    }

    /**
     * Save audience data in memcached.
     *
     * @param string $key
     * @param array  $data
     *
     * @return mixed array|false
     */
    private function save($key, $data)
    {
        $this->caching->set($key, $data, 0);

        return $this;
    }

    /**
     * Formatted output by adding channel and live program for an audience.
     *
     * @param array  $audience
     * @param string $country
     *
     * @return array $audience
     */
    public function outputFormatted($audience, $country)
    {
        if (!$channel = $this->channelComponent->show($audience['alias'])) {
            return;
        }

        $channel = ChannelComponent::getStreamingKeys($channel, $country);

        if (!$channel['streamable']) {
            return;
        }

        // Hydrate channel object in audience
        $audience['channel'] = $channel;

        // Get Broadcast Live
        $broadcastCacheKey = $this->broadcastComponent->getCacheKey('live_broadcast_by_channel', array('channel_alias' => $audience['alias']));
        $broadcastLive = $this->caching->get($broadcastCacheKey);

        if (false === $broadcastLive) {
            $broadcastLive = (true === $audience['channel']['has_programs']) ? $this->broadcastComponent->getLiveBroadcastByChannel($audience['alias']) : null;
        }

        $audience['broadcast'] = $broadcastLive;

        return $audience;
    }
}
