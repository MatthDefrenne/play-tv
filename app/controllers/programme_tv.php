<?php

use Playmedia\Component\Channel;

/**
 * Controller used to display (single) tv program page.
 *
 * @author PLAYMEDIA
 */
class programme_tv_controller extends ppl_app_controller
{
    /**
     * Display tv program informations page.
     *
     * @param string $program_id    The program ID
     * @param string $program_alias The program alias
     */
    public function index_action($program_id, $program_alias)
    {
        $program = $this->getSdk()['services.program']->show($program_id);

        if (is_null($program)) {
            return $this->createNotFoundResponse();
        }

        // Potential redirect
        if (!$this->isI18n() && urldecode($this->request->uri) !== $program['program_url']) {
            return $this->response->redirect($program['program_url'], 301);
        }

        // Formatted summary
        $program['summary'] = $this->getSdk()['utils.program']->summaryFormatted($program['summary']);

        $program['group'] = $this->getSdk()['services.program']->getGroupByProgram($program['id'], $this->getSdk()['services.group']);
        $related_programs = $program['group'] === null ? null : $this->getSdk()['services.program']->getRelatedPrograms($program);
        $casts = $this->getSdk()['services.program']->getCastingByProgram($program['id']);

        $channels_collection = $this->getSdk()['services.channel']->collection();

        $broadcastMosaic = $this->container['core.mosaic.mosaic_manager']->getBroadcastMosaic($this->container['sdk_country_code']);

        $timeslot = $this->getSdk()['services.broadcast']->getLiveBroadcasts($broadcastMosaic);
        $is_live = $this->getSdk()['services.program']->isProgramlive($program_id, $timeslot);

        $channelsById = array();
        foreach ($channels_collection as $channel) {
            $channelsById[$channel['id']] = $channel;
        }

        unset($broadcastMosaic, $timeslot, $channels_collection);

        if (null !== $is_live) {
            $channelLive = $channelsById[$is_live['broadcast']['channel_id']];
            $country_code = $this->container['country_code'];
            $account = $this->container['account'];
            $channelLive = Channel::getStreamingKeys($channelLive, $country_code, $account);
            $is_live['broadcast']['channel'] = $channelLive;
        }

        $next_broadcasts = $this->getSdk()['services.broadcast']->getNextBroadcastByProgram($program_id, $channelsById);
        $next_broadcasts = array_slice($next_broadcasts, 0, 10);

        $previous_broadcasts = $this->getSdk()['services.broadcast']->getPreviousBroadcastsByYear($program_id, $channelsById);

        unset($channelsById);

        $videos = $this->getSdk()['services.replay_tv']->getProgramVideos($program_id);

        $group_videos = null;
        if (null !== $program['group']) {
            $group_videos = $this->getSdk()['services.replay_tv']->getGroupVideos($program['group']['group_id'], 5, false, $program_id);
        }

        $program_title = $program['fulltitle'].($program['subtitle'] ? ' : '.$program['subtitle'] : '');

        $this->set_page_title($this->trans('programme.title', ['%program%' => $program_title], 'seo'));
        $this->set_page_description($program['summary'] ?: '');

        return $this->render(array(
            'canonical_url' => $program['program_url'],
            'program' => $program,
            'is_live' => $is_live,
            'casts' => $casts,
            'related_programs' => $related_programs,
            'broadcasts' => $next_broadcasts,
            'previous_broadcasts' => $previous_broadcasts,
            'videos' => $videos,
            'group' => $program['group'],
            'group_videos' => $group_videos,
        ));
    }
}
