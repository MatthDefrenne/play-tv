<?php

namespace Playmedia\Component;

use Playmedia\Component\Channel as ChannelComponent;
use Playmedia\Component\Group as GroupComponent;
use Playmedia\Component\Program as ProgramComponent;
use Playmedia\Utils\Tool as Utils;
use Symfony\Component\Translation\Translator;
use Doctrine\DBAL\Connection;

/**
 * Replay TV component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class ReplayTv
{
    private $conn;
    private $caching;
    private $translator;
    private $isI18N;
    protected $channelComponent;
    protected $groupComponent;
    protected $programComponent;
    protected $channels = array();
    protected $programs = array();
    protected $groups = array();

    /**
     * Constructor.
     *
     * @param mixed            $conn             Database connection instance
     * @param mixed            $caching          Caching instance
     * @param ChannelComponent $channelComponent channel Component
     * @param GroupComponent   $groupComponent   group Component
     * @param ProgramComponent $programComponent program Component
     */
    public function __construct($conn, $caching, ChannelComponent $channelComponent, GroupComponent $groupComponent, ProgramComponent $programComponent,
        Translator $translator, $isI18N = false)
    {
        $this->conn = $conn;
        $this->caching = $caching;
        $this->translator = $translator;
        $this->isI18N = $isI18N;
        $this->channelComponent = $channelComponent;
        $this->groupComponent = $groupComponent;
        $this->programComponent = $programComponent;
    }

    private function getChannelIds(array $channels)
    {
        return array_values(array_map(function ($channel) {
            return $channel['id'];
        }, $channels));
    }

    private function normalizeParams(array $params)
    {
        if (array_key_exists('channel_id', $params)) {
            if (!empty($params['channel_id'])) {
                $params['channel_collection'] = [
                    ['id' => $params['channel_id']],
                ];
            }
            unset($params['channel_id']);
        }

        if (isset($params['gender_id']) && !is_array($params['gender_id'])) {
            $params['gender_id'] = array($params['gender_id']);
        }

        $isCountQuery = isset($params['count']) && $params['count'];
        if ($isCountQuery) {
            unset($params['from'], $params['limit']);
        }

        return $params;
    }

    /**
     * Return base replay's videos sql.
     *
     * @param string $channel_id
     *
     * @return object
     */
    private function getReplaySql($params = array())
    {
        $params = $this->normalizeParams($params);

        $qb = $this->conn->createQueryBuilder();

        $qb
            ->from('tv_replay', 'replay')
            ->innerjoin('replay', 'television_channel', 'channel', 'channel.channel_id = replay.channel_id')
            ->leftjoin('replay', 'tv_programs', 'programs', 'programs.program_id = replay.program_id')
            ->leftjoin('replay', 'tv_groups', 'replay_groups', 'replay_groups.group_id = replay.group_id')
            ->leftjoin('programs', 'tv_programs_groups', 'programs_groups', 'programs_groups.program_id = programs.program_id')
            ->leftjoin('programs_groups', 'tv_groups', 'group_program', 'group_program.group_id = programs_groups.group_id')
            ->where('replay.last_updated_date IS NOT NULL')
            ->groupBy('replay.replay_id')
        ;

        $isCountQuery = isset($params['count']) && $params['count'];
        if ($isCountQuery) {
            $qb
                ->addSelect(
                    'COUNT(replay.replay_id) as count'
                )
            ;
        } else {
            $qb
                ->select(
                    'replay.replay_id',
                    'replay.external_id',
                    'replay.clean_title as title',
                    'replay.channel_id',
                    'replay.length',
                    'replay.video_url',
                    'replay.embed',
                    'replay.broadcast_date',
                    'replay.upload_date',
                    'replay.expiration_date',
                    'replay.added_date',
                    'replay.last_updated_date',
                    'replay.active',
                    'replay.image_url',
                    'replay.image_id'
                )
                ->addSelect(
                    'channel.alias as channel_alias',
                    'channel.order as channel_order'
                )
                ->addSelect(
                    'programs.program_id'
                )
                ->addSelect(
                    'replay_groups.group_id'
                )
            ;
        }

        if (isset($params['active']) && false === $params['active']) {
            $startDate = date('Y-m-d H:i:s', time() - 604800); // 7 days before
            $qb
                ->andwhere(
                    $qb->expr()->orx(
                        'replay.active = 1',
                        $qb->expr()->andx(
                            'replay.active = 0',
                            'replay.last_updated_date > :startDate'
                        )
                    )
                )
                ->setParameter(':startDate', $startDate)
            ;
        } else {
            $qb->andwhere('replay.active = 1');
        }

        if (isset($params['embed']) && true === $params['embed']) {
            $qb->andwhere('replay.embed IS NOT NULL');
        }

        if (isset($params['channel_collection']) && !empty($params['channel_collection'])) {
            $qb
                ->andWhere('replay.channel_id IN (:channel_ids)')
                ->setParameter(
                    ':channel_ids',
                    $this->getChannelIds($params['channel_collection']),
                    Connection::PARAM_INT_ARRAY
                );
        }

        // Date clauses
        if (isset($params['date'])) {
            $fromDate = sprintf('%s 00:00:00', $params['date']);
            $toDate = sprintf('%s 23:59:59', $params['date']);

            $qb
                ->leftjoin('replay', 'tv_broadcasts', 'broadcasts', 'broadcasts.program_id = replay.program_id')
                ->andwhere('replay.added_date >= :fromDate')
                ->andwhere(
                    $qb->expr()->orx(
                        $qb->expr()->andx(
                            'replay.broadcast_date >= :fromDate',
                            'replay.broadcast_date <= :toDate'
                        ),
                        $qb->expr()->andx(
                            'replay.broadcast_date IS NULL',
                            'broadcasts.start >= :fromDate',
                            'broadcasts.start <= :toDate'
                        ),
                        $qb->expr()->andx(
                            'replay.broadcast_date IS NULL',
                            'replay.upload_date >= :fromDate',
                            'replay.upload_date <= :toDate'
                        ),
                        $qb->expr()->andx(
                            'replay.broadcast_date IS NULL',
                            'replay.upload_date IS NULL',
                            'replay.added_date >= :fromDate',
                            'replay.added_date <= :toDate'
                        )
                    )
                )
                    ->setParameter(':fromDate', $fromDate)
                    ->setParameter(':toDate', $toDate)
            ;
        } elseif (isset($params['last_videos'])) {
            $threeWeekBeforeDate = date('Y-m-d H:i:s', time() - (86400 * 7 * 3)); // 3 weeks before
            $qb
                ->andwhere('replay.added_date > :threeWeekBeforeDate')
                    ->setParameter(':threeWeekBeforeDate', $threeWeekBeforeDate)
            ;
        } else {
            // Only replays added at least 15 minutes ago
            $date = new \DateTime('-15 minutes');
            $qb
                ->andWhere('replay.added_date <= :date')
                    ->setParameter(':date', $date->format('Y-m-d H:i:00'));
        }

        if (isset($params['gender_id'])) {
            if (count($params['gender_id']) === 1) {
                $qb
                    ->andwhere(
                        $qb->expr()->orx(
                            'replay_groups.gender_id = :genderId',
                            'group_program.gender_id = :genderId'
                        )
                    )
                    ->setParameter(':genderId', $params['gender_id'][0])
                ;
            } else {
                $qb
                    ->andwhere(
                        $qb->expr()->orx(
                            'replay_groups.gender_id IN (:gender_ids)',
                            'group_program.gender_id IN (:gender_ids)'
                        )
                    )
                    ->setParameter(':gender_ids', $params['gender_id'], Connection::PARAM_INT_ARRAY);
            }
        }

        if ((isset($params['from']) || isset($params['limit'])) && !$isCountQuery) {
            $from = isset($params['from']) ? (int) $params['from'] : 0;
            $to = isset($params['limit']) ? (int) $params['limit'] : null;

            $qb
                ->setFirstResult($from)
                ->setMaxResults($to)
            ;
        }

        return $qb;
    }

    /**
     * Get active videos count.
     *
     * @cache 1h
     *
     * @param int   $channelId
     * @param array $params
     *
     * @return int
     */
    public function getVideosCount($channelId, $params)
    {
        $params['channel_id'] = $channelId;
        $params['count'] = true;

        $cacheKey = $this->getCacheKey($params);
        $countVideos = $this->caching->get($cacheKey);

        if (false === $countVideos) {
            $qb = $this->getReplaySql($params);

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return 0;
            }

            $countVideos = $stmt->rowCount();

            $this->caching->set($cacheKey, $countVideos, 3600);
        }

        return $countVideos;
    }

    /**
     * Return active videos of a passed channel.
     *
     * @cache 30min
     *
     * @param array $params
     *
     * @return array
     */
    public function getLastVideos($params = array())
    {
        if (!is_array($params)) {
            $params = array();
        }

        $cacheKey = $this->getCacheKey($params);
        $lastVideos = $this->caching->get($cacheKey);

        if (false !== $lastVideos) {
            return $lastVideos;
        }

        $qb = $this->getReplaySql($params);

        // First we order by broacast date, then by added date,
        // Because broadcast date is more relevant than added date.
        $qb
            ->orderby('replay.broadcast_date', 'DESC')
            ->addOrderby('replay.added_date', 'DESC')
        ;

        if (isset($params['group_by'])) {
            $qb
                ->groupby('replay.'.$params['group_by'])
            ;
        }

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $lastVideos = $this->parseVideos($stmt->fetchAll(\PDO::FETCH_ASSOC), $params['limit'], false);

        $this->caching->set($cacheKey, $lastVideos, 1800);

        return $lastVideos;
    }

    /**
     * Return last videos featured.
     *
     * @cache 1h
     *
     * @param array $channels
     * @param int   $limit
     *
     * @return array
     */
    public function getLastVideosFeatured(array $channels, $limit = false)
    {
        $featured = [];

        foreach ($channels as $channel) {
            if ($lastPrimeVideos = $this->getLastPrimeVideosByChannel($channel)) {
                foreach ($lastPrimeVideos as $lastNewsVideo) {
                    $featured[] = $lastNewsVideo;
                }
            }
        }

        if ($limit && count($featured) > $limit) {
            $featured = array_slice($featured, 0, $limit);
        }

        return $featured;
    }

    /**
     * Return last prime replays by channel.
     *
     * @cache 1h
     *
     * @param int  $limit    maximum to display
     * @param bool $distinct distinct by channel_id
     *
     * @return array
     */
    public function getLastPrimeVideosByChannel($channel)
    {
        $cacheKey = 'last_prime_videos_by_channel_'.$channel['alias'];
        $lastPrimeVideosByChannel = $this->caching->get($cacheKey);

        if (false === $lastPrimeVideosByChannel) {
            $fromTimestamp = strtotime(date('Y-m-d')) - 12540; // 20H31 yesterday
            $fromDate = date('Y-m-d H:i:s', $fromTimestamp);
            $toDate = date('Y-m-d H:i:s', $fromTimestamp + 9600); // 23h00 yesterday
            $replayLength = 1200;

            $qb = $this->getReplaySql([
                'channel_id' => $channel['id'],
            ]);

            $qb
                ->leftjoin('programs', 'tv_broadcasts', 'broadcasts', 'broadcasts.program_id = programs.program_id')
                ->andwhere(
                    $qb->expr()->andx(
                        'replay.broadcast_date >= :fromDate',
                        'replay.broadcast_date <= :toDate'
                    )
                )
                ->andwhere('replay.added_date >= :fromDate')
                ->andwhere('replay.length IS NOT NULL')
                ->andwhere('replay.length >= :replayLength')
                    ->setParameter(':replayLength', $replayLength)
                ->addOrderBy('replay.broadcast_date', 'ASC')
                    ->setParameter(':fromDate', $fromDate)
                    ->setParameter(':toDate', $toDate)
            ;

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return;
            }

            $lastPrimeVideosByChannel = $this->parseVideos($stmt->fetchAll(\PDO::FETCH_ASSOC));

            $this->caching->set($cacheKey, $lastPrimeVideosByChannel, 3600);
        }

        return $lastPrimeVideosByChannel;
    }

    /**
     * @deprecated
     * Return active videos of TV news (journal, JT etc.).
     *
     * @memcached 5mn
     *
     * @param array $channels
     * @param int   $limit    maximum to display
     * @param bool  $distinct distinct by channel_id
     *
     * @return array
     */
    public function getLastNewsVideos(array $channels = null, $limit = 3, $distinct = true)
    {
        $params = array(
            'limit' => $limit,
            'gender_id' => 18,
            'distinct' => $distinct,
        );

        if (!empty($channels)) {
            $params['channel_collection'] = $channels;
        }

        $cacheKey = $this->getCacheKey($params);
        $lastNewsVideos = $this->caching->get($cacheKey);

        if (false !== $lastNewsVideos) {
            return $lastNewsVideos;
        }

        $soir3GroupId = 284; // Soir 3 group id
        $replayLength = 300; // Soir 3 group id

        $qb = $this->getReplaySql($params);

        $isNotSoir3Clause = $qb->expr()->andX(
            'replay.group_id != :soir3', // AVOID Soir 3 group
            $qb->expr()->orx(
                'replay.length >= :replayLength',
                'replay.length IS NULL'
            )
        );
        $isSoir3Clause = $qb->expr()->andX(
            'replay.group_id = :soir3', // AVOID Soir 3 group
            $qb->expr()->orx(
                'replay.length > :replayLength',
                'replay.length IS NULL'
            )
        );

        $qb
            ->andWhere($qb->expr()->orX($isNotSoir3Clause, $isSoir3Clause))
                ->setParameter(':soir3', $soir3GroupId)
                ->setParameter(':replayLength', $replayLength)
            ->orderBy('replay.broadcast_date', 'DESC')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $lastNewsVideos = $this->parseVideos($stmt->fetchAll(\PDO::FETCH_ASSOC), $limit, $distinct);

        $this->caching->set($cacheKey, $lastNewsVideos, 3600); // Cache 1H

        return $lastNewsVideos;
    }

    /**
     * Returns the latest TV news video for each channel.
     *
     * @param array $channels
     * @param int   $limit
     *
     * @return array
     */
    public function getLatestTvNewsVideosByChannels(array $channels, $limit = 5)
    {
        $videos = array();

        foreach ($channels as $channel) {
            if ($videosByChannel = $this->getLatestTvNewsVideosByChannel($channel)) {
                $latestByChannel = array_shift($videosByChannel);

                $videos[] = $latestByChannel;
                if (count($videos) >= $limit) {
                    break;
                }
            }
        }

        return $this->orderVideos($videos, 'DESC');
    }

    /**
     * Returns the $limit latest TV news videos for a channel.
     *
     * @param mixed $channel
     * @param int   $limit
     *
     * @return array
     */
    private function getLatestTvNewsVideosByChannel($channel, $limit = 10)
    {
        if (is_array($channel) && isset($channel['id'])) {
            $channelId = $channel['id'];
        } elseif (is_numeric($channel)) {
            $channelId = $channel;
        } else {
            throw new \InvalidArgumentException('Invalid $channel argument');
        }

        $params = array(
            'gender_id' => 18,
            'limit' => $limit,
            'channel_id' => $channelId,
        );

        $cacheKey = $this->getCacheKey($params).'|latest';
        if (!$videos = $this->caching->get($cacheKey)) {
            $soir3GroupId = 284;

            $qb = $this->getReplaySql($params);
            $qb
                ->andWhere($qb->expr()->orX(
                    'replay.length > :length',
                    'replay.length IS NULL'
                ))
                ->andWhere('replay.group_id != :soir3')
                ->andWhere('replay.broadcast_date IS NOT NULL')
                ->orderBy('replay.broadcast_date', 'DESC')
                ->setParameter(':length', 500) // Only videos at least 5 minutes long
                ->setParameter(':soir3', $soir3GroupId);

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return array();
            }

            $videos = $this->parseVideos($stmt->fetchAll(\PDO::FETCH_ASSOC));

            $this->caching->set($cacheKey, $videos, 1800); // Cache 30min
        }

        return $videos;
    }

    /**
     * Return last prime replays.
     *
     * @cache 5mn
     *
     * @param array $channels
     * @param int   $limit    maximum to display
     * @param bool  $distinct distinct by channel_id
     *
     * @return array
     */
    public function getLastPrimeVideos(array $channels = null, $limit = 3, $distinct = true)
    {
        $params = [];
        if (!empty($channels)) {
            $params['channel_collection'] = $channels;
        }

        $cachePrefix = 'last_prime_videos'.(true === $distinct ? '_distinct' : '');
        $cacheKey = $cachePrefix.':'.$this->getCacheKey($params);

        $lastPrimeVideos = $this->caching->get($cacheKey);

        if (false !== $lastPrimeVideos) {
            return $lastPrimeVideos;
        }

        $fromTimestamp = strtotime(date('Y-m-d')) - 12540; // 20H31 yesterday
        $fromDate = date('Y-m-d H:i:s', $fromTimestamp);
        $toDate = date('Y-m-d H:i:s', $fromTimestamp + 11400); // 23h30 yesterday

        $qb = $this->getReplaySql($params);

        $replayLength = 1200;
        $channelIdToAvoid = 20;
        $channelCategory = 2;
        $replayGroupGender = $programGroupGender = 18;
        $qb
            ->leftjoin('programs', 'tv_broadcasts', 'broadcasts', 'broadcasts.program_id = programs.program_id')
            ->andwhere(
                $qb->expr()->orx(
                    $qb->expr()->andx(
                        'replay.broadcast_date >= :fromDate',
                        'replay.broadcast_date <= :toDate'
                    ),
                    $qb->expr()->andx(
                        'replay.broadcast_date IS NULL',
                        $qb->expr()->andx(
                            'broadcasts.start >= :fromDate',
                            'broadcasts.start <= :toDate'
                        )
                    )
                )
            )
            ->andwhere('replay.length IS NOT NULL')
            ->andwhere('replay.length >= :replayLength')
                ->setParameter(':replayLength', $replayLength)
            ->andwhere('channel.channel_id != :channelId') // NOT GULLI
                ->setParameter(':channelId', $channelIdToAvoid)
            ->andwhere('channel.category_id = :channelCategory') // ONLY TNT
                ->setParameter(':channelCategory', $channelCategory)
            ->andwhere(
                $qb->expr()->orx(
                    'replay_groups.gender_id != :replayGroupGender', // NOT GENDER JOURNAL
                    'replay_groups.gender_id IS NULL'
                )
            )
                ->setParameter(':replayGroupGender', $replayGroupGender)
            ->andwhere(
                $qb->expr()->orx(
                    'programs.gender_id != :programGroupGender', // NOT GENDER JOURNAL
                    'programs.gender_id IS NULL'
                )
            )
                ->setParameter(':programGroupGender', $programGroupGender)
            ->addOrderBy('replay.broadcast_date', 'ASC')
                ->setParameter(':fromDate', $fromDate)
                ->setParameter(':toDate', $toDate)
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $lastPrimeVideos = $this->parseVideos($stmt->fetchAll(\PDO::FETCH_ASSOC), $limit, true);

        $this->caching->set($cacheKey, $lastPrimeVideos, 300);

        return $lastPrimeVideos;
    }

    /**
     * Return active series (tv shows) videos.
     *
     * @cache 5mn
     *
     * @param $limit int maximum to display
     *
     * @return array
     */
    public function getLastSeriesVideos($limit = 3)
    {
        $params = array(
            'gender_type_id' => '1',
            'limit' => $limit,
            'replay_length' => '1200',
            'program_duration' => '20',
        );

        return $this->getLastVideosByGender($params);
    }

    /**
     * Return active cartoons videos.
     *
     * @cache 5mn
     *
     * @param $limit int maximum to display
     *
     * @return array
     */
    public function getLastCartoonsVideos($limit = 3)
    {
        $params = array(
            'gender_type_id' => '4',
            'limit' => $limit,
            'replay_length' => '300',
            'program_duration' => '5',
        );

        return $this->getLastVideosByGender($params);
    }

    /**
     * Return active sport videos.
     *
     * @cache 5mn
     *
     * @param $limit int maximum to display
     *
     * @return array
     */
    public function getLastSportVideos($limit = 3)
    {
        $params = array(
            'gender_type_id' => '3',
            'limit' => $limit,
            'replay_length' => '300',
            'program_duration' => '5',
        );

        return $this->getLastVideosByGender($params);
    }

    /**
     * Get last videos filter by series, cartoons or sports.
     *
     * @param array $params we must have in it : gender_type_id, limit, replay_length, program_duration
     *
     * @return array
     */
    protected function getLastVideosByGender(array $params)
    {
        if (!isset($params['gender_type_id']) || !isset($params['limit']) || !isset($params['replay_length']) || !isset($params['program_duration'])) {
            return;
        }

        $genderType = $this->getGenderType($params['gender_type_id']);

        if (null === $genderType) {
            return;
        }

        $cacheKeyParams = array(
            'limit' => $params['limit'],
            'gender_id' => $genderType['gender_id'],
        );

        $cacheKey = $this->getCacheKey($cacheKeyParams);
        $lastVideos = $this->caching->get($cacheKey);

        if (false !== $lastVideos) {
            return $lastVideos;
        }

        $params['gender_id'] = $genderType['gender_id'];

        $qb = $this->getReplaySql($params);

        $replayLength = (int) $params['replay_length'];
        $programDuration = (int) $params['program_duration'];
        $qb
            ->andwhere(
                $qb->expr()->orx(
                    'replay.length >= :replayLength',
                    'programs.duration >= :programDuration',
                    'replay.length IS NULL'
                )
            )
                ->setParameter(':replayLength', $replayLength)
                ->setParameter(':programDuration', $programDuration)
        ;

        if (3 == $params['gender_type_id'] || 4 == $params['gender_type_id']) {
            $qb
                ->addOrderBy('replay.added_date', 'DESC')
                ->addOrderBy('replay.score', 'DESC')
            ;
        } else {
            $qb
                ->addOrderBy('replay.score', 'DESC')
                ->addOrderBy('replay.added_date', 'DESC')
            ;
        }

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $lastVideos = $this->parseVideos($stmt->fetchAll(\PDO::FETCH_ASSOC), $params['limit'], false);

        $this->caching->set($cacheKey, $lastVideos, 300);

        return $lastVideos;
    }

    /**
     * Get Video details hydrated.
     *
     * @param int $replayId
     *
     * @return array
     */
    public function getVideoInfos($replayId)
    {
        $video = $this->getVideoInfosFromDb($replayId);

        if (null === $video) {
            return;
        }

        $this->outputFormatted($video);

        return $video;
    }

    /**
     * Get Video details from DB.
     *
     * @param int $replayId
     *
     * @return array
     */
    public function getVideoInfosFromDb($replayId)
    {
        $qb = $this->getReplaySql();
        $qb
            ->andwhere('replay.replay_id = :replayId')
                ->setParameter(':replayId', $replayId)
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Check if a video exist and is not active.
     *
     * @param int $replayId
     *
     * @return array
     */
    public function checkVideoInfos($replayId)
    {
        $qb = $this->conn->createQueryBuilder();
        $qb
            ->select(
                'programs.program_id'
            )
            ->addSelect(
                'replay_groups.group_id'
            )
            ->from('tv_replay', 'replay')
            ->leftjoin('replay', 'tv_programs', 'programs', 'programs.program_id = replay.program_id')
            ->leftjoin('replay', 'tv_groups', 'replay_groups', 'replay_groups.group_id = replay.group_id')
            ->where('replay.replay_id = :replayId')
                ->setParameter(':replayId', $replayId)
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $video = $stmt->fetch(\PDO::FETCH_ASSOC);

        $checkVideo = array();

        if (null !== $video['group_id']) {
            $group = $this->groupComponent->show($video['group_id']);
            $checkVideo['url'] = $group['url'];
        } elseif (null !== $video['program_id']) {
            $program = $this->programComponent->show($video['program_id']);
            $checkVideo['url'] = $program['program_url'];
        } else {
            $checkVideo['url'] = '/replay-tv/videos/';
        }

        return $checkVideo;
    }

    /**
     * Return active videos of a specific group.
     *
     * @cache 1h
     *
     * @param int    $groupId   group ID
     * @param int    $limit     limit
     * @param string $embed     embed code
     * @param int    $programId program ID
     *
     * @return array
     */
    public function getGroupVideos($groupId, $limit = null, $embed = false, $programId = null)
    {
        $params = array('active' => false);

        if (true === $embed) {
            $params['embed'] = $embed;
        }

        $cacheKey = $this->getCacheKey(array_merge($params, array('group_id' => $groupId)));
        $groupVideos = $this->caching->get($cacheKey);

        if (false === $groupVideos) {
            $groupVideos = $this->getGroupInfosFromDb($groupId, $params);

            if (null === $groupVideos) {
                return;
            }

            $groupVideos = $this->parseVideos($groupVideos);

            $this->caching->set($cacheKey, $groupVideos, 3600);
        }

        if (!is_null($programId)) {
            $count = count($groupVideos);
            for ($i = 0; $i < $count; ++$i) {
                if ($groupVideos[$i]['program']['program_id'] == $programId) {
                    unset($groupVideos[$i]);
                }
            }
            $groupVideos = array_values($groupVideos);
        }

        return is_int($limit) ? array_slice($groupVideos, 0, $limit) : $groupVideos;
    }

    /**
     * Get Video details from DB.
     *
     * @param int $replayId
     *
     * @return array
     */
    public function getGroupInfosFromDb($groupId, $params)
    {
        $params['last_videos'] = true;
        $qb = $this->getReplaySql($params);
        $qb
            ->andWhere(
                $qb->expr()->orx(
                    'replay.group_id = :groupId',
                    'group_program.group_id = :groupId'
                )
            )
                ->setParameter(':groupId', $groupId)
            ->addOrderBy('replay.added_date', 'DESC')
            ->addOrderBy('replay.broadcast_date', 'DESC')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Return active videos of a specific program.
     *
     * @mcache 1h
     *
     * @param int $program_id program ID
     *
     * @return array
     */
    public function getProgramVideos($programId)
    {
        $params = array(
            'active' => false,
            'program_id' => $programId,
        );

        $cacheKey = $this->getCacheKey($params);
        $programVideo = $this->caching->get($cacheKey);

        if (false !== $programVideo) {
            return $programVideo;
        }

        $qb = $this->getReplaySql($params);
        $qb
            ->andwhere(
                'replay.program_id = :programId'
            )
                ->setParameter(':programId', $programId)
            ->addOrderBy('replay.added_date', 'DESC')
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $programVideo = $this->parseVideos($stmt->fetchAll(\PDO::FETCH_ASSOC));

        $this->caching->set($cacheKey, $programVideo, 3600);

        return $programVideo;
    }

    /**
     * Get genders Types.
     *
     * @cache 1h
     *
     * @return array
     */
    public function getGendersTypes()
    {
        $cacheKey = 'replay_gender_types';
        if (!$gendersType = $this->caching->get($cacheKey)) {
            $qb = $this->conn->createQueryBuilder()
                ->select(
                    'genders.gender_id',
                    'genders.gender'
                )
                ->addSelect(
                    'genders_types.gender_type_id as id',
                    'genders_types.name',
                    'genders_types.short_name',
                    'genders_types.alias',
                    'genders_types.menu'
                )
                ->from('tv_genders', 'genders')
                ->leftjoin('genders', 'tv_genders_types', 'genders_types', 'genders_types.gender_type_id = genders.gender_type_id')
                ->orderBy('genders_types.gender_type_id')
                ->addOrderBy('genders.gender_id')
            ;

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return;
            }

            $genders = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $gendersType = array();

            foreach ($genders as $gender) {
                if (!isset($gendersType[$gender['id']])) {
                    $gendersType[$gender['id']] = array(
                        'name' => $gender['name'],
                        'short_name' => $gender['short_name'],
                        'alias' => $gender['alias'],
                        'menu' => (1 == $gender['menu']),
                        'gender_id' => array(),
                    );
                }
                $gendersType[$gender['id']]['gender_id'][] = $gender['gender_id'];
            }

            $this->caching->set($cacheKey, $gendersType, 3600);
        }

        if ($this->isI18N) {
            array_walk($gendersType, function (&$genre) {
                $genre['name'] = $this->translator->trans($genre['name'], [], 'tv_genres');
            });
        }

        return $gendersType;
    }

    /**
     * Get Gender Type.
     *
     * @param int $genderId
     *
     * @return mixed array on success, otherwise null
     */
    public function getGenderType($genderId)
    {
        $gendersType = $this->getGendersTypes();

        return isset($gendersType[$genderId]) ? $gendersType[$genderId] : null;
    }

    /**
     * Get gender id from genders type alias.
     *
     * @param string $gendersAlias
     *
     * @return array
     */
    public function getGenderIdFromGendersAlias($gendersAlias)
    {
        $gendersTypes = $this->getGendersTypes();

        foreach ($gendersTypes as $genderId => $genderType) {
            if ($genderType['alias'] === $gendersAlias) {
                return $genderId;
            }
        }

        return;
    }

    /**
     * Return the cache id for given params.
     *
     * @param array $params
     *
     * @return string
     */
    public function getCacheKey($params)
    {
        $cacheKey = 'replay_tv';

        if (!is_array($params)) {
            return $cacheKey;
        }

        $params = $this->normalizeParams($params);

        if (isset($params['date'])) {
            $date = str_replace('-', '|', $params['date']);
            $cacheKey .= '|'.$date.'|videos';
        }

        if (isset($params['count'])) {
            $cacheKey .= '|count';
        }

        if (!isset($params['active']) || $params['active'] !== false) {
            $cacheKey .= '|active';
        }

        if (isset($params['channel_collection'])) {
            $cacheKey .= '|channels:'.sha1(implode(',', $this->getChannelIds($params['channel_collection'])));
        }

        if (isset($params['group_id'])) {
            $cacheKey .= "|group:{$params['group_id']}";
        }

        if (isset($params['program_id'])) {
            $cacheKey .= "|program:{$params['program_id']}";
        }

        if (isset($params['gender_id'])) {
            $cacheKey .= '|gender:'.implode(',', $params['gender_id']);
        }

        if (isset($params['from']) && (int) $params['from'] !== 0) {
            $cacheKey .= "|from:{$params['from']}";
        }

        if (isset($params['limit'])) {
            $cacheKey .= "|to:{$params['limit']}";
        }

        if (isset($params['distinct']) && true === $params['distinct']) {
            $cacheKey .= '|distinct';
        }

        if (isset($params['popular']) && true === $params['popular']) {
            $cacheKey .= '|popular';
        }

        if (isset($params['country'])) {
            $cacheKey .= "|country:{{$params['country']}}";
        }

        if (isset($params['last_videos'])) {
            $cacheKey .= '|last_videos';
        }

        return $cacheKey;
    }

    /**
     * Return well formed array of videos (from SQL results).
     *
     * @param array  $videos
     * @param int    $limit       max video to return
     * @param bool   $distinct    display only one video per channel (default: false)
     * @param string $orderVideos ASC or DESC
     *
     * @return array
     */
    private function parseVideos($videos, $limit = null, $distinct = false, $orderVideos = null)
    {
        $replayVideos = array();

        $this->precacheAttributes($videos);

        $channels = array();
        foreach ($videos as $video) {
            if (true === $distinct) {
                if (in_array($video['channel_id'], $channels)) {
                    continue;
                }

                $channels[] = $video['channel_id'];
            }

            $this->outputFormatted($video);

            $replayVideos[] = $video;
        }

        $replayVideos = array_values($replayVideos);

        if (null !== $orderVideos) {
            $replayVideos = $this->orderVideos($replayVideos, $orderVideos);
        }

        if (null !== $limit) {
            return array_slice($replayVideos, 0, $limit);
        }

        return $replayVideos;
    }

    private function precacheAttributes(array $videos)
    {
        $channelsCacheKeys = array();
        $groupsCacheKeys = array();
        $programsCacheKeys = array();

        foreach ($videos as $video) {
            $channelsCacheKeys[] = $this->channelComponent->getCacheKey('show', array('identifier' => $video['channel_alias']));

            if (null !== $video['group_id']) {
                $groupsCacheKeys[] = $this->groupComponent->getCacheKey('show', array('group_id' => $video['group_id']));
            }
            if (null !== $video['program_id']) {
                $programsCacheKeys[] = $this->programComponent->getCacheKey('show', array('program_id' => $video['program_id']));
            }
        }

        if (!empty($channelsCacheKeys)) {
            $channelsCache = $this->caching->getMulti($channelsCacheKeys);
            foreach ($channelsCache as $key => $channel) {
                $this->channels[$channel['alias']] = $channel;
            }
        }

        if (!empty($groupsCacheKeys)) {
            $groupsCache = $this->caching->getMulti($groupsCacheKeys);
            foreach ($groupsCache as $key => $group) {
                $this->groups[$group['id']] = $group;
            }
        }

        if (!empty($programsCacheKeys)) {
            $programsCache = $this->caching->getMulti($programsCacheKeys);
            foreach ($programsCache as $key => $program) {
                $this->programs[$program['id']] = $program;
            }
        }
    }

    private function getChannelFromCache($alias)
    {
        if (!isset($this->channels[$alias])) {
            if (!$channel = $this->channelComponent->show($alias)) {
                return;
            }
            $this->channels[$alias] = $channel;
        }

        return $this->channels[$alias];
    }

    private function getGroupFromCache($id)
    {
        if (!isset($this->groups[$id])) {
            if (!$group = $this->groupComponent->show($id)) {
                return;
            }
            $this->groups[$id] = $group;
        }

        return $this->groups[$id];
    }

    private function getProgramFromCache($id)
    {
        if (!isset($this->programs[$id])) {
            if (!$program = $this->programComponent->show($id)) {
                return;
            }
            $this->programs[$id] = $program;
        }

        return $this->programs[$id];
    }

    /**
     * Replay Tv formatted output.
     *
     * @param array $video
     *
     * @return array
     */
    public function outputFormatted(&$video)
    {
        /*
            Datas :

            id
            replay_id
            external_id
            title
            channel_id
            length
            duration
            video_url
            embed
            broadcast_date
            upload_date
            expiration_date
            added_date
            last_updated_date
            active
            replay_page_url
            url_id
            is_embed
            images
            channel
            group
            program
        */

        $video['id'] = $video['replay_id'];

        $video['channel'] = $this->getChannelFromCache($video['channel_alias']);
        $video['group'] = $video['group_id'] !== null ? $this->getGroupFromCache($video['group_id']) : null;
        $video['program'] = $video['program_id'] !== null ? $this->getProgramFromCache($video['program_id']) : null;

        // Title
        $video['title'] = null !== $video['program'] ? $video['program']['fulltitle'] : $video['title'];

        // Get Replay Page Url
        $video['alias'] = Utils::slugify($video['title']);
        $video['replay_page_url'] = '/replay/'.$video['id'].'/'.$video['alias'].'/';

        // Specification for Arte
        $video['url_id'] = isset($video['video_url']) && '9' === $video['channel_id'] ? $this->getUrlIdForArte($video['video_url']) : null;

        // Broadcast Date
        if (null !== $video['broadcast_date'] &&
            null !== $video['added_date'] &&
            (strtotime($video['added_date']) - strtotime($video['broadcast_date'])) > 604800
        ) {
            $video['broadcast_date'] = null;
        }

        // Length
        if (0 == $video['length']) {
            $video['length'] = null;
        }
        if (null !== $video['program']['duration'] && null === $video['length']) {
            $video['length'] = $video['program']['duration'] * 60;
        }

        // Indicates if the video is displayed as embed (see _video.tpl)
        $video['is_embed'] = ((null !== $video['embed'] && (mb_strlen($video['embed']) > 0)) && (true == $video['channel']['is_embed']));

        // Images
        if (null !== $video['image_id']) {
            $video['images'] = array(
                'small' => Utils::getImageUrl($video['image_id'], 'small'),
                'medium' => Utils::getImageUrl($video['image_id'], 'medium'),
                'large' => Utils::getImageUrl($video['image_id'], 'large'),
                'xlarge' => Utils::getImageUrl($video['image_id'], 'xlarge'),
                'source' => Utils::getImageUrl($video['image_id'], 'source'),
            );
        } elseif (null !== $video['program']['images']['small']) {
            $video['images'] = array(
                'small' => $video['program']['images']['small'],
                'medium' => $video['program']['images']['medium'],
                'large' => $video['program']['images']['large'],
                'xlarge' => $video['program']['images']['xlarge'],
                'source' => $video['program']['images']['source'],
            );
        } elseif (null !== $video['group']['images']['small']) {
            $video['images'] = array(
                'small' => $video['group']['images']['small'],
                'medium' => $video['group']['images']['medium'],
                'large' => $video['group']['images']['large'],
                'xlarge' => $video['group']['images']['xlarge'],
                'source' => $video['group']['images']['source'],
            );
        } else {
            $video['images'] = array(
                'small' => null,
                'medium' => null,
                'large' => null,
                'xlarge' => null,
                'source' => null,
            );
        }

        if (null !== $video['length']) {
            $apply_duration_callable = function ($duration) {
                $h = (int) floor($duration / 3600);
                $m = (int) floor(($duration % 3600) / 60);
                $s = (int) ($duration - ($h * 3600) - ($m * 60));

                $hours = $h > 0 ? $h.':' : '';
                $minutes = ($h > 0 && $m > 0 && $m < 10 ? '0' : '').($m > 0 ? $m : '00').':';
                $seconds = str_pad($s, 2, 0, STR_PAD_LEFT);

                return "{$hours}{$minutes}{$seconds}";
            };

            $video['duration'] = call_user_func($apply_duration_callable, $video['length']);
        } else {
            $video['duration'] = null;
        }

        // use group link instead of program link for the replay (only use for featured replays)
        $video['use_group'] = false;

        unset(
            $video['channel_alias'],
            $video['program_id'],
            $video['group_id']
        );
    }

    /**
     * Return url_id for embed arte.
     *
     * @param string $urlVideo string in arte
     *
     * @return string urlId
     */
    public function getUrlIdForArte($urlVideo)
    {
        $uri = explode('/', $urlVideo);

        if (!isset($uri[5])) {
            return '';
        }

        $urlId = explode('.', $uri[5]);

        return $urlId[0];
    }

    /**
     * Re-order videos list.
     *
     * @param array  $videos
     * @param string $direction string ASC or DESC
     *
     * @return array
     */
    private function orderVideos($videos, $direction = 'ASC')
    {
        uasort($videos, function ($a, $b) {
            $aStart = (isset($a['broadcast_date']) ? $a['broadcast_date'] : $a['added_date']);
            $bStart = (isset($b['broadcast_date']) ? $b['broadcast_date'] : $b['added_date']);

            // order by channel_order if same date
            if ($aStart === $bStart) {
                return $a['channel_order'] > $b['channel_order'] ? 1 : -1;
            }

            return strtotime($aStart) > strtotime($bStart) ? 1 : -1;
        });

        if ('DESC' === $direction) {
            return array_reverse($videos);
        }

        return $videos;
    }
}
