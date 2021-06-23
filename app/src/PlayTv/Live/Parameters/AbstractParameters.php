<?php

namespace PlayTv\Live\Parameters;

/**
 * Abstract parameters.
 *
 * Define common advertisements structure.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
abstract class AbstractParameters implements \JsonSerializable
{
    protected $channel;
    protected $baseUrl;
    protected $assetsBaseUrl;
    protected $locale;

    protected $adblocker = 'adb=1';
    protected $appZone = 'desktop.preroll';
    protected $rollAdsEnabled = true;
    protected $skipAdsEnabled = true;
    protected $skipAdsProduct;

    protected $autoPlay = true;
    protected $unirollConfig = [];
    protected $streamLanguage = null; // SK: Dirty hack which assume that all streams has single language code

    public function __construct($baseUrl, $assetsBaseUrl, $locale)
    {
        $this->baseUrl = $baseUrl;
        $this->assetsBaseUrl = $assetsBaseUrl;
        $this->locale = $locale;

        $this->initialize();
    }

    public function initialize()
    {
    }

    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    public function setAutoplay($autoPlay = true)
    {
        $this->autoPlay = $autoPlay;

        return $this;
    }

    public function enabledRollAds()
    {
        $this->rollAdsEnabled = true;

        return $this;
    }

    public function disableRollAds()
    {
        $this->rollAdsEnabled = false;

        return $this;
    }

    public function setAds($site, $zone = 'preroll')
    {
        $this->appZone = "{$site}.{$zone}";

        return $this;
    }

    public function setOnePrerollAds()
    {
        $this->appZone = 'desktop.replay';

        return $this;
    }

    public function setTwoPrerollsAds()
    {
        $this->appZone = 'desktop.preroll';

        return $this;
    }

    public function setMobileOnePrerollAds()
    {
        $this->appZone = 'desktop.preroll';
        // $this->appZone = 'mobile.preroll'; // Uniroll can handle mobile adverts using same zone as desktop version

        return $this;
    }

    public function setSkipAdsProduct(array $product)
    {
        $this->skipAdsProduct = $product;

        return $this;
    }

    public function enableSkipAds()
    {
        $this->skipAdsEnabled = true;

        return $this;
    }

    public function disableSkipAds()
    {
        $this->skipAdsEnabled = false;

        return $this;
    }

    public function setUnirollConfig(array $config)
    {
        $this->unirollConfig = $config;

        return $this;
    }

    public function setStreamLanguage($lang)
    {
        $this->streamLanguage = $lang;

        return $this;
    }

    public function getAds()
    {
        return $this->appZone;
    }

    public function getChannel()
    {
        return isset($this->channel) ? $this->channel : null;
    }
}
