<?php

namespace PlayTv\Live\Parameters;

use PlayTv\Live\Parameters\Lifecycle\Progress;

class Player extends AbstractParameters
{
    protected $channelLogoEnabled = false;
    protected $whiteLabelEnabled = false;
    protected $volumeEnabled = true;
    protected $bitrateEnabled = true;
    protected $popupEnabled = false;
    protected $switchHdEnabled = true;
    protected $salesEnabled = true;
    protected $exportEnabled = true;
    protected $facebookEnabled = true;
    protected $twitterEnabled = true;

    protected $urls = [];
    protected $linkTo;
    protected $firstProduct;
    protected $secondProduct;
    protected $progress;
    protected $stopAdBanner = null;

    public function initialize()
    {
        $this->progress = new Progress();
    }

    public function enableSwitchHd()
    {
        $this->switchHdEnabled = true;

        return $this;
    }

    public function disableSwitchHd()
    {
        $this->switchHdEnabled = false;

        return $this;
    }

    public function enableSales()
    {
        $this->salesEnabled = true;

        return $this;
    }

    public function disableSales()
    {
        $this->salesEnabled = false;

        return $this;
    }

    public function setUrl($key, $url)
    {
        $this->urls[$key] = $url;

        return $this;
    }

    public function getUrl($key)
    {
        static $defaults;

        if (empty($defaults)) {
            $defaults = [
                'initialize' => "{$this->baseUrl}/player/initialize/{$this->channel['alias']}/",
                'play' => "{$this->baseUrl}/player/play/{$this->channel['alias']}/",
                'broadcast' => "{$this->baseUrl}/player/broadcast/{$this->channel['alias']}/",
                'popup' => "{$this->baseUrl}/television/{$this->channel['alias']}/?popup=1",
                'swf' => "{$this->baseUrl}/assets/swf/player.swf",
                'clipboardSwf' => "{$this->baseUrl}/assets/swf/zeroclipboard.swf",
                'share' => "{$this->baseUrl}/player/share/{$this->channel['alias']}/",
                'products' => "{$this->baseUrl}/nos-offres/",
                'requireCheck' => "{$this->baseUrl}/player/check/",
            ];
        }

        return isset($this->urls[$key]) ? $this->urls[$key] : $defaults[$key];
    }

    public function setLinkTo($linkTo)
    {
        $this->linkTo = $linkTo;

        return $this;
    }

    public function setProducts(array $products)
    {
        if (count($products) > 0) {
            $this->firstProduct = isset($products[0]) ? $products[0] : null;
            $this->secondProduct = isset($products[1]) ? $products[1] : null;
        }

        return $this;
    }

    public function setFirstProduct($firstProduct)
    {
        $this->firstProduct = $firstProduct;

        return $this;
    }

    public function setSecondProduct($secondProduct)
    {
        $this->secondProduct = $secondProduct;

        return $this;
    }

    public function setBroadcast($broadcast)
    {
        $this->progress->setBroadcast($broadcast);

        return $this;
    }

    protected function getProductUrl($product)
    {
        return "{$this->baseUrl}/nos-offres/{$product['alias']}/";
    }

    public function enableChannelLogo()
    {
        $this->channelLogoEnabled = true;

        return $this;
    }

    public function disableChannelLogo()
    {
        $this->channelLogoEnabled = false;

        return $this;
    }

    public function enableWhiteLabel()
    {
        $this->whiteLabelEnabled = true;

        return $this;
    }

    public function disableWhiteLabel()
    {
        $this->whiteLabelEnabled = false;

        return $this;
    }

    public function enablePopup()
    {
        $this->popupEnabled = true;

        return $this;
    }

    public function disablePopup()
    {
        $this->popupEnabled = false;

        return $this;
    }

    public function enableVolume()
    {
        $this->volumeEnabled = true;

        return $this;
    }

    public function disableVolume()
    {
        $this->volumeEnabled = false;

        return $this;
    }

    public function enableBitrate()
    {
        $this->bitrateEnabled = true;

        return $this;
    }

    public function disableBitrate()
    {
        $this->bitrateEnabled = false;

        return $this;
    }

    public function enableExport()
    {
        $this->exportEnabled = true;

        return $this;
    }

    public function disableExport()
    {
        $this->exportEnabled = false;

        return $this;
    }

    public function enableFacebook()
    {
        $this->facebookEnabled = true;

        return $this;
    }

    public function disableFacebook()
    {
        $this->facebookEnabled = false;

        return $this;
    }

    public function enableTwitter()
    {
        $this->twitterEnabled = true;

        return $this;
    }

    public function disableTwitter()
    {
        $this->twitterEnabled = false;

        return $this;
    }

    public function setAdBanner(array $opts)
    {
        // Google AdSense banner displayed when player is stopped
        $this->stopAdBanner = $opts;
    }

    public function jsonSerialize()
    {
        return [
            'playerParameters' => [
                'initialize' => $this->getUrl('initialize'),
                'play' => $this->getUrl('play'),
                'lang' => $this->locale,
                'autoPlay' => (bool) $this->autoPlay,
                'assets' => [
                    'player' => $this->getUrl('swf'),
                    'clipboard' => $this->getUrl('clipboardSwf'),
                ],
                'tracking' => [
                    'label' => (string) $this->channel['estat'],
                    'slug' => (string) $this->channel['alias'],
                ],
                'features' => [
                    'progress' => [
                        'enabled' => (bool) $this->channel['has_programs'],
                        'options' => [
                            'url' => $this->getUrl('broadcast'),
                            'preload' => $this->progress,
                        ],
                    ],
                    'requireCheck' => [
                        'enabled' => (bool) $this->channel['require_login'],
                        'options' => [
                            'url' => $this->getUrl('requireCheck'),
                        ],
                    ],
                    'channelLogo' => [
                        'enabled' => $this->channelLogoEnabled,
                    ],
                    'whiteLabel' => [
                        'enabled' => $this->whiteLabelEnabled,
                    ],
                    'volume' => [
                        'enabled' => $this->volumeEnabled,
                    ],
                    'bitrate' => [
                        'enabled' => $this->bitrateEnabled,
                    ],
                    'popup' => [
                        'enabled' => $this->popupEnabled,
                        'options' => [
                            'url' => $this->getUrl('popup'),
                        ],
                    ],
                    'switchHd' => [
                        'enabled' => $this->switchHdEnabled,
                    ],
                    'sales' => [
                        'enabled' => $this->salesEnabled,
                        'options' => [
                            'url' => $this->getUrl('products'),
                            'first' => [
                                'url' => isset($this->firstProduct) ? $this->getProductUrl($this->firstProduct) : '',
                                'alias' => isset($this->firstProduct) ? $this->firstProduct['alias'] : '',
                            ],
                            'second' => [
                                'url' => isset($this->secondProduct) ? $this->getProductUrl($this->secondProduct) : '',
                                'alias' => isset($this->secondProduct) ? $this->secondProduct['alias'] : '',
                            ],
                        ],
                    ],
                    'export' => [
                        'enabled' => $this->exportEnabled,
                        'options' => [
                            'embedCode' => "<iframe width=\"610\" height=\"384\" src=\"{$this->baseUrl}/player/embed/{$this->channel['alias']}/\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>",
                            'linkTo' => $this->linkTo ?: "{$this->baseUrl}/television/{$this->channel['alias']}/",
                        ],
                    ],
                    'facebook' => [
                        'enabled' => $this->facebookEnabled,
                        'options' => [
                            'url' => $this->getUrl('share'),
                        ],
                    ],
                    'twitter' => [
                        'enabled' => $this->twitterEnabled,
                        'options' => [
                            'url' => $this->getUrl('share'),
                        ],
                    ],
                ],
            ],
            'uniroll' => $this->unirollConfig,
            'streamLanguage' => $this->streamLanguage,
            'stopAdBanner' => $this->stopAdBanner,
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
