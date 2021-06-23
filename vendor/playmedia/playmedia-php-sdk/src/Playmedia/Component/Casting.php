<?php

namespace Playmedia\Component;

use Playmedia\Component\Broadcast as BroadcastComponent;
use Playmedia\Component\Group as GroupComponent;
use Symfony\Component\Translation\Translator;

/**
 * Casting component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Casting
{
    private $conn;
    private $caching;
    private $broadcastComponent;
    private $groupComponent;
    private $isI18N;

    /**
     * Constructor.
     *
     * @param mixed              $conn               Database connection instance
     * @param mixed              $caching            Caching instance
     * @param BroadcastComponent $broadcastComponent broadcast Component
     * @param GroupComponent     $groupComponent     group Component
     */
    public function __construct($conn, $caching, BroadcastComponent $broadcastComponent, GroupComponent $groupComponent, Translator $translator, $isI18N = false)
    {
        $this->conn = $conn;
        $this->caching = $caching;
        $this->broadcastComponent = $broadcastComponent;
        $this->groupComponent = $groupComponent;
        $this->translator = $translator;
        $this->isI18N = $isI18N;
    }

    /**
     * Get cast.
     *
     * @param int $id cast id
     *
     * @return mixed array on success, otherwise null
     */
    public function show($id)
    {
        $cacheKey = $this->getCacheKey('show', array('cast_id' => $id));
        $cast = $this->caching->get($cacheKey);

        if (false === $cast) {
            $qb = $this->conn->createQueryBuilder();

            $qb
                ->select(
                    'casts.cast_id',
                    'casts.tvbase',
                    'casts.firstname',
                    'casts.lastname'
                )
                ->from('tv_casts', 'casts')
                ->where('casts.cast_id = :castId')
                    ->setParameter(':castId', $id)
            ;

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return;
            }

            $cast = $stmt->fetch(\PDO::FETCH_ASSOC);

            $this->outputFormatted($cast);

            $this->caching->set($cacheKey, $cast, 3600);
        }

        return $cast;
    }

    /**
     * Get cast Status.
     *
     * @param int $id cast id
     *
     * @return mixed array on success, otherwise null
     */
    public function getStatus($castId)
    {
        $cacheKey = $this->getCacheKey('status', array('cast_id' => $castId));
        $status = $this->caching->get($cacheKey);

        if (false === $status) {
            $qb = $this->conn->createQueryBuilder()
                ->select(
                    'status.status_id AS id',
                    'status.status AS name'
                )
                ->from('tv_casts', 'casts')
                ->join('casts', 'tv_programs_casts', 'programs_casts', 'casts.cast_id = programs_casts.cast_id')
                ->join('programs_casts', 'tv_status', 'status', 'programs_casts.status_id = status.status_id')
                ->where('casts.cast_id = :id')
                    ->setParameter(':id', $castId)
                ->groupBy('status.status_id', 'status.status')
                ->orderBy('status.order')
            ;

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return;
            }

            $status = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $this->caching->set($cacheKey, $status, 3600);
        }

        if ($this->isI18N) {
            array_walk($status, function (&$item) {
                $item['name'] = $this->translate($item['name']);
            });
        }

        return $status;
    }

    /**
     * Get previous broadcast for a people.
     *
     * @param int $castId cast id
     *
     * @return array
     */
    public function getCastPreviousBroadcasts($castId, $limit = 10)
    {
        $cacheKey = $this->getCacheKey('previous_broadcast', array('cast_id' => $castId));
        $castsPreviousBroadcasts = $this->caching->get($cacheKey);

        if (false === $castsPreviousBroadcasts) {
            $qb = $this->broadcastSql($castId, $limit);
            $qb
                ->andwhere('broadcasts.start <= NOW()')
                ->addOrderBy('broadcasts.start', 'DESC')
            ;

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return;
            }

            $castsPreviousBroadcasts = $this->broadcastOutputFormatted($stmt->fetchAll(\PDO::FETCH_ASSOC));

            $this->caching->set($cacheKey, $castsPreviousBroadcasts, 3600);
        }

        if ($this->isI18N) {
            array_walk($castsPreviousBroadcasts, function (&$item) {
                foreach ($item['statuses'] as $key => $value) {
                    $item['statuses'][$key]['status'] = $this->translate($value['status']);
                }
            });
        }

        return $castsPreviousBroadcasts;
    }

    /**
     * Get previous broadcast for a people.
     *
     * @param int $castId cast id
     *
     * @return array
     */
    public function getCastNextBroadcasts($castId, $limit = 10)
    {
        $cacheKey = $this->getCacheKey('next_broadcast', array('cast_id' => $castId));
        $castsNextBroadcasts = $this->caching->get($cacheKey);

        if (false === $castsNextBroadcasts) {
            $maxDate = date('Y-m-d H:i:s', time() + 604800); // 7 days

            $qb = $this->broadcastSql($castId, $limit);
            $qb
                ->andwhere('broadcasts.start > NOW()')
                ->andwhere('broadcasts.start <= :maxDate')
                    ->setParameter(':maxDate', $maxDate)
                ->addOrderBy('broadcasts.start')
            ;

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return;
            }

            $castsNextBroadcasts = $this->broadcastOutputFormatted($stmt->fetchAll(\PDO::FETCH_ASSOC), false);

            $this->caching->set($cacheKey, $castsNextBroadcasts, 3600);
        }

        if ($this->isI18N) {
            array_walk($castsNextBroadcasts, function (&$item) {
                foreach ($item['statuses'] as $key => $value) {
                    $item['statuses'][$key]['status'] = $this->translate($value['status']);
                }
            });
        }

        return $castsNextBroadcasts;
    }

    /**
     * Get Broadcast SQL.
     *
     * @param int $castId
     * @param int $limit
     *
     * @return object
     */
    public function broadcastSql($castId, $limit)
    {
        $qb = $this->conn->createQueryBuilder();

        return $qb->select(
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
                'groups.group_id',
                'groups.title as group_title',
                'groups.type_id as group_type_id',
                'groups.gender_id as group_gender_id',
                'groups.subgender_id as group_subgender_id',
                'groups.summary as group_summary',
                'groups.image_id as group_image_id',
                'groups.sf_image_id as group_sf_image_id',
                'groups.hashtag as group_hashtag'
            )
            ->addSelect(
                'programs_casts.role'
            )
            ->addSelect(
                'status.status_id',
                'status.status'
            )
            ->from('tv_broadcasts', 'broadcasts')
            ->innerjoin('broadcasts', 'tv_programs', 'programs', 'programs.program_id = broadcasts.program_id')
            ->leftjoin('programs', 'tv_genders', 'genders', 'genders.gender_id = programs.gender_id')
            ->leftjoin('programs', 'tv_subgenders', 'subgenders', 'subgenders.subgender_id = programs.subgender_id')
            ->leftjoin('programs', 'tv_csa', 'csa', 'csa.csa_id = programs.csa_id')
            ->innerjoin('programs', 'tv_programs_casts', 'programs_casts', 'programs_casts.program_id = programs.program_id')
            ->innerjoin('programs_casts', 'tv_status', 'status', 'status.status_id = programs_casts.status_id')
            ->innerjoin('broadcasts', 'television_channel', 'channel', 'channel.channel_id = broadcasts.channel_id')
            ->leftjoin('programs', 'tv_programs_groups', 'programs_groups', 'programs_groups.program_id = programs.program_id')
            ->leftjoin('programs_groups', 'tv_groups', 'groups', 'groups.group_id = programs_groups.group_id')

            ->where('programs_casts.cast_id = :castId')
                ->setParameter(':castId', $castId)
            ->orderBy('status.order')
            ->setMaxResults($limit)
        ;
    }

    /**
     * Get Braodcast formatted.
     *
     * @param array $broadcastsFromDb
     *
     * @return array
     */
    public function broadcastOutputFormatted($broadcastsFromDb, $withGroup = true)
    {
        $groups = $broadcasts = array();

        foreach ($broadcastsFromDb as &$broadcast) {
            $this->broadcastComponent->outputFormatted($broadcast);

            if (null !== $broadcast['group_id'] && true === $withGroup) {
                $groupId = $broadcast['group_id'];
                if (!isset($groups[$groupId])) {
                    $group = array(
                        'group_id' => $groupId,
                        'type_id' => $broadcast['group_type_id'],
                        'title' => $broadcast['group_title'],
                        'gender_id' => $broadcast['group_gender_id'],
                        'subgender_id' => $broadcast['group_subgender_id'],
                        'summary' => $broadcast['group_summary'],
                        'image_id' => isset($broadcast['group_image_id']) ? $broadcast['group_image_id'] : null,
                        'sf_image_id' => isset($broadcast['group_sf_image_id']) ? $broadcast['group_sf_image_id'] : null,
                        'hashtag' => $broadcast['group_hashtag'],
                    );

                    $this->groupComponent->outputFormatted($group);
                    if ($this->isI18N) {
                        $this->groupComponent->translate($group);
                    }

                    $groups[$groupId] = $group;
                    $groups[$groupId]['broadcasts'] = array();
                    unset($groups[$groupId]['programs']);
                    unset(
                        $broadcast['group_type_id'],
                        $broadcast['group_title'],
                        $broadcast['group_gender_id'],
                        $broadcast['group_subgender_id'],
                        $broadcast['group_summary'],
                        $broadcast['group_image_id'],
                        $broadcast['group_sf_image_id'],
                        $broadcast['group_hashtag']
                    );
                }

                if (!isset($groups[$groupId]['statuses'][$broadcast['status_id']])) {
                    $groups[$groupId]['statuses'][$broadcast['status_id']] = array(
                        'status' => $broadcast['status'],
                        'role' => $broadcast['role'],
                    );
                }

                unset(
                    $broadcast['channel_alias'],
                    $broadcast['group_id'],
                    $broadcast['role'],
                    $broadcast['status_id'],
                    $broadcast['status']
                );

                if (count($groups[$groupId]['broadcasts']) < 3 && !isset($group[$broadcast['id']])) {
                    $groups[$groupId]['broadcasts'][$broadcast['id']] = $broadcast;
                }
            } else {
                $broadcastId = $broadcast['id'];
                if (!isset($broadcasts[$broadcastId])) {
                    $broadcasts[$broadcastId] = $broadcast;
                }

                if (!isset($broadcasts[$broadcastId]['statuses'][$broadcast['status_id']])) {
                    $broadcasts[$broadcastId]['statuses'][$broadcast['status_id']] = array(
                        'status' => $broadcast['status'],
                        'role' => $broadcast['role'],
                    );
                }
            }
        }

        // delete groups with only one program
        foreach ($groups as $id => &$group) {
            if (count($group['broadcasts']) === 1) {
                $broadcasts[key($group['broadcasts'])] = array_merge(current($group['broadcasts']), array('statuses' => $group['statuses']));
                unset($groups[$id]);
            }

            $group['broadcasts'] = array_values($group['broadcasts']);
        }

        $results = array_merge($broadcasts, $groups);

        return $results;
    }

    /**
     * Casting formatted output.
     *
     * @param array $cast
     */
    public function outputFormatted(&$cast)
    {
        $cast['fullname'] = trim(sprintf('%s %s', $cast['firstname'], $cast['lastname']));
    }

    /**
     * Get cache key for specific method.
     *
     * @param string $type
     * @param array  $params
     *
     * @return mixed string on success, otherwise null
     */
    public function getCacheKey($type, $params)
    {
        if (!isset($params['cast_id'])) {
            return;
        }

        switch ($type) {
            case 'show':
                return sprintf('casting_show_%s', $params['cast_id']);

            case 'status':
                return sprintf('casting_status_%s', $params['cast_id']);

            case 'previous_broadcast':
                return sprintf('cast_previous_broadcasts_%s', $params['cast_id']);

            case 'next_broadcast':
                return sprintf('cast_next_broadcasts_%s', $params['cast_id']);

            default :
                return;
        }
    }

    private function translate($cast)
    {
        return $this->translator->trans($cast, [], 'tv_casts');
    }
}
