<?php

use PlayTv\Utils\Feature;
use PlayTv\Utils\ReplayTv as ReplayTvUtils;
use PlayTv\Core\Website;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller used to display tv replay pages.
 *
 * @author PLAYMEDIA
 */
class replay_tv_controller extends ppl_app_controller
{
    private $max_videos_per_page = 29; // maximum videos to display per list page
    private $max_videos_embed_per_page_replay = 30; // maximum videos to display in a repaly embeded page
    private $genders;

    const GENDER_FLAG = 0x001;
    const CHANNEL_FLAG = 0x010;
    const DATE_FLAG = 0X100;

    /**
     * On before action.
     *
     * @see ppl_app_controller::before_action()
     */
    public function before_action()
    {
        parent::before_action();

        $this->genders = $this->getSdk()['services.replay_tv']->getGendersTypes();

        $this->container['twig']->addGlobal('genders', $this->genders);
        $this->container['twig']->addGlobal('days', $this->get_days());
    }

    /**
     * Display replay tv default page (home).
     */
    public function index_action(Website $website)
    {
        $this->set_page_title($this->trans('replay_tv_index.title', [], 'seo'));

        $render_data = [];

        $channelsCollection = $this->container['core.mosaic.mosaic_manager']->getReplayMosaic($this->container['sdk_country_code'])->toArray();

        $params = array(
            'limit' => 10,
            'country' => $this->container['sdk_country_code'],
            'channel_collection' => $channelsCollection,
            'last_videos' => true,
        );

        $replays = $this->container['api_client']->getJSON('/replays/latest/prime/', ['query' => 'website='.$website->getKey()], $default = []);

        $latest_prime = array_map(function ($replay) {
            return $this->container['core_serializer']->normalize(
                $this->container['api_serializer']->denormalize($replay, 'PlayTv\Core\Replay')
            );
        }, $replays);

        ReplayTvUtils::sortByLatest($latest_prime, $this->container['core.mosaic.mosaic_manager']->getReplayMosaic($this->container['sdk_country_code']));

        $render_data['channel'] = null;
        $render_data['gender_alias'] = null;
        $render_data['date'] = null;
        $render_data['last_videos'] = $this->getSdk()['services.replay_tv']->getLastVideos($params);
        $render_data['last_videos_featured'] = $latest_prime;
        $render_data['url_params'] = [];
        $render_data['block_mosaic'] = $this->mosaic('replay_tv_page');

        return $this->render($render_data);
    }

    /**
     * Display channel tv replay page
     * (match route location is /replay-tv/videos/:params).
     *
     * @param string $channel_id    The channel id
     * @param string $channel_alias The channel alias
     */
    public function videos_action($channel_id = null, $channel_alias = null)
    {
        $channel = null;

        // /videos/{id}/{alias}/
        if (null !== $channel_id) {
            if (!$channel = $this->getSdk()['services.channel']->show($channel_id)) {
                return $this->createNotFoundResponse();
            }
        // /videos/{alias}/
        } elseif (null !== $channel_alias) {
            if (!$channel = $this->getSdk()['services.channel']->show($this->getSdk()['utils.tool']->slugify($channel_alias))) {
                return $this->createNotFoundResponse();
            }
        }

        if (null !== $channel && !$this->isI18n() && urldecode($this->request->uri) !== $channel['channel_replay_url']) {
            return $this->response->redirect($channel['channel_replay_url'], 301);
        }

        try {
            $genderId = $this->get_gender_param();
            $date = $this->get_date_param();
            $page = $this->get_page_param();
        } catch (\InvalidArgumentException $e) {
            return $this->createNotFoundResponse();
        }

        // Avoid crawlers
        if (count($this->request->get) > 0 || $this->request->is_ajax) {
            $this->robots(false);
        }

        $meta = $this->get_videos_meta($genderId, $channel, $date, $page);
        $render_params = $this->get_videos_render_params($channel, $genderId, $date, $page);

        // and last grabbed videos to display instead of a blank page
        if (null == $render_params['videos']) {
            $channelsCollection = $this->container['core.mosaic.mosaic_manager']->getReplayMosaic($this->container['sdk_country_code'])->toArray();
            $last_videos = $this->getSdk()['services.replay_tv']->getLastVideos([
                'limit' => 5,
                'country' => $this->container['sdk_country_code'],
                'channel_collection' => $channelsCollection,
                'last_videos' => true,
            ]);

            $render_params['last_videos'] = $last_videos;
        }

        if ($this->request->is_ajax) {
            $response = [
                'title' => $meta['title'],
                'heading' => $meta['heading'],
                'content' => $this->render($render_params, 'controllers/replay-tv/_replays-videos.twig'),
            ];

            return $this->jsonResponse($response);
        }

        $this->set_page_title($meta['title']);
        $this->set_page_description($meta['description']);

        $render_params['heading'] = $meta['heading'];
        $render_params['block_mosaic'] = $this->mosaic('replay_tv_page');

        return $this->render($render_params);
    }

    private function get_date_param()
    {
        $date = isset($this->request->get['date']) ? $this->request->get['date'] : null;
        if (null !== $date && $date !== date('Y-m-d', strtotime($date))) {
            throw new \InvalidArgumentException(sprintf('Date %s is not valid', $date));
        }

        return $date;
    }

    private function get_gender_param()
    {
        $genderId = null;
        if (isset($this->request->get['gender'])) {
            $genderAlias = $this->request->get['gender'];
            $genderId = (!is_numeric($genderAlias)) ? $this->getSdk()['services.replay_tv']->getGenderIdFromGendersAlias($genderAlias) : $genderAlias;
            if (!isset($this->genders[$genderId])) {
                throw new \InvalidArgumentException(sprintf('Unknown genre %s', $genderAlias));
            }
        }

        return $genderId;
    }

    private function get_page_param()
    {
        $page = isset($this->request->get['page']) ? (int) $this->request->get['page'] : 1;

        if ($page <= 0) {
            $page = 1;
        }

        return $page;
    }

    private function get_videos_render_params($channel = null, $genderId = null, $date = null, $page = 1)
    {
        $mosaic = $this->container['core.mosaic.mosaic_manager']->getMosaic($this->container['sdk_country_code'])->toArray();

        $params = array(
            'channel_id' => null !== $channel ? $channel['id'] : null, // FIXME Seems useless
            'channel_collection' => $mosaic,
            'date' => $date,
            'from' => ($this->max_videos_per_page * ($page - 1)),
            'limit' => $this->max_videos_per_page,
            'gender_id' => $genderId !== null ? $this->genders[$genderId]['gender_id'] : null,
        );

        $count = $this->getSdk()['services.replay_tv']->getVideosCount(null !== $channel ? $channel['id'] : null, $params);
        $pages = (int) ceil($count / $this->max_videos_per_page);

        $videos = null;
        if ($count > 0) {
            $videos = $this->getSdk()['services.replay_tv']->getLastVideos($params);
        }

        $url_params = array_filter([
            'channel_id' => null !== $channel && $this->isI18n() ? $channel['id'] : null,
            'channel_alias' => null !== $channel ? $channel['alias'] : null,
        ]);

        return [
            'pages' => $pages,
            'page' => $page,
            'count' => (int) $count,
            'date' => $date,
            'channel' => $channel,
            'gender_id' => $genderId,
            'gender_alias' => $genderId !== null ? $this->genders[$genderId]['alias'] : null,
            'gender_name' => $genderId !== null ? $this->genders[$genderId]['name'] : null,
            'videos' => $videos,
            'url_params' => $url_params,
            'page_params' => array_filter($url_params + [
                'date' => null !== $date ? $date : null,
                'gender' => null !== $genderId ? $this->genders[$genderId]['alias'] : null,
            ]),
        ];
    }

    private function get_videos_meta($genderId, $channel, $date, $page)
    {
        $flags = 0;
        $trans_params = [];

        if (null !== $genderId) {
            $trans_params['%genre%'] = mb_strtolower($this->genders[$genderId]['name']);
            $flags |= self::GENDER_FLAG;
        }

        if (null !== $channel) {
            $genreNames = array_map(function ($gender) {
                return mb_strtolower($gender['name']);
            }, $this->genders);
            $trans_params['%channel%'] = $channel['name'];
            $trans_params['%channel_with_genres%'] = $channel['name'].' : '.implode(', ', $genreNames);
            $flags |= self::CHANNEL_FLAG;
        }

        if (null !== $date) {
            $trans_params['%date%'] = $this->localized_date($date, 'full', 'none');
            $flags |= self::DATE_FLAG;
        }

        switch ($flags) {
            case self::GENDER_FLAG | self::CHANNEL_FLAG | self::DATE_FLAG :
                $page_title = $this->trans('replay_videos:channel_gender_date.title', $trans_params, 'seo');
                $page_description = $this->trans('replay_videos:channel_gender_date.meta.description', $trans_params, 'seo');
                $page_heading = $this->trans('%genre% TV shows on %channel% from %date% on demand', $trans_params);
                break;
            case self::GENDER_FLAG | self::CHANNEL_FLAG :
                $page_title = $this->trans('replay_videos:channel_gender.title', $trans_params, 'seo');
                $page_description = $this->trans('replay_videos:channel_gender.meta.description', $trans_params, 'seo');
                $page_heading = $this->trans('%genre% TV shows on %channel% on demand', $trans_params);
                break;
            case self::GENDER_FLAG | self::DATE_FLAG :
                $page_title = $this->trans('replay_videos:gender_date.title', $trans_params, 'seo');
                $page_description = $this->trans('replay_videos:gender_date.meta.description', $trans_params, 'seo');
                $page_heading = $this->trans('%genre% TV shows from %date% on demand', $trans_params);
                break;
            case self::CHANNEL_FLAG | self::DATE_FLAG :
                $page_title = $this->trans('replay_videos:channel_date.title', $trans_params, 'seo');
                $page_description = $this->trans('replay_videos:channel_date.meta.description', $trans_params, 'seo');
                $page_heading = $this->trans('TV shows on %channel% from %date% on demand', $trans_params);
                break;
            case self::GENDER_FLAG :
                $page_title = $this->trans('replay_videos:gender.title', $trans_params, 'seo');
                $page_description = $this->trans('replay_videos:gender.meta.description', $trans_params, 'seo');
                $page_heading = $this->trans('%genre% TV shows on demand', $trans_params);
                break;
            case self::CHANNEL_FLAG :
                $page_title = $this->trans('replay_videos:channel.title', $trans_params, 'seo');
                $page_description = $this->trans('replay_videos:channel.meta.description', $trans_params, 'seo');
                $page_heading = $this->trans('TV shows from %channel% on demand', $trans_params);
                break;
            case self::DATE_FLAG :
                $page_title = $this->trans('replay_videos:date.title', $trans_params, 'seo');
                $page_description = $this->trans('replay_videos:date.meta.description', $trans_params, 'seo');
                $page_heading = $this->trans('TV shows from %date% on demand', $trans_params);
                break;
            default :
                $page_title = $this->trans('replay_videos.title', [], 'seo');
                $page_description = $this->trans('replay_videos.meta.description', [], 'seo');
                $page_heading = $this->trans('The latest TV shows on demand');
        }

        if ($page > 1) {
            $page_title .= ' ('.$this->trans('page %page%', ['%page%' => $page]).')';
        }

        return [
            'title' => $page_title,
            'description' => $page_description,
            'heading' => $page_heading,
        ];
    }

    /**
     * Redirect url to the new one
     * (match route location is /replay-tv/:params).
     *
     * @see date_action()
     *
     * @param string $channel_alias The channel alias
     * @param string $gender_alias  The gender alias
     * @param string $page
     */
    public function legacy_uri_action($date, $gender_alias = null, $channel_alias = null, $page = null)
    {
        $params = [
            trim($date), trim($gender_alias), trim($channel_alias), trim($page),
        ];

        $genders = [];
        foreach ($this->genders as $gender) {
            $genders[] = $gender['alias'];
        }

        $date_params = [];
        $page_params = [];
        $gender_params = [];
        $channel_params = [];

        $blacklist = ['videos', 'tous'];

        // Check each param and try to guess what it is
        foreach ($params as $param) {
            if (in_array($param, $blacklist)) {
                continue;
            }

            // Is it a date ?
            if (preg_match('/[0-9]{2}-[0-9]{2}-[0-9]{4}/', $param)) {
                list($day, $month, $year) = explode('-', $param);
                if (checkdate($month, $day, $year)) {
                    $date_params[] = "{$year}-{$month}-{$day}";
                    continue;
                }
            }

            // Is it a gender ?
            if (in_array($param, $genders)) {
                $gender_params[] = $param;
                continue;
            }

            if (is_numeric($param)) {
                $page_params[] = $param;
                continue;
            }

            // Is it a channel ?
            if (preg_match('/[a-z0-9-]+/', $param)) {
                $channel_params[] = $param;
            }
        }

        $query_params = [];

        if (count($date_params) == 1) {
            list($date_param) = $date_params;
            $query_params['date'] = $date_param;
        }

        if (count($gender_params) == 1) {
            list($gender_param) = $gender_params;
            $query_params['gender'] = $gender_param;
        }

        if (count($page_params) == 1) {
            list($page_param) = $page_params;
            $query_params['page'] = $page_param;
        }

        if (count($channel_params) == 1) {
            list($channel_param) = $channel_params;
        }

        // @TODO use UrlGenerator here
        $url = isset($channel_param) ? sprintf('/replay-tv/videos/%s/', $channel_param) : '/replay-tv/videos/';

        if (!empty($query_params)) {
            $url = $url.'?'.http_build_query($query_params);
        }

        return $this->response->redirect($url, 301);
    }

    public function legacy_uri_gendertypeid_action($gendertypeid, $date = null, $channelalias = 'tous', $page = null, Request $request)
    {
        $query_string_params = [];
        $uri_params = '';

        // date
        if (null !== $date) {
            list($day, $month, $year) = explode('-', $date);
            if (false === checkdate($month, $day, $year)) {
                return $this->createNotFoundResponse();
            }
            $query_string_params['date'] = "{$year}-{$month}-{$day}";
        }

        // gendertypeid -> gender alias
        if (!isset($this->genders[$gendertypeid])) {
            return $this->createNotFoundResponse();
        }
        $gender_alias = $this->genders[$gendertypeid]['alias'];
        $query_string_params['gender'] = $gender_alias;

        // page
        if (null !== $page) {
            $query_string_params['page'] = $page;
        }

        // channelalias
        if ('tous' !== $channelalias) {
            $uri_params = $channelalias;
        }

        // @TODO use UrlGenerator here
        $url = ($uri_params) ? sprintf('/replay-tv/videos/%s/', $uri_params) : '/replay-tv/videos/';

        if (!empty($query_string_params)) {
            $url = $url.'?'.http_build_query($query_string_params);
        }

        return $this->response->redirect($url, 301);
    }

    /**
     * Get a timestamp list of the 7 previous days from now.
     *
     * @return array The timestamp list
     */
    public function get_days()
    {
        $now = $this->globals->get('date.today');
        $days = array();
        for ($i = 1; $i < 7; ++$i) {
            $days[] = $now - (86400 * $i);
        }

        return $days;
    }

    /**
     * Display the replay video page. (EMBED or POPUP)
     * (match route location is /replay/:params).
     *
     * embbed : display the embedded video replay page, otherwise
     * popup  : open a new browser window which redirect to no_referrer action
     *
     * @param string $video_id The video ID
     * @param string $title    The program/group alias
     * @param string $date     The broadcast date
     */
    public function replay_action($video_id, $title = null, $date = null)
    {
        // Get Video detail
        $video = $this->getSdk()['services.replay_tv']->getVideoInfos($video_id);

        // Send appropriate status code 410 if exists previously, 404 otherwise
        if (null === $video) {
            $checkVideo = $this->getSdk()['services.replay_tv']->checkVideoInfos($video_id);
            if (null === $checkVideo) {
                return $this->createNotFoundResponse();
            }

            return $this->createGoneResponse();
        }

        // If the video is embeddable, we display the embed page
        if ($video['channel']['is_embed'] == 1 && null !== $video['embed']) {
            $canonicalUrl = $this->container['url_generator']->generate('replay_replay', [
                'video_id' => $video_id,
                'title' => $this->getSdk()['utils.tool']->slugify($video['title']),
            ]);

            // Potential redirect
            if ($this->request->uri !== $canonicalUrl) {
                return $this->response->redirect($canonicalUrl, 301);
            }

            // Get group videos
            if (null !== $video['group']) {
                $groupVideos = $this->getSdk()['services.replay_tv']->getGroupVideos($video['group']['group_id'], $this->max_videos_embed_per_page_replay, true);

                if (count($groupVideos) == 1) { // The actual replay
                    $groupVideos = array();
                }
            } else {
                $groupVideos = array();
            }

            // Set current videos to the first one
            $current = 0;

            // Embed parameters are stored in serialized format & 'params' element is also serialized
            $embedInfos = @unserialize($video['embed']);
            $embedInfos['params'] = array_shift(@unserialize($embedInfos['params']));
            if ($embedInfos === false) {
                $this->log('replay', "[PLAY TV] (video id {$video_id}) failed to unserialize embed : {$video['embed']}");
            } elseif ($embedInfos['params'] === false) {
                $this->log('replay', "[PLAY TV] (video id {$video_id}) failed to unserialize embed params");
            }
            $embedInfos['channel'] = $video['channel']['alias'];

            // if ($this->isMobileLayout()) {
            //     $embedInfos['width'] = '100%';
            //     $embedInfos['height'] = '250px';
            // }
            $embed = ReplayTvUtils::embed($embedInfos); // Get embed player

            $this->set_page_title($this->trans('replay_replay.title', ['%program%' => $video['title']], 'seo'));
            $this->set_page_description($this->trans('replay_replay.meta.description',
                ['%program%' => $video['title'], '%channel%' => $video['channel']['channel']], 'seo'));

            $vars = array(
                'embed_player' => $embed,
                'total_slides' => count($groupVideos),
                'current' => $current,
                'videos' => $groupVideos,
                'video_url' => $video['video_url'],
                'infos' => $video,
                'canonical_url' => $canonicalUrl,
            );

            if ($this->has_feature(Feature::SOCIAL_TV) && !$this->isMobileLayout()) {
                $vars['block_social_tv_posts'] = $this->social_tv_posts(null, null, $video['channel']);
            }

            return $this->render($vars);
        } else {
            $url = "/url/?resource=replay_tv&identifier={$video_id}";

            return $this->response->redirect($url);
        }
    }

    /**
     * Redirect to video URL by writing html which use meta tags to remove referrer URL
     * (match route location is /replay/show/:params).
     *
     * @param string $video_id The video ID
     */
    public function no_referrer_action($video_id)
    {
        $video = $this->getSdk()['services.replay_tv']->getVideoInfos($video_id);

        if (null === $video) {
            $checkVideo = $this->getSdk()['services.replay_tv']->checkVideoInfos($video_id);

            if (null === $checkVideo) {
                return $this->createNotFoundResponse();
            }

            return $this->createGoneResponse();
        }

        $htmlReturn = '<html><head><meta name="referrer" content="never" /><meta http-equiv="refresh" content="0; URL='.$video['video_url'].'" /><title>'.$video['title'].'</title></head><body style="background: #111111;"></body></html>';

        return $this->response->write($htmlReturn);
    }
}
