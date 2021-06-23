<?php

namespace Playmedia\Component;

use Playmedia\Component\Channel as ChannelComponent;
use Playmedia\Component\Program as ProgramComponent;
use Playmedia\Program\Broadcast\Daypart;
use Playmedia\Program\Broadcast\DaypartFactory;
use Playmedia\Program\Broadcast\DaypartFactoryFr;

/**
 * Broadcast component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Broadcast
{
    private $conn;
    private $caching;
    private $channelComponent;
    private $programComponent;
    protected $daypartFactory;

    const GENRE_NEWS = 18;

    /**
     * Constructor.
     *
     * @param mixed            $conn             Database connection instance
     * @param mixed            $caching          Caching instance
     * @param ChannelComponent $channelComponent channel Component
     * @param ProgramComponent $programComponent program Component
     */
    public function __construct($conn, $caching, ChannelComponent $channelComponent, ProgramComponent $programComponent)
    {
        $this->conn = $conn;
        $this->caching = $caching;
        $this->channelComponent = $channelComponent;
        $this->programComponent = $programComponent;
        $this->daypartFactory = new DaypartFactoryFr();
    }

    public function setDaypartFactory(DaypartFactory $daypartFactory)
    {
        $this->daypartFactory = $daypartFactory;

        return $this;
    }

    protected function applyProgress(&$broadcast)
    {
        if (!is_array($broadcast) || empty($broadcast)) {
            return;
        }

        $start = new \DateTime($broadcast['start']);

        $diff = $start->diff(new \DateTime('now'));
        $hours = $diff->format('%h');
        $minutes = $diff->format('%i');
        $elapsed = (($hours * 60) + $minutes);

        if ($broadcast['bcast_duration'] > 0) {
            $broadcast['progress'] = ($elapsed * 100) / $broadcast['bcast_duration'];
        } elseif ($broadcast['program']['duration'] > 0) {
            $broadcast['progress'] = ($elapsed * 100) / $broadcast['program']['duration'];
        } else {
            $broadcast['progress'] = 0; // no duration => no progress
        }

        $broadcast['elapsed'] = array(
            'percent' => floor($broadcast['progress']),
            'minutes' => $elapsed,
        );
    }

    protected function getLiveBroadcastCacheTtl($broadcast)
    {
        return strtotime($broadcast['end']) - time();
    }

    /**
     * Get Live Broadcasts.
     *
     * @param  mixed array channel(s)
     *
     * @return array
     */
    public function getLiveBroadcasts($channels)
    {
        // Get Multi Key
        $cacheKeys = array();
        foreach ($channels as $channel) {
            $cacheKeys[$channel['alias']] = $this->getCacheKey('live_broadcast_by_channel', array('channel_alias' => $channel['alias']));
        }

        $multiKeys = $this->caching->getMulti($cacheKeys);

        $liveBroadcasts = array();
        foreach ($channels as $channel) {
            if (!$channel['has_programs']) {
                continue;
            }

            $broadcast = isset($multiKeys[$cacheKeys[$channel['alias']]]) ? $multiKeys[$cacheKeys[$channel['alias']]] : null;
            if (!$broadcast) {
                if (!$broadcast = $this->getLiveBroadcastByChannel($channel['alias'])) {
                    continue;
                }
            }

            if (!isset($broadcast['progress'], $broadcast['elapsed'])) {
                $this->applyProgress($broadcast);
            }

            $liveBroadcasts[$channel['id']] = $broadcast;
        }

        return $liveBroadcasts;
    }

    /**
     * Get live broadcast by channel.
     *
     * @param mixed string|integer $identifier
     *
     * @return mixed null|array $broadcast
     */
    public function getLiveBroadcastByChannel($identifier)
    {
        $channelAlias = $this->getChannelAlias($identifier);
        $cacheKey = $this->getCacheKey('live_broadcast_by_channel', array('channel_alias' => $channelAlias));

        if (!$live = $this->caching->get($cacheKey)) {
            $broadcasts = $this->_getDailyBroadcastByChannel($channelAlias, date('Y-m-d'));
            foreach ($broadcasts as $broadcast) {
                if ($broadcast['is_live']) {
                    $ttl = $this->getLiveBroadcastCacheTtl($broadcast);
                    if ($ttl > 0) {
                        $this->caching->set($cacheKey, $broadcast, $ttl);
                    }
                    $live = $broadcast;
                    break;
                }
            }
        }

        if (!empty($live)) {
            $this->applyProgress($live);

            return $live;
        }

        return;
    }

    /**
     * @param DateTime $date
     * @param string   $name
     */
    protected function getDaypart(\DateTime $date, $name)
    {
        return $this->daypartFactory->createDaypart($name, $date);
    }

    /**
     * Returns the most relevant brodcast dependending on $daypart.
     *
     * @param array   $broadcasts
     * @param array   $channel
     * @param Daypart $daypart
     * @param array   $exclude
     */
    public static function pickBroadcastByDaypart(array $broadcasts, array $channel, Daypart $daypart, $exclude = null)
    {
        if (!empty($exclude)) {
            $broadcasts = array_filter($broadcasts, function ($broadcast) use ($exclude) {
                if ($broadcast['broadcast_id'] === $exclude['broadcast_id']) {
                    return false;
                }

                return true;
            });
        }

        foreach ($broadcasts as $broadcast) {
            if (DaypartFactory::PRIMETIME_EARLY_FRINGE === (string) $daypart) {
                if (null !== $channel['tvbase'] && 1 == $broadcast['prime']) {
                    return $broadcast;
                }
            }
            if (DaypartFactory::PRIMETIME_LATE_FRINGE === (string) $daypart) {
                if (null !== $channel['tvbase'] && 2 == $broadcast['prime']) {
                    return $broadcast;
                }
            }
            if (DaypartFactory::LATE_NIGHT === (string) $daypart && $broadcast['prime'] != 1 && $broadcast['prime'] != 2 && $broadcast['bcast_duration'] > 20) {
                return $broadcast;
            }
        }

        // TODO
        // Avoid having the same program in early fringe & late fringe
        // Keep only broadcasts starting after the beginning of the daypart
        $genreNews = self::GENRE_NEWS;
        $broadcasts = array_filter($broadcasts, function ($broadcast) use ($genreNews) {
            if (isset($broadcast['program']['gender_id'])) {
                return $broadcast['program']['gender_id'] != $genreNews;
            }

            return true;
        });

        // Sort broadcasts by duration
        uasort($broadcasts, function ($a, $b) {
            if ($a['bcast_duration'] === $b['bcast_duration']) {
                return 0;
            }

            return $a['bcast_duration'] > $b['bcast_duration'] ? -1 : 1;
        });

        $longest = array_shift($broadcasts);

        return $longest;
    }

    /**
     * Get prime broadcast by channel.
     *
     * @param string $date
     * @param array  $channelsList
     * @param string $context      can be primetime|latefringe|graveyard
     * @param array  $exclude      list of broadcasts by channel to exclude
     *
     * @return array $broadcast
     */
    public function getPrimeBroadcasts($date, $channelsList, $context = 'primetime', $exclude = array())
    {
        $daypart = $this->getDaypart(new \DateTime($date), $context);

        $broadcastsByChannels = $this->_getTimeslotBroadcast(
            $daypart->getStart()->format('Y-m-d H:i:s'),
            $daypart->getEnd()->format('Y-m-d H:i:s'),
            $channelsList
        );

        $primeBroadcasts = array();
        foreach ($broadcastsByChannels as $channel) {
            $excludeBroadcast = null;
            if (isset($exclude[$channel['channel_id']]) && !empty($exclude[$channel['channel_id']]['broadcast_id'])) {
                $excludeBroadcast = $exclude[$channel['channel_id']];
            }
            $primeBroadcasts[$channel['channel_id']] = self::pickBroadcastByDaypart($channel['broadcasts'], $channel, $daypart, $excludeBroadcast);
        }

        return $primeBroadcasts;
    }

    /**
     * Get next broadcast by channel.
     *
     * @param mixed integer|string $identifier
     *
     * @return array $nextBroadcast
     */
    public function getNextBroadcastByChannel($identifier)
    {
        $channelAlias = $this->getChannelAlias($identifier);

        $datetime = new \DateTime();
        $datetime->createFromFormat('Y-m-d H:i:s', time());

        $dailyBroadcast = $this->_getDailyBroadcastByChannel($channelAlias, $datetime->format('Y-m-d'));

        $nextBroadcasts = array_filter($dailyBroadcast, function (&$broadcast) use ($datetime) {
            if (($datetime->format('Y-m-d H:i:s') >= $broadcast['start'] && $datetime->format('Y-m-d H:i:s') < $broadcast['end']) || $datetime->format('Y-m-d H:i:s') < $broadcast['start']) {
                $broadcast['start_in'] = (int) floor((strtotime($broadcast['start']) - $datetime->getTimestamp()) / 60);

                return $broadcast;
            }
        });

        return $nextBroadcasts;
    }

    /**
     * Get next broadcast by program.
     *
     * @param int   $programId
     * @param array $channelCollection
     *
     * @return array $nextBroadcastList
     */
    public function getNextBroadcastByProgram($programId, $channelCollection)
    {
        $broadcastList = $this->getBroadcastByProgram($programId, $channelCollection);

        $now = date('Y-m-d H:i:s'); // TODO Add $now parameter

        $nextBroadcastList = array_filter($broadcastList, function (&$broadcast) use ($now) {

            if ($broadcast['start'] > $now) {
                $broadcast['start_in'] = (int) floor((strtotime($broadcast['start']) - strtotime($now)) / 60);

                return $broadcast;
            }
        });

        return $nextBroadcastList;
    }

    /**
     * Get previous broadcast by program.
     *
     * @param int   $programId
     * @param array $channelCollection
     *
     * @return array $previousBroadcastList
     */
    public function getPreviousBroadcastByProgram($programId, $channelCollection)
    {
        $broadcastList = $this->getBroadcastByProgram($programId, $channelCollection);

        $now = date('Y-m-d H:i:s'); // TODO Add $now parameter

        $previousBroadcastList = array_filter($broadcastList, function (&$broadcast) use ($now) {
            if ($broadcast['start'] < $now) {
                return $broadcast;
            }
        });

        return $previousBroadcastList;
    }

    /**
     * Get preivous Broadcasts by year.
     *
     * @param int $programId
     *
     * @return array
     */
    public function getPreviousBroadcastsByYear($programId, $channelCollection)
    {
        $previousBroadcasts = $this->getPreviousBroadcastByProgram($programId, $channelCollection);

        $broadcasts = array();
        foreach ($previousBroadcasts as $broadcast) {
            $broadcasts[date('Y', strtotime($broadcast['start']))][] = $broadcast;
        }

        return $broadcasts;
    }

    /**
     * Get program broadcast list.
     *
     * @cache 12h
     *
     * @param int   $programId
     * @param array $channelCollection
     * @param int   $limit
     *
     * @return array
     */
    public function getBroadcastByProgram($programId, $channelCollection, $limit = 10)
    {
        $cacheKey = $this->getCacheKey('broadcasts_by_program', array('program_id' => $programId));

        if (!$broadcasts = $this->caching->get($cacheKey)) {
            $broadcasts = $this->getBroadcastByProgramFromSql($programId, $limit);
            $this->caching->set($cacheKey, $broadcasts, 43200);
        }

        foreach ($broadcasts as &$broadcast) {
            $this->outputFormatted($broadcast);
            if (isset($channelCollection[$broadcast['channel_id']])) {
                $channel = $channelCollection[$broadcast['channel_id']];
                $this->channelComponent->translate($channel);
                $broadcast['channel'] = $channel;
            } else {
                $broadcast['channel'] = null;
            }
        }

        return $broadcasts;
    }

    /**
     * Get Broadcast By program from database.
     *
     * @param int $programId
     * @param int $limit
     *
     * @return mixed
     */
    public function getBroadcastByProgramFromSql($programId, $limit)
    {
        $qb = $this->conn->createQueryBuilder();

        $qb
            ->select(
                'broadcasts.broadcast_id',
                'broadcasts.tvbase',
                'broadcasts.channel_id',
                'broadcasts.start',
                'broadcasts.end',
                'broadcasts.duration as bcast_duration',
                'broadcasts.prime',
                'broadcasts.showview',
                'broadcasts.live',
                'broadcasts.encrypted',
                'broadcasts.subtitles',
                'broadcasts.version',
                'broadcasts.sound',
                'broadcasts.color'
            )
            ->addSelect(
                'programs.program_id',
                'programs.image_id',
                'programs.sf_image_id',
                'programs.csa_id',
                'programs.title',
                'programs.subtitle',
                'programs.originaltitle',
                'programs.duration',
                'programs.part',
                'programs.parts',
                'programs.episode',
                'programs.episodes',
                'programs.season',
                'programs.year',
                'programs.stars',
                'programs.summary_short',
                'programs.summary_long',
                'programs.hashtag',
                'programs.trailer'
            )
            ->addSelect(
                'channel.alias as channel_alias',
                'channel.channel'
            )
            ->from('tv_broadcasts', 'broadcasts')
            ->innerjoin('broadcasts', 'tv_programs', 'programs', 'programs.program_id = broadcasts.program_id')
            ->innerjoin('broadcasts', 'television_channel', 'channel', 'channel.channel_id = broadcasts.channel_id')
            ->where('programs.program_id = :programId')
                ->setParameter(':programId', $programId)
            ->orderby('broadcasts.start', 'DESC')
            ->setMaxResults($limit)
        ;

        $stmt = $qb->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function uniqueBroadcasts(array $broadcasts)
    {
        $broadcastsById = array();
        foreach ($broadcasts as $key => $broadcast) {
            $broadcastsById[$broadcast['id']][] = $key;
        }
        foreach ($broadcastsById as $id => $keys) {
            if (count($keys) > 1) {
                $firstKey = array_shift($keys);
                foreach ($keys as $key) {
                    unset($broadcasts[$key]);
                }
            }
        }

        return array_values($broadcasts);
    }

    /**
     * Get next broadcast by channel.
     *
     * @param string $startDate    as '2014-07-26 05:00:00'
     * @param string $endDate      as '2014-07-26 05:00:00'
     * @param array  $channelsList
     *
     * @return array $broadcast
     */
    public function getTimeslotBroadcast($startDate, $endDate, $channelsList)
    {
        return $this->_getTimeslotBroadcast($startDate, $endDate, $channelsList);
    }

    protected function _getTimeslotBroadcast($startDate, $endDate, $channelsList)
    {
        $timeslotBroadcast = array();

        $start = new \DateTime($startDate);
        $end = new \DateTime($endDate);

        $dates = array(
            $start->format('Y-m-d'),
        );
        if ($start->format('Y-m-d') !== $end->format('Y-m-d')) {
            $dates[] = $end->format('Y-m-d');
        }

        $cacheKeys = array();
        foreach ($channelsList as $channel) {
            foreach ($dates as $date) {
                $cacheKey = $channel['alias'].'-'.$date;
                $cacheKeys[$cacheKey] = $this->getCacheKey('daily_broadcasts', array(
                    'channel_alias' => $channel['alias'],
                    'date' => $date,
                ));
            }
        }

        $cacheValues = $this->caching->getMulti($cacheKeys);

        foreach ($channelsList as $channel) {
            $broadcastsByChannel = array();
            foreach ($dates as $date) {
                $cacheKey = $cacheKeys[$channel['alias'].'-'.$date];
                $broadcastsByDate = array();
                if (isset($cacheValues[$cacheKey])) {
                    $broadcastsByDate = $cacheValues[$cacheKey];
                    foreach ($broadcastsByDate as &$broadcast) {
                        $this->outputFormatted($broadcast);
                    }
                } elseif ($channel['has_programs']) {
                    $broadcastsByDate = $this->_getDailyBroadcastByChannel($channel['alias'], $date);
                }
                $broadcastsByChannel = array_merge($broadcastsByChannel, $broadcastsByDate);
            }

            $broadcastsByChannel = self::uniqueBroadcasts($broadcastsByChannel);

            $timeslotBroadcast[$channel['alias']] = $channel;
            $this->filterTimeslotBroadcast($timeslotBroadcast[$channel['alias']], $broadcastsByChannel, $startDate, $endDate);
        }

        return $timeslotBroadcast;
    }

    /**
     * Get daily broadcast by channel.
     *
     * @param mixed  string|integer $identifier
     * @param string                $date       as '2014-06-13'
     *
     * @return array $channelsBroadcast
     */
    public function getDailyBroadcastByChannel($identifier, $date)
    {
        return $this->_getDailyBroadcastByChannel($identifier, $date);
    }

    protected function _getDailyBroadcastByChannel($identifier, $date)
    {
        $channelAlias = $this->getChannelAlias($identifier);

        $cacheKey = $this->getCacheKey('daily_broadcasts', array(
            'channel_alias' => $channelAlias,
            'date' => $date,
        ));

        $dailyBroadcast = $this->caching->get($cacheKey);

        if (false === $dailyBroadcast) { // Re generate daily broadcast list
            $this->precacheDailyBroadcastByChannel($channelAlias, $date);
            $dailyBroadcast = $this->caching->get($cacheKey);

            if (false === $dailyBroadcast) {
                return array();
            }
        }

        foreach ($dailyBroadcast as &$broadcast) {
            $this->outputFormatted($broadcast);
        }

        return $dailyBroadcast;
    }

    /**
     * Get Featured Broadcast.
     *
     * @param array $channelsList
     *
     * @return array $featuredBroadcast
     */
    public function getFeaturedBroadcast($channelsList)
    {
        $cacheKey = $this->getCacheKey('featured_broadcasts');
        $featuredBroadcastList = array();

        $featuredBroadcastListFromCache = $this->caching->get($cacheKey);

        if (false === $featuredBroadcastListFromCache) {
            $this->precacheFeaturedBroadcast();
            $featuredBroadcastListFromCache = $this->caching->get($cacheKey);
        }

        foreach ($featuredBroadcastListFromCache as &$broadcast) {
            if (isset($channelsList[$broadcast['channel_alias']])) {
                $channelAlias = $broadcast['channel_alias'];
                $this->outputFormatted($broadcast);
                $broadcast['channel'] = $channelsList[$channelAlias];
                $featuredBroadcastList[] = $broadcast;
            }
        }

        return $featuredBroadcastList;
    }

    /**
     * Get Super Feaetured Broadcast.
     *
     * @param array $featuredBroadcasts
     *
     * @return array $superFeaturedBroadcast
     */
    public function getSuperFeaturedBroadcast($featuredBroadcasts)
    {
        $superFeaturedBroadcast = array();
        foreach ($featuredBroadcasts as $broadcast) {
            if ($broadcast['super_featured'] != 1) {
                continue;
            }

            $superFeaturedBroadcast[] = $broadcast;
        }

        return $superFeaturedBroadcast;
    }

    /**
     * Filter Timeslot Broadcasts by adding broadcast or fake broadcast.
     *
     * @param array  $channel
     * @param array  $broadcastList
     * @param string $startDate     as '2014-07-26 05:00:00'
     * @param string $endDate       as '2014-07-26 05:00:00'
     *
     * @return array $broadcasts
     */
    private function filterTimeslotBroadcast(&$channel, $broadcastList, $startDate, $endDate)
    {
        $fromDateTime = strtotime($startDate);
        $toDateTime = strtotime($endDate);

        $channel['broadcasts'] = array();

        $fakeBroadcast = array(
            'broadcast_id' => null,
            'tvbase' => null,
            'channel_id' => null,
            'start' => null,
            'end' => null,
            'duration' => null,
            'prime' => null,
            'showview' => null,
            'live' => null,
            'encrypted' => null,
            'subtitles' => null,
            'version' => null,
            'sound' => null,
            'color' => null,
            'program_id' => null,
            'image_id' => null,
            'sf_image_id' => null,
            'csa_id' => null,
            'title' => null,
            'subtitle' => null,
            'originaltitle' => null,
            'part' => null,
            'parts' => null,
            'episode' => null,
            'episodes' => null,
            'season' => null,
            'year' => null,
            'stars' => null,
            'summary_short' => null,
            'summary_long' => null,
            'hashtag' => null,
            'trailer' => null,
            'gender_id' => null,
            'gender' => null,
            'subgender_id' => null,
            'subgender' => null,
            'group_image_id' => null,
            'images' => null,
            'program_url' => null,
            'is_live' => null,
            'real_duration' => null,
            'bcast_duration' => null,
        );

        if (null !== $broadcastList) {
            foreach ($broadcastList as $broadcast) {
                if ($broadcast['start'] <= $endDate && $broadcast['end'] > $startDate) {
                    $startTime = strtotime($broadcast['start']);
                    $endTime = strtotime($broadcast['end']);

                    if ($endTime > $toDateTime) {
                        $realDuration = (int) round(($toDateTime - $startTime) / 60, 0);
                    } elseif ($startTime < $fromDateTime) {
                        $realDuration = (int) round(($endTime - $fromDateTime) / 60, 0);
                    } else {
                        $realDuration = (int) $broadcast['bcast_duration'];
                    }

                    if (count($channel['broadcasts']) === 0 && $startTime > $fromDateTime) {
                        $fakeDuration = round(($startTime - $fromDateTime) / 60, 0);
                        $fakeBroadcast['bcast_duration'] = $fakeBroadcast['real_duration'] = $fakeDuration;
                        $channel['broadcasts'][] = $fakeBroadcast;
                    }

                    $broadcast['real_duration'] = $realDuration;

                    $channel['broadcasts'][] = $broadcast;
                } else {
                    continue;
                }
            }
        }

        if (empty($channel['broadcasts'])) {
            // Add Fake Broadcast if no broadcast
            $fakeDuration = round(($toDateTime - $fromDateTime) / 60, 0);
            $fakeBroadcast['bcast_duration'] = $fakeBroadcast['real_duration'] = $fakeDuration;
            $channel['broadcasts'][] = $fakeBroadcast;
        }
    }

    /**
     * Broadcast formatted output.
     *
     * @param array $broadcast
     *
     * @return array $broadcastOutput
     */
    public function outputFormatted(&$broadcast)
    {
        $broadcast['id'] = $broadcast['broadcast_id'];

        $now = date('Y-m-d H:i:s');
        $broadcast['is_live'] = ($broadcast['start'] <= $now && $broadcast['end'] > $now) ? true : false;

        $program = array(
            'program_id' => $broadcast['program_id'],
            'image_id' => $broadcast['image_id'],
            'sf_image_id' => $broadcast['sf_image_id'],
            'group_image_id' => isset($broadcast['group_image_id']) ? $broadcast['group_image_id'] : null,
            'group_sf_image_id' => isset($broadcast['group_sf_image_id']) ? $broadcast['group_sf_image_id'] : null,
            'csa_id' => $broadcast['csa_id'],
            'title' => $broadcast['title'],
            'subtitle' => $broadcast['subtitle'],
            'originaltitle' => $broadcast['originaltitle'],
            'duration' => $broadcast['duration'],
            'part' => $broadcast['part'],
            'parts' => $broadcast['parts'],
            'episode' => $broadcast['episode'],
            'episodes' => $broadcast['episodes'],
            'season' => $broadcast['season'],
            'year' => $broadcast['year'],
            'stars' => $broadcast['stars'],
            'summary_short' => $broadcast['summary_short'],
            'summary_long' => $broadcast['summary_long'],
            'hashtag' => $broadcast['hashtag'],
            'trailer' => $broadcast['trailer'],
            'gender_id' => isset($broadcast['gender_id']) ? $broadcast['gender_id'] : null,
            'gender' => isset($broadcast['gender']) ? $broadcast['gender'] : null,
            'subgender_id' => isset($broadcast['subgender_id']) ? $broadcast['subgender_id'] : null,
            'subgender' => isset($broadcast['subgender']) ? $broadcast['subgender'] : null,
            'csa' => isset($broadcast['csa']) ? $broadcast['csa'] : null,
        );

        $this->programComponent->outputFormatted($program);
        $this->programComponent->translate($program);

        $broadcast['program'] = $program;

        unset(
            $broadcast['program_id'],
            $broadcast['image_id'],
            $broadcast['sf_image_id'],
            $broadcast['group_image_id'],
            $broadcast['group_sf_image_id'],
            $broadcast['csa_id'],
            $broadcast['title'],
            $broadcast['subtitle'],
            $broadcast['originaltitle'],
            $broadcast['duration'],
            $broadcast['part'],
            $broadcast['parts'],
            $broadcast['episode'],
            $broadcast['episodes'],
            $broadcast['season'],
            $broadcast['year'],
            $broadcast['stars'],
            $broadcast['summary_short'],
            $broadcast['summary_long'],
            $broadcast['hashtag'],
            $broadcast['trailer'],
            $broadcast['gender_id'],
            $broadcast['gender'],
            $broadcast['subgender_id'],
            $broadcast['subgender'],
            $broadcast['csa']
        );
    }

    /**
     * Get channel alias from a identifier.
     *
     * @param mixed integer|string $identifier
     *
     * @return string
     */
    public function getChannelAlias($identifier)
    {
        if (is_numeric($identifier)) {
            $channel = $this->channelComponent->show($identifier);
            $channelAlias = $channel['alias'];
        } else {
            $channelAlias = $identifier;
        }

        return $channelAlias;
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
            case 'live_broadcast_by_channel': // for live broadcast by channel
                if (!isset($params['channel_alias'])) {
                    return;
                }

                return sprintf('broadcast_live_by_channel_%s', $params['channel_alias']);

            case 'broadcasts_by_program': // For broadcasts by program
                if (!isset($params['program_id'])) {
                    return;
                }

                return sprintf('broadcast_program_%s', $params['program_id']);

            case 'daily_broadcasts': // For daily broadcasts list by channel
                if (!isset($params['channel_alias']) || !isset($params['date'])) {
                    return;
                }

                return sprintf('broadcasts_%s_%s', $params['channel_alias'], $params['date']);

            case 'featured_broadcasts': // For featured broadcasts

                return 'broadcasts_featured';

            default :
                return;
        }
    }

    /**
     * Precache daily broadcast by channel.
     *
     * @cache no expiration
     *
     * @param mixed  string|integer $identifier
     * @param string                $date       as '2014-06-13'
     */
    public function precacheDailyBroadcastByChannel($identifier, $date)
    {
        $channelAlias = $this->getChannelAlias($identifier);

        $cacheKey = $this->getCacheKey('daily_broadcasts', array(
            'channel_alias' => $channelAlias,
            'date' => $date,
        ));

        $startDate = $date.' 00:00:00';
        $endDate = $date.' 23:59:59';

        $qb = $this->conn->createQueryBuilder();

        $qb
            ->select(
                'broadcasts.broadcast_id',
                'broadcasts.tvbase',
                'broadcasts.channel_id',
                'broadcasts.start',
                'broadcasts.end',
                'broadcasts.duration as bcast_duration',
                'broadcasts.prime',
                'broadcasts.showview',
                'broadcasts.live',
                'broadcasts.encrypted',
                'broadcasts.subtitles',
                'broadcasts.version',
                'broadcasts.sound',
                'broadcasts.color'
            )
            ->addSelect(
                'programs.program_id',
                'programs.image_id',
                'programs.sf_image_id',
                'programs.csa_id',
                'programs.title',
                'programs.subtitle',
                'programs.originaltitle',
                'programs.duration',
                'programs.part',
                'programs.parts',
                'programs.episode',
                'programs.episodes',
                'programs.season',
                'programs.year',
                'programs.stars',
                'programs.summary_short',
                'programs.summary_long',
                'programs.hashtag',
                'programs.trailer'
            )
            ->addSelect(
                'genders.gender_id',
                'genders.gender'
            )
            ->addSelect(
                'subgenders.subgender_id',
                'subgenders.subgender'
            )
            ->addSelect(
                'csa.csa_id',
                'csa.csa'
            )
            ->addSelect(
                'groups.image_id as group_image_id',
                'groups.sf_image_id as group_sf_image_id'
            )
            ->from('tv_broadcasts', 'broadcasts')
            ->leftjoin('broadcasts', 'tv_programs', 'programs', 'programs.program_id = broadcasts.program_id')
            ->leftjoin('programs', 'tv_genders', 'genders', 'genders.gender_id = programs.gender_id')
            ->leftjoin('programs', 'tv_subgenders', 'subgenders', 'subgenders.subgender_id = programs.subgender_id')
            ->leftjoin('programs', 'tv_csa', 'csa', 'csa.csa_id = programs.csa_id')
            ->leftjoin('programs', 'tv_programs_groups', 'programs_groups', 'programs_groups.program_id = programs.program_id')
            ->leftjoin('programs_groups', 'tv_groups', 'groups', 'groups.group_id = programs_groups.group_id')
            ->leftjoin('broadcasts', 'television_channel', 'channel', 'channel.channel_id = broadcasts.channel_id')
            ->where('channel.alias = :channelAlias')
                ->setParameter(':channelAlias', $channelAlias)
            ->andwhere(
                $qb->expr()->orx(
                    $qb->expr()->andx('broadcasts.start >= :start', 'broadcasts.start <= :end'),
                    $qb->expr()->andx('broadcasts.end >= :start', 'broadcasts.end <= :end')
                )
            )
                ->setParameter(':start', $startDate)
                ->setParameter(':end', $endDate)
            ->groupby('broadcasts.broadcast_id')
            ->orderby('broadcasts.start')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $dailyBroadcastByChannelListFromSql = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $this->caching->set($cacheKey, $dailyBroadcastByChannelListFromSql, 86400);
    }

    /**
     * Precache featured broadcast by channel.
     *
     * @cache 1 day
     *
     * @param array $channelsList
     */
    public function precacheFeaturedBroadcast()
    {
        $cacheKey = $this->getCacheKey('featured_broadcasts');

        $qb = $this->conn->createQueryBuilder();

        $qb
            ->select(
                'featured.featured_id',
                'featured.super_featured'
            )
            ->addselect(
                'broadcasts.broadcast_id',
                'broadcasts.tvbase',
                'broadcasts.channel_id',
                'broadcasts.start',
                'broadcasts.end',
                'broadcasts.duration as bcast_duration',
                'broadcasts.prime',
                'broadcasts.showview',
                'broadcasts.live',
                'broadcasts.encrypted',
                'broadcasts.subtitles',
                'broadcasts.version',
                'broadcasts.sound',
                'broadcasts.color'
            )
            ->addSelect(
                'programs.program_id',
                'programs.image_id',
                'programs.sf_image_id',
                'programs.title',
                'programs.subtitle',
                'programs.originaltitle',
                'programs.duration',
                'programs.part',
                'programs.parts',
                'programs.episode',
                'programs.episodes',
                'programs.season',
                'programs.year',
                'programs.stars',
                'programs.summary_short',
                'programs.summary_long',
                'programs.hashtag',
                'programs.trailer'
            )
            ->addSelect(
                'genders.gender_id',
                'genders.gender'
            )
            ->addSelect(
                'subgenders.subgender_id',
                'subgenders.subgender'
            )
            ->addSelect(
                'csa.csa_id',
                'csa.csa'
            )
            ->addSelect(
                'groups.image_id as group_image_id',
                'groups.sf_image_id as group_sf_image_id'
            )
            ->addSelect(
                'channel.alias as channel_alias',
                'channel.channel'
            )
            ->from('tv_featured', 'featured')
            ->innerjoin('featured', 'tv_broadcasts', 'broadcasts', 'broadcasts.program_id = featured.program_id')
            ->innerjoin('featured', 'tv_programs', 'programs', 'programs.program_id = featured.program_id')
            ->innerjoin('broadcasts', 'television_channel', 'channel', 'channel.channel_id = broadcasts.channel_id')
            ->leftjoin('programs', 'tv_genders', 'genders', 'genders.gender_id = programs.gender_id')
            ->leftjoin('programs', 'tv_subgenders', 'subgenders', 'subgenders.subgender_id = programs.subgender_id')
            ->leftjoin('programs', 'tv_csa', 'csa', 'csa.csa_id = programs.csa_id')
            ->leftjoin('programs', 'tv_programs_groups', 'programs_groups', 'programs_groups.program_id = programs.program_id')
            ->leftjoin('programs_groups', 'tv_groups', 'groups', 'groups.group_id = programs_groups.group_id')
            ->where('broadcasts.end > NOW()')
            ->andwhere('featured.start = broadcasts.start')
            ->groupby('broadcasts.broadcast_id')
            ->orderBy('broadcasts.start')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $featuredBroadcastListFromSql = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $this->caching->set($cacheKey, $featuredBroadcastListFromSql, 86400);
    }
}
