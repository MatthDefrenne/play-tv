<?php

/**
 * Controller to handle rebound links.
 */
class url_controller extends ppl_app_controller
{
    public function index_action()
    {
        $this->robots(false);
        $channelId = 0; // Uniroll "no channel" equals zero

        // final redirect page without referrer
        if (isset($this->request->get['raw_url'])) {
            $raw_url = $this->request->get['raw_url'];

            // SK - 2019-11-22 : ensure it is an URL (security fix)
            if (filter_var($raw_url, FILTER_VALIDATE_URL) === false) {
                return $this->createNotFoundResponse();
            }

            $html = '<html><head><meta name="referrer" content="never" /><meta http-equiv="refresh" content="0; URL='.$raw_url.'" /></head><body style="background: #111111;"></body></html>';

            return $this->response->write($html);
        }

        // pre redirect page

        if (!isset($this->request->get['identifier']) || !isset($this->request->get['resource'])) {
            return $this->createNotFoundResponse();
        }

        if ('channel' === $this->request->get['resource']) {
            $channel = $this->getSdk()['services.channel']->show($this->request->get['identifier']);

            if (null === $channel) {
                return $this->createNotFoundResponse();
            }

            // exclude France Television channels
            $channelId = $channel['id'];
            if (isset($this->container['france_television'][$channelId])) {
                return $this->createNotFoundResponse();
            }

            $notifier_message = 'Votre chaîne après la publicité...';
            $noreferer_url = '/url/?raw_url='.$channel['live'];
            $raw_url = $channel['live'];

            $this->set_page_title($this->trans('url_index:channel.title', ['%channel%' => $channel['name']], 'seo'));
        }

        if ('replay_tv' === $this->request->get['resource']) {
            $replay_tv = $this->getSdk()['services.replay_tv']->getVideoInfos($this->request->get['identifier']);

            if (null === $replay_tv) {
                return $this->createNotFoundResponse();
            }

            // exclude France Television channels
            $channelId = $replay_tv['channel']['id'];
            if (isset($this->container['france_television'][$channelId])) {
                return $this->createNotFoundResponse();
            }

            $channel = $replay_tv['channel'];
            $notifier_message = 'Votre programme en replay après la publicité...';
            $noreferer_url = '/url/?raw_url='.urlencode($replay_tv['video_url']);
            $raw_url = $replay_tv['video_url'];

            $this->set_page_title($this->trans('url_index:replay_tv.title', ['%replay%' => $replay_tv['title']], 'seo'));
        }

        // Set zoneUID to 'inflowplaytvuk' if play.* domain (uk.play.* does not exists anymore)
        $appZone = $this->container['is_website_default'] ? 'play-tv-uk.inflow' : 'desktop.replay';

        $site = '';
        if (isset($this->request->get['site']) && '' !== $this->request->get['site']) {
            $appZone = "{$this->request->get['site']}.inflow";
            $site = $this->request->get['site'];
        }

        // Get Uniroll ad player configuration
        $config = $this->checkUnirollAdCampaign(
            $this->convertZoneUid($appZone),
            $channelId
        );

        $inflow = [
            'noRefererUrl' => $noreferer_url,
            'rawUrl' => $raw_url,
            'site' => $site,
            'uniadsFactoryArgs' => [
                'skipAdsButton' => false,
                'lang' => $this->container['locale'],
            ],
            'uniroll' => $config,
            'uniadsParameters' => [
                'channelId' => $channel['id'],
                'appZone' => $appZone,
                'notifierMessage' => $notifier_message,
                'notifierTitle' => false,
            ],
        ];

        // Replace player w/ adb content if adb flag exists in query string
        $adb = null;
        if (isset($this->request->get['adb']) && 1 === (int) $this->request->get['adb']) {
            $adb = $this->adblock();
        }

        return $this->render([
            'resource' => $this->request->get['resource'],
            'channel' => $channel,
            'replay_tv' => (isset($replay_tv) ? $replay_tv : null),
            'inflow' => $inflow,
            'adb' => $adb,
        ]);
    }
}
