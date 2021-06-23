<?php

namespace PlayTv\Core\Mosaic\Filter;

use PlayTv\Core\Website;
use PlayTv\Core\Channel\Channel;
use PlayTv\Core\Mosaic\MosaicInterface;

/**
 *
 */
class WebsiteFilter extends BaseFilter
{
    private $websites;
    private $website;

    /**
     * @param MosaicInterface $mosaic
     * @param Website[]       $websites the list of websites that are specific for a country
     * @param Website         $website  the current website
     */
    public function __construct(MosaicInterface $mosaic, array $websites, Website $website)
    {
        $this->websites = $websites;
        $this->website = $website;

        parent::__construct($mosaic);
    }

    public function accept()
    {
        $channel = new Channel($this->current());

        // The channel belongs to a website (ex: GB)
        $belongsToSomeWebsite = false;
        foreach ($this->websites as $website) {
            if ($channel->belongsToWebsite($website)) {
                $belongsToSomeWebsite = true;
                break;
            }
        }

        // The current website is a country website
        $isCountryWebsite = false;
        foreach ($this->websites as $website) {
            if ($website->equals($this->website)) {
                $isCountryWebsite = true;
                break;
            }
        }

        // The channel belongs to the current website
        $belongsToThisWebsite = $channel->belongsToWebsite($this->website);

        if ($belongsToSomeWebsite) {
            return $belongsToThisWebsite;
        }

        return !$belongsToSomeWebsite && !$isCountryWebsite;
    }
}
