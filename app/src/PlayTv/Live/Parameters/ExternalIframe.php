<?php

namespace PlayTv\Live\Parameters;

class ExternalIframe extends AbstractParameters
{
    public function initialize()
    {
        $this->setOnePrerollAds();
        $this->disableSkipAds();
    }

    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'externalIframeParameters' => [
                'url' => $this->channel['live'],
                'autoPlay' => (bool) $this->autoPlay,
            ],
            'uniroll' => $this->unirollConfig,
            'streamLanguage' => $this->streamLanguage,
            'uniadsParameters' => [
                'adblocker' => $this->adblocker,
                'lang' => $this->locale,
                'channelId' => isset($this->channel) ? $this->channel['id'] : '',
                'appZone' => $this->appZone,
                'features' => [
                    'rollAds' => [
                        'enabled' => $this->rollAdsEnabled,
                    ],
                    'skipAds' => [
                        'enabled' => $this->skipAdsEnabled,
                        'options' => [
                            'url' => isset($this->skipAdsProduct) ? $this->getProductUrl($this->skipAdsProduct) : '',
                            'alias' => isset($this->skipAdsProduct) ? $this->skipAdsProduct['alias'] : '',
                        ],
                    ],
                ],
            ],
        ];
    }
}
