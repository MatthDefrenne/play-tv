<?php

namespace Playmedia\Component;

use Playmedia\Component\Program as ProgramComponent;
use Playmedia\Utils\Tool as Utils;
use Symfony\Component\Translation\Translator;

/**
 * Group component.
 *
 * @author Jimmy Phimmasone <jimmy@playmedia.fr>
 */
class Group
{
    private $conn;
    private $caching;
    private $staticBaseUrl;
    private $programComponent;
    private $translator;
    private $isI8n;

    /**
     * Constructor.
     *
     * @param mixed $conn          Database connection instance
     * @param mixed $caching       Caching instance
     * @param mixed $staticBaseUrl Playmedia host
     */
    public function __construct($conn, $caching, $staticBaseUrl, ProgramComponent $programComponent, Translator $translator, $isI8n = false)
    {
        $this->conn = $conn;
        $this->caching = $caching;
        $this->staticBaseUrl = $staticBaseUrl;
        $this->programComponent = $programComponent;
        $this->translator = $translator;
        $this->isI8n = $isI8n;
    }

    /**
     * List of types for a group.
     */
    protected $types = array(
        1 => array(
            'type' => 'Série TV',
            'title' => 'Série télévisée',
        ),
        2 => array(
            'type' => 'Films',
            'title' => 'Films',
        ),
        3 => array(
            'type' => 'Émission',
            'title' => 'Émission de télé',
        ),
    );

    /**
     * Get group informations.
     *
     * @memcached 1h
     *
     * @param int $groupId
     *
     * @return array
     */
    public function show($groupId)
    {
        $cacheKey = $this->getCacheKey('show', array('group_id' => $groupId));
        $group = array();

        $group = $this->caching->get($cacheKey);

        if (false === $group) {
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
                ->where('groups.group_id = :groupId')
                    ->setParameter(':groupId', $groupId)
            ;

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return;
            }

            $group = $stmt->fetch(\PDO::FETCH_ASSOC);

            $this->outputFormatted($group);

            $this->caching->set($cacheKey, $group, 3600);
        }

        $this->translate($group);

        return $group;
    }

    /**
     * Get programs by group.
     *
     * @memcached 1h
     *
     * @param array            $group
     * @param ProgramComponent $programComponent
     *
     * @return array
     */
    public function getProgramsByGroup($group)
    {
        $cacheKey = $this->getCacheKey('programs_by_group', array('group_id' => $group['id']));

        if (!$programs = $this->caching->get($cacheKey)) {
            $maxResults = 5;

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
                ->from('tv_groups', 'groups')
                ->innerjoin('groups', 'tv_programs_groups', 'programs_groups', 'programs_groups.group_id = groups.group_id')
                ->innerjoin('programs_groups', 'tv_programs', 'programs', 'programs.program_id = programs_groups.program_id')
                ->leftjoin('programs', 'tv_genders', 'genders', 'genders.gender_id = programs.gender_id')
                ->leftjoin('programs', 'tv_subgenders', 'subgenders', 'subgenders.subgender_id = programs.subgender_id')
                ->leftjoin('programs', 'tv_csa', 'csa', 'csa.csa_id = programs.csa_id')
                ->where('groups.group_id = :groupId')
                    ->setParameter(':groupId', $group['id'])
                ->groupby('programs.program_id')
                ->setMaxResults($maxResults)
            ;

            if (1 == $group['type_id']) {
                $qb
                    ->andwhere('programs.episode IS NOT NULL')
                    ->andwhere('programs.season IS NOT NULL')
                    ->orderBy('programs.season', 'DESC')
                    ->addOrderBy('programs.episode')
                    ->addOrderBy('programs.program_id', 'DESC')
                ;
            } else {
                $qb
                    ->addSelect('start')
                    ->join('programs', 'tv_broadcasts', 'broadcasts', 'broadcasts.program_id = programs.program_id')
                    ->orderBy('start', 'DESC');
            }

            $stmt = $qb->execute();

            if ($stmt->rowCount() === 0) {
                return array();
            }

            $programs = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $this->caching->set($cacheKey, $programs, 3600);
        }

        foreach ($programs as &$program) {
            $this->programComponent->outputFormatted($program);
        }

        return $programs;
    }

    /**
     * Group formatted output.
     *
     * @param array $group
     *
     * @return array $groupOutput
     */
    public function outputFormatted(&$group)
    {
        $group['id'] = $group['group_id'];
        $group['type'] = $this->types[$group['type_id']]['type'];
        $group['type_title'] = $this->types[$group['type_id']]['title'];
        $group['url'] = self::getUrl($group);

        // Group images
        if (is_null($group['image_id'])) {
            $group['images'] = array(
                'small' => null,
                'medium' => null,
                'large' => null,
                'xlarge' => null,
                'source' => null,
                'sf_image' => null,
                'sf_image_source' => null,
            );
        } else {
            $imageDirectory = Utils::getImageDirectory($group['image_id']);
            $group['images'] = array(
                'small' => sprintf('%s/img/tv_programs/%s/%s_%s.jpg', $this->staticBaseUrl, $imageDirectory, $group['image_id'], 'small'),
                'medium' => sprintf('%s/img/tv_programs/%s/%s_%s.jpg', $this->staticBaseUrl, $imageDirectory, $group['image_id'], 'medium'),
                'large' => sprintf('%s/img/tv_programs/%s/%s_%s.jpg', $this->staticBaseUrl, $imageDirectory, $group['image_id'], 'large'),
                'xlarge' => sprintf('%s/img/tv_programs/%s/%s_%s.jpg', $this->staticBaseUrl, $imageDirectory, $group['image_id'], 'xlarge'),
                'source' => sprintf('%s/img/tv_programs/%s/%s_%s.jpg', $this->staticBaseUrl, $imageDirectory, $group['image_id'], 'source'),
            );

            if (is_null($group['sf_image_id'])) {
                $group['images']['sf_image'] = null;
                $group['images']['sf_image_source'] = null;
            } else {
                $sfImageDirectory = Utils::getImageDirectory($group['sf_image_id']);

                $group['images']['sf_image'] = sprintf('%s/img/tv_featured/%s/%s_sfp.jpg', $this->staticBaseUrl, $sfImageDirectory, $group['sf_image_id']);
                $group['images']['sf_image_source'] = sprintf('%s/img/tv_featured/%s/%s_sourcesfp.jpg', $this->staticBaseUrl, $sfImageDirectory, $group['sf_image_id']);
            }
        }
        unset($imageDirectory, $sfImageDirectory);

        $group['programs'] = $this->getProgramsByGroup($group);

        if (!empty($group['programs'])) {
            $group['seasons'] = null !== $group['programs'][0]['season'] ? $group['programs'][0]['season'] : null;
        }
    }

    /**
     * Return given group page url (ex: /serie-tv/123/les-experts).
     *
     * @param array $group
     *
     * @return string
     */
    public static function getUrl($group, $isI18n = false)
    {
        switch ($group['type_id']) {
            case 1:
                $page = $isI18n ? 'tv-series' : 'serie-tv';
                break;
            case 2:
                $page = $isI18n ? 'movie' : 'films';
                break;
            case 3:
                $page = $isI18n ? 'tv-show' : 'emission';
                break;
            default:
                $page = $isI18n ? 'group' : 'groupe';
                break;
        }

        return "/{$page}/{$group['id']}/".Utils::slugify($group['title']).'/';
    }

    /**
     * Precache each group.
     *
     * @cache 12h
     *
     * @return array
     */
    public function precacheGroup()
    {
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
        ;

        $stmt = $qb->execute();

        if ($stmt->rowCount() === 0) {
            return;
        }

        $groupCollection = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($groupCollection as $group) {
            $groupShow = $group;
            $this->outputFormatted($groupShow);
            $cacheKey = $this->getCacheKey('show', array('group_id' => $groupShow['group_id']));
            $this->caching->set($cacheKey, $groupShow, 43200);
        }
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
            case 'show':
                if (!isset($params['group_id'])) {
                    return;
                }

                return sprintf('group_%s', $params['group_id']);

            case 'collection':
                return sprintf('collection_group');

            case 'programs_by_group':
                return sprintf('programs_by_group_%s', $params['group_id']);

            default :
                return;
        }
    }

    public function translate(&$group)
    {
        $group['type_title'] = $this->translator->trans($group['type_title'], [], 'tv_genres');
        $group['url'] = self::getUrl($group, $this->isI8n);
        if (isset($group['programs'])) {
            array_walk($group['programs'], function (&$program) {
                $this->programComponent->translate($program);
            });
        }
    }
}
