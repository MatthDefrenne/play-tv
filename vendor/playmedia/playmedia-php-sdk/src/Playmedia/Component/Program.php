<?php

namespace Playmedia\Component;

use Playmedia\Component\Group as GroupComponent;
use Playmedia\Utils\Tool as Utils;
use Symfony\Component\Translation\Translator;

/**
 * Program component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Program
{
    private $conn;
    private $caching;
    private $staticBaseUrl;
    private $translator;
    private $isI18n = false;
    private static $starsAssoc = [
        1 => 1,
        2 => 2,
        3 => 2,
        4 => 3,
        5 => 3,
    ];

    /**
     * Constructor.
     *
     * @param mixed $conn          Database connection instance
     * @param mixed $caching       Caching instance
     * @param mixed $staticBaseUrl Playmedia host
     */
    public function __construct($conn, $caching, $staticBaseUrl, Translator $translator, $isI18n = false)
    {
        $this->conn = $conn;
        $this->caching = $caching;
        $this->staticBaseUrl = $staticBaseUrl;
        $this->translator = $translator;
        $this->isI18n = $isI18n;
    }

    /**
     * Get program details.
     *
     * @cache 12h
     *
     * @param int $programId
     *
     * @return array $program  program infos
     */
    public function show($programId)
    {
        $cacheKey = $this->getCacheKey('show', array('program_id' => $programId));
        $program = $this->caching->get($cacheKey);

        if (false === $program) {
            $qb = $this->conn->createQueryBuilder();
            $qb
                ->select(
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
                    'groups.sf_image_id as group_sf_image_id',
                    'groups.hashtag as group_hashtag'
                )
                ->from('tv_programs', 'programs')
                ->leftjoin('programs', 'tv_genders', 'genders', 'genders.gender_id = programs.gender_id')
                ->leftjoin('programs', 'tv_subgenders', 'subgenders', 'subgenders.subgender_id = programs.subgender_id')
                ->leftjoin('programs', 'tv_csa', 'csa', 'csa.csa_id = programs.csa_id')
                ->leftjoin('programs', 'tv_programs_groups', 'programs_groups', 'programs_groups.program_id = programs.program_id')
                ->leftjoin('programs_groups', 'tv_groups', 'groups', 'groups.group_id = programs_groups.group_id')
                ->where('programs.program_id = :program_id')
                    ->setParameter(':program_id', $programId)
            ;

            $stmt = $qb->execute();
            if ($stmt->rowCount() === 0) {
                return;
            }
            $program = $stmt->fetch(\PDO::FETCH_ASSOC);

            $this->outputFormatted($program);

            $this->caching->set($cacheKey, $program, 43200);
        }

        $this->translate($program);

        return $program;
    }

    /**
     * Get group detail by program.
     *
     * @cache 12h
     *
     * @param int            $programId
     * @param GroupComponent $groupComponent
     *
     * @return array
     */
    public function getGroupByProgram($programId, GroupComponent $groupComponent)
    {
        $cacheKey = $this->getCacheKey('group_by_program', array('program_id' => $programId));

        if (!$group = $this->caching->get($cacheKey)) {
            $qb = $this->conn->createQueryBuilder();
            $qb
                ->select(
                    'groups.group_id',
                    'groups.type_id',
                    'groups.title',
                    'groups.gender_id',
                    'groups.subgender_id',
                    'groups.summary',
                    'groups.image_id',
                    'groups.sf_image_id',
                    'groups.hashtag'
                )
                ->from('tv_groups', 'groups')
                ->innerjoin('groups', 'tv_programs_groups', 'programs_groups', 'programs_groups.group_id = groups.group_id')
                ->where('programs_groups.program_id = :programId')
                    ->setParameter(':programId', $programId)
            ;

            $stmt = $qb->execute();
            if ($stmt->rowCount() === 0) {
                return;
            }
            $group = $stmt->fetch(\PDO::FETCH_ASSOC);

            $groupComponent->outputFormatted($group);

            $this->caching->set($cacheKey, $group, 43200);
        }

        $groupComponent->translate($group);

        return $group;
    }

    /**
     * Get casting by program.
     *
     * @cache 12h
     *
     * @param int $programId
     *
     * @return array
     */
    public function getCastingByProgram($programId)
    {
        $cacheKey = $this->getCacheKey('casting_by_program', array('program_id' => $programId));
        $casts = $this->caching->get($cacheKey);

        if (false === $casts) {
            $qb = $this->conn->createQueryBuilder();
            $qb
                ->select(
                    'casts.cast_id',
                    'casts.tvbase',
                    'casts.firstname',
                    'casts.lastname'
                )
                ->addSelect(
                    'programs_casts.order as programs_casts_order',
                    'programs_casts.role'
                )
                ->addSelect(
                    'status.status_id',
                    'status.status',
                    'status.order as status_order'
                )
                ->from('tv_casts', 'casts')
                ->innerjoin('casts', 'tv_programs_casts', 'programs_casts', 'programs_casts.cast_id = casts.cast_id')
                ->leftjoin('programs_casts', 'tv_status', 'status', 'status.status_id = programs_casts.status_id')
                ->where('programs_casts.program_id = :programId')
                    ->setParameter(':programId', $programId)
                ->orderby('status.order')
                ->addOrderby('status.status_id')
                ->addOrderby('programs_casts.order')
            ;

            $stmt = $qb->execute();
            if ($stmt->rowCount() === 0) {
                return;
            }
            $casts = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $casts = $this->castingOutputFormatted($casts);

            $this->caching->set($cacheKey, $casts, 43200);
        }

        $this->translateCasting($casts);

        return $casts;
    }

    /**
     * Return program(s) related to given infos program.
     *
     * @cache 12h
     *
     * @param array $program array program infos
     *
     * @return array
     */
    public function getRelatedPrograms($program)
    {
        $cacheKey = $this->getCacheKey('related_programs', array('program_id' => $program['id']));
        $relatedProgramsFromCache = $this->caching->get($cacheKey);

        if (false !== $relatedProgramsFromCache) {
            return $relatedProgramsFromCache;
        }

        $relatedPrograms = array();

        if ($program['part'] !== null) {
            $part = $program['part'];
            foreach ($program['group']['programs'] as $programGroup) {
                if ($program['season'] !== null && $program['season'] !== $programGroup['season']) {
                    continue;
                }

                if ($program['episode'] !== null && $program['episode'] !== $programGroup['episode']) {
                    continue;
                }

                if ($part != 1 && $part - 1 == $programGroup['part']) {
                    $relatedPrograms['previous_part'] = $programGroup;
                }

                if ($program['part'] != $program['parts'] && ($part + 1) == $programGroup['part']) {
                    $relatedPrograms['next_part'] = $programGroup;
                }

                if (isset($relatedPrograms['previous_part']) && isset($relatedPrograms['next_part'])) {
                    break;
                }
            }
        }

        if ($program['episode'] !== null) {
            $episode = $program['episode'];

            foreach ($program['group']['programs'] as $programGroup) {
                if ($program['season'] !== null && $program['season'] !== $programGroup['season']) {
                    continue;
                }

                if ($episode != 1 && $episode - 1 == $programGroup['episode']) {
                    $relatedPrograms['previous_episode'] = $programGroup;
                }

                if (($episode + 1) == $programGroup['episode']) {
                    $relatedPrograms['next_episode'] = $programGroup;
                }

                if (isset($relatedPrograms['previous_episode']) && isset($relatedPrograms['next_episode'])) {
                    break;
                }
            }
        }

        $this->caching->set($cacheKey, $relatedPrograms, 43200);

        return $relatedPrograms;
    }

    /**
     * Return false if program is not live right now, the broadcast instead.
     *
     * @param int   $programId
     * @param array $broadcastLive broadcast live for playtv and tnt channels (timeslot Broadcast)
     *
     * @return mixed array $broadcasts on success, otherwise false
     */
    public function isProgramlive($programId, array $broadcastLive = array())
    {
        $now = date('Y-m-d H:i:s');

        $channelBroadcast = false;

        foreach ($broadcastLive as $broadcast) {
            if (!isset($broadcast['program'])) {
                continue;
            }

            if ($broadcast['program']['program_id'] != $programId) {
                continue;
            }

            $channelBroadcast['broadcast'] = $broadcast;

            break; // Get out from the loop
        }

        if (false === $channelBroadcast) { // If not found in daily broadcast of all channel, return null
            return;
        }

        return $channelBroadcast;
    }

    /**
     * Program formatted output.
     *
     * @param array $program
     *
     * @return array $programOutput
     */
    public function outputFormatted(&$program)
    {
        $program['fulltitle'] = $this->programFulltitle($program);
        $program['alias'] = Utils::slugify($program['title']);
        $program['stars'] = $this->formatStars($program['stars']);
        $program['summary'] = (null !== $program['summary_long']) ? $program['summary_long'] : $program['summary_short'];
        $program['trailer'] = $this->formatTrailer($program['trailer']);
        $program['gender_id'] = isset($program['gender_id']) ? $program['gender_id'] : null;
        $program['gender'] = isset($program['gender']) ? $program['gender'] : null;
        $program['subgender_id'] = isset($program['subgender_id']) ? $program['subgender_id'] : null;
        $program['subgender'] = isset($program['subgender']) ? $program['subgender'] : null;
        $program['csa_id'] = isset($program['csa_id']) ? $program['csa_id'] : null;
        $program['csa'] = isset($program['csa']) ? $program['csa'] : null;
        $program['id'] = $program['program_id'];
        $program['program_url'] = self::getUrl($program);

        if (null === $program['image_id']) {
            $imageId = isset($program['group_image_id']) && null !== $program['group_image_id'] ? (int) $program['group_image_id'] : null;
        } else {
            $imageId = (int) $program['image_id'];
        }
        unset($program['image_id'], $program['group_image_id']);

        if (null === $program['sf_image_id']) {
            $sfimageId = isset($program['group_sf_image_id']) ? (int) $program['group_sf_image_id'] : null;
        } else {
            $sfimageId = (int) $program['sf_image_id'];
        }
        unset($program['sf_image_id'], $program['group_sf_image_id']);

        // Program images
        if (null === $imageId) {
            $program['images'] = array(
                'small' => null,
                'medium' => null,
                'large' => null,
                'xlarge' => null,
                'source' => null,
                'sf_image' => null,
                'sf_image_source' => null,
            );
        } else {
            $imageDirectory = Utils::getImageDirectory($imageId);

            $program['images'] = array(
                'small' => $this->staticBaseUrl.'/img/tv_programs/'.$imageDirectory.'/'.$imageId.'_small.jpg',
                'medium' => $this->staticBaseUrl.'/img/tv_programs/'.$imageDirectory.'/'.$imageId.'_medium.jpg',
                'large' => $this->staticBaseUrl.'/img/tv_programs/'.$imageDirectory.'/'.$imageId.'_large.jpg',
                'xlarge' => $this->staticBaseUrl.'/img/tv_programs/'.$imageDirectory.'/'.$imageId.'_xlarge.jpg',
                'source' => $this->staticBaseUrl.'/img/tv_programs/'.$imageDirectory.'/'.$imageId.'_source.jpg',
            );

            if (null === $sfimageId) {
                $program['images']['sf_image'] = null;
                $program['images']['sf_image_source'] = null;
            } else {
                $sfImageDirectory = Utils::getImageDirectory($sfimageId);

                $program['images']['sf_image'] = $this->staticBaseUrl.'/img/tv_featured/'.$sfImageDirectory.'/'.$sfimageId.'_sfp.jpg';
                $program['images']['sf_image_large'] = $this->staticBaseUrl.'/img/tv_featured/'.$sfImageDirectory.'/'.$sfimageId.'_sfplarge.jpg';
                $program['images']['sf_image_source'] = $this->staticBaseUrl.'/img/tv_featured/'.$sfImageDirectory.'/'.$sfimageId.'_sourcesfp.jpg';
            }
        }
        unset($imageDirectory, $imageId, $sfImageDirectory, $sfimageId);

        $program['bcast_abbr'] = $this->broadcastAbbreviation($program);
        if (isset($program['hashtag']) || isset($program['group_hashtag'])) {
            $program['hashtag'] = isset($program['group_hashtag']) ? $program['group_hashtag'] : $program['hashtag'];
        } else {
            $program['hashtag'] = null;
        }
        unset($program['group_hashtag']);
    }

    /**
     * Casting formatted output for program.
     *
     * @param array $casting
     *
     * @return array $castingOutput
     */
    public function castingOutputFormatted($casts)
    {
        $casting = array();
        $according_to = array();

        foreach ($casts as $cast) {
            if ($cast['status_id'] > 31 && $cast['status_id'] < 45) {
                $array = &$according_to;
            } else {
                $array = &$casting;
            }

            if (!isset($array[$cast['status_id']])) {
                $array[$cast['status_id']] = array(
                    'status' => $cast['status'],
                );
            }

            $fullname = trim("{$cast['firstname']} {$cast['lastname']}");
            $array[$cast['status_id']]['casts'][] = array(
                'fullname' => $fullname,
                'role' => $cast['role'],
                'url' => sprintf('/people/%s/%s/', $cast['cast_id'], Utils::slugify($fullname)),
            );
        }

        return array('casting' => $casting, 'according_to' => array_values($according_to));
    }

    /**
     * Format a rate from 5 to 3 base.
     *
     * @param int $rawStars Raw stars rate in storage
     *
     * @return int The formatted value
     */
    protected function formatStars($rawStars)
    {
        if (isset(self::$starsAssoc[$rawStars])) {
            return self::$starsAssoc[$rawStars];
        }

        return 0;
    }

    /**
     * Format a trailer if any.
     *
     * @param mixed $rawTrailer Database field
     *
     * @return mixed null|array
     */
    protected function formatTrailer($rawTrailer)
    {
        if (null == $rawTrailer) {
            return;
        }

        $formattedTrailer = json_decode($rawTrailer, true);
        if (json_last_error() != JSON_ERROR_NONE) {
            return;
        }
        if (empty($formattedTrailer['ps_id'])) {
            return;
        }

        return $formattedTrailer;
    }

    /**
     * Return program full title.
     *
     * @param array $broadcast
     *
     * @return string
     */
    public function programFulltitle($broadcast)
    {
        if (!isset($broadcast['title'])) {
            return '';
        }

        return trim($broadcast['title'].' '.$this->broadcastAbbreviation($broadcast));
    }

    /**
     * Broadcast abbreviation.
     *
     * @param array $program
     *
     * @return string
     */
    public function broadcastAbbreviation($program)
    {
        $abbreviation = $parts = '';

        if (null !== $program['part'] && null !== $program['parts'] && $program['parts'] > 1) {
            $parts .= '('.$program['part'].'/'.$program['parts'].')';
        } elseif (null !== $program['part']) {
            $parts .= 'partie '.$program['part'];
        }

        if (
                isset($program['gender_id']) &&
                (null !== $program['gender_id'] ||
                    (null === $program['gender_id'] &&
                        ((int) $program['gender_id'] === 26 ||
                         (int) $program['gender_id'] === 30
                        )
                    )
                ) &&
                null !== $program['season'] &&
                null !== $program['episode'] &&
                $program['episode'] < 100 &&
                (!isset($program['episodes']) ||
                $program['episodes'] < 100)
        ) {
            $abbreviation .= 'S'.str_pad($program['season'], 2, '0', STR_PAD_LEFT).'E'.str_pad($program['episode'], 2, '0', STR_PAD_LEFT);
            $abbreviation .= (!empty($parts) ? " {$parts}" : '');
        } elseif (null !== $program['episode'] && null !== $program['episodes'] && $program['episodes'] < 100 && empty($parts)) {
            $abbreviation .= '('.$program['episode'].'/'.$program['episodes'].')';
        } elseif (null !== $program['episode']) {
            $abbreviation .= 'épisode '.$program['episode'];
            $abbreviation .= (!empty($parts) ? " {$parts}" : '');
        } else {
            $abbreviation .= (!empty($parts) ? " {$parts}" : '');
        }

        return isset($abbreviation) ? trim($abbreviation) : null;
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
        if (!isset($params['program_id'])) {
            return;
        }

        switch ($type) {
            case 'show':
                return 'program_'.$params['program_id'];

            case 'group_by_program':
                return 'group_by_program_'.$params['program_id'];

            case 'casting_by_program':
                return 'casting_by_program_'.$params['program_id'];

            case 'related_programs':
                return 'related_program_'.$params['program_id'];

            default :
                return;
        }
    }

    public static function getUrl($program, $isI18n = false)
    {
        if ($isI18n) {
            return '/tv-shows/'.$program['id'].'/'.$program['alias'].'/';
        }

        return '/programme-tv/'.$program['id'].'/'.$program['alias'].'/';
    }

    public function translate(&$program)
    {
        $program['gender'] = $this->translator->trans($program['gender'], [], 'tv_genres');
        $program['subgender'] = $this->translator->trans($program['subgender'], [], 'tv_genres');
        $program['program_url'] = self::getUrl($program, $this->isI18n);
    }

    private function translateCasting(&$casts)
    {
        $translator = $this->translator;
        array_walk($casts['casting'], function (&$cast) use ($translator) {
            $cast['status'] = $translator->trans($cast['status'], [], 'tv_casts');
        });
        array_walk($casts['according_to'], function (&$cast) use ($translator) {
            $cast['status'] = $translator->trans($cast['status'], [], 'tv_casts');
        });
    }
}
