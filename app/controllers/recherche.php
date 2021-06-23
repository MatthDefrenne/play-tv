<?php

/**
 * Controller used to display search results page.
 *
 * @author PLAYMEDIA
 */
class recherche_controller extends ppl_app_controller
{
    /**
     * On before action.
     *
     * @see ppl_app_controller::before_action()
     */
    public function before_action()
    {
        parent::before_action();
        $this->robots(false);
    }

    /**
     * Display the search results page.
     *
     * Expected GET parameters are
     *
     *     'q'    : query string
     *     'type' : search type
     */
    public function index_action()
    {
        $_search = $this->load('sphinx_search');

        $query = ((isset($this->request->get['q']) && !empty($this->request->get['q'])) ? $this->request->get['q'] : null);
        $type = (isset($this->request->get['type']) ? $this->request->get['type'] : null);

        switch ($type) {
            case 'chaines':
                $this->set_page_title($this->trans('recherche:chaines.title', [], 'seo'));
                $type = $_search::TYPE_CHANNELS;
                break;
            case 'personnes':
                $this->set_page_title($this->trans('recherche:personnes.title', [], 'seo'));
                $type = $_search::TYPE_CASTS;
                break;
            case 'programmes':
                $this->set_page_title($this->trans('recherche:programmes.title', [], 'seo'));
                $type = $_search::TYPE_PROGRAMS;
                break;
            case 'videos':
                $this->set_page_title($this->trans('recherche:videos.title', [], 'seo'));
                $type = $_search::TYPE_VIDEOS;
                break;
            case 'tous':
            case null:
                $this->set_page_title($this->trans('recherche.title', [], 'seo'));
                $type = null;
                break;
            default:
                return $this->createNotFoundResponse();
        }

        $results = $_search->search($query, $type);

        // remove channels that doesn't belongs to website
        $websiteChannels = $this->container['core.mosaic.mosaic_manager']->getMosaic($this->container['sdk_country_code'])->toArray();

        if ((isset($results['channels']) && is_array($results['channels'])) || $type == 'channels') {
            if ($type == 'channels') {
                $this->formatChannelsResults($results);
                $results = array_filter($results, function ($item) use ($websiteChannels) {
                    return isset($websiteChannels[$item['alias']]);
                });
            } else {
                $this->formatChannelsResults($results['channels']);
                $results['channels'] = array_filter($results['channels'], function ($item) use ($websiteChannels) {
                    return isset($websiteChannels[$item['alias']]);
                });
            }
        }

        if ((isset($results['programs']) && is_array($results['programs'])) || $type == 'programs') {
            if ($type == 'programs') {
                $this->formatProgramsResults($results);
            } else {
                $this->formatProgramsResults($results['programs']);
            }
        }

        if ((isset($results['videos']) && is_array($results['videos'])) || $type == 'videos') {
            if ($type == 'videos') {
                $this->formatVideoResults($results);
                $results = array_filter($results, function ($item) use ($websiteChannels) {
                    return isset($websiteChannels[$item['channel']['alias']]);
                });
            } else {
                $this->formatVideoResults($results['videos']);
                $results['videos'] = array_filter($results['videos'], function ($item) use ($websiteChannels) {
                    return isset($websiteChannels[$item['channel']['alias']]);
                });
            }
        }

        return $this->render(array(
            'results' => $results,
            'query' => $query,
            'type' => $type,
        ));
    }

    private function formatVideoResults(&$results)
    {
        foreach ($results as $key => $result) {
            $videoInfos = $this->getSdk()['services.replay_tv']->getVideoInfos($result['replay_id']);
            if (null === $videoInfos) {
                unset($results[$key]);
            } else {
                $results[$key] = $videoInfos;
                $results[$key]['type'] = 'videos';
            }
        }
    }

    private function formatChannelsResults(&$results)
    {
        foreach ($results as $channelId => &$result) {
            if ($channel = $this->getSdk()['services.channel']->show($channelId)) {
                $result = $channel;
                $result['type'] = 'channels';
            } else {
                unset($results[$channelId]);
            }
        }
    }

    private function formatProgramsResults(&$results)
    {
        foreach ($results as &$result) {
            if (isset($result['program_id'])) {
                $result = $this->getSdk()['services.program']->show($result['program_id']);
                $result['type'] = 'programs';
            } else {
                $result = $this->getSdk()['services.group']->show($result['group_id']);
                $result['type'] = 'groups';
            }
        }
    }
}
