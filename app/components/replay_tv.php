<?php

/**
 *	PHPlay Framework.
 *
 *	Replay TV Component
 *
 *	@author Playmedia <contact at playmedia dot fr>
 *
 *	@version 0.2.1
 */
class replay_tv_component extends ppl_component
{
    /**
     * The logger object instance.
     *
     * @var ppl_log_logger
     */
    private $logger;

    /**
     * Constructor.
     */
    public function construct()
    {
        $debug = true;
        $this->logger = $this->get_logger('replay', $debug);
    }

    /*************************************************************************************************************/
    /****************** NEXT METHODS DO NOT REMOVE, USE IN SPHINX SEARCH PHPLAY COMPONENT ************************/
    /*************************************************************************************************************/

    /**
     *	hydrate_video.
     *
     *	@description return hydrated video
     *
     *	@param $video array
     *
     *	@return array
     */
    public function hydrate_video($video)
    {
        $_tools = $this->load('tools');

        $video['channel_img_path'] = $_tools->channel_img_path($video['channel_id'], $_tools::CHANNEL_IMG_SMALL, false, $this->globals->get('static_base_url'));

        if (isset($video['group_id'])) {
            $video['video_page_url'] = $_tools->video_page_url($video['replay_id'], $video['group_title'], $video['broadcast_date']);

            if (isset($video['group_title']) && isset($video['type_id'])) {
                $video['group_page_url'] = $_tools->group_page_url($video['group_id'], $video['type_id'], $video['group_title']);
            }
        } else {
            if (isset($video['program_title']) && !empty($video['program_title'])) {
                $video['video_page_url'] = $_tools->video_page_url($video['replay_id'], $video['program_title'], $video['broadcast_date']);
            } else {
                $video['video_page_url'] = $_tools->video_page_url($video['replay_id'], $video['title'], $video['broadcast_date']);
            }
        }

        if (isset($video['video_url']) && $video['channel_id'] === '9') {
            $video['url_id'] = $this->get_url_id_for_arte($video['video_url']);
        } else {
            $video['url_id'] = '';
        }

        if (isset($video['program_image_id']) && $video['program_image_id'] !== 0) {
            $video['video_image_path'] = $_tools->program_img_path($video['program_image_id'], $_tools::PROGRAM_IMG_MEDIUM);
        } elseif (isset($video['group_image_id']) && $video['group_image_id'] !== 0) {
            $video['video_image_path'] = $_tools->program_img_path($video['group_image_id'], $_tools::PROGRAM_IMG_MEDIUM);
        } elseif (isset($video['program_group_image_id']) && $video['program_group_image_id'] !== 0) {
            $video['video_image_path'] = $_tools->program_img_path($video['program_group_image_id'], $_tools::PROGRAM_IMG_MEDIUM);
        }

        $video['title'] = $this->replace_video_title($video);

        if (isset($video['program_title']) && !empty($video['program_title'])) {
            $video['program_page_url'] = $_tools->program_page_url($video['program_id'], $video['program_title']);
        }

        if (isset($video['broadcast_date']) && !empty($video['broadcast_date']) && isset($video['added_date']) && !empty($video['added_date']) && (strtotime($video['added_date']) - strtotime($video['broadcast_date'])) > 604800) {
            $video['broadcast_date'] = null;
        }
        if ((!isset($video['broadcast_date']) || empty($video['broadcast_date'])) && isset($video['program_broadcast_date']) && !empty($video['program_broadcast_date'])) {
            $video['broadcast_date'] = $video['program_broadcast_date'];
        }

        if (isset($video['length']) && (int) $video['length'] === 0) {
            $video['length'] = null;
        }
        if (isset($video['program_duration']) && $video['program_duration'] !== 0 && !isset($video['length'])) {
            $video['length'] = ($video['program_duration'] * 60);
        }

        // Indicates if the video is displayed as embed (see _video.tpl)
        $video['is_embed'] = ((isset($video['embed']) && (mb_strlen($video['embed']) > 0)) && (isset($video['channel_is_embed']) && $video['channel_is_embed'] == '1'));

        return $video;
    }

    /**
     * replace_video_title.
     *
     * @description try to replace video title by program title (if linked)
     *
     * @param $video
     *
     * @return array
     */
    public function replace_video_title($video)
    {
        $_tools = $this->load('tools');

        if (isset($video['program_title']) && $video['program_title'] !== '') {
            $program = array(
                'title' => $video['program_title'],
                'gender_id' => $video['program_gender_id'],
                'episode' => $video['program_episode'],
                'episodes' => $video['program_episodes'],
                'part' => $video['program_part'],
                'parts' => $video['program_parts'],
                'season' => $video['program_season'],
            );

            return $_tools->program_fulltitle($program).(isset($video['program_subtitle']) ? ' : '.$video['program_subtitle'] : '');
        }

        return isset($video['clean_title']) ? $video['clean_title'] : $video['title'];
    }

    /**
     * get_url_id_for_arte.
     *
     * @description return url _id for embedd arte
     *
     * @param $url_video string $url_video in arte
     *
     * @return string
     */
    public function get_url_id_for_arte($url_video)
    {
        $uri = explode('/', $url_video);

        if (!isset($uri[5])) {
            return;
        }

        $url_id = explode('.', $uri[5]);

        return $url_id[0];
    }
}
