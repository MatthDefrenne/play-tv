<?php

namespace PlayTv\Core\Mosaic\Filter;

use Playmedia\Component\Channel as ChannelComponent;
use PlayTv\Core\Mosaic\MosaicInterface;

class GeolocFilter extends BaseFilter
{
    private $country;

    /**
     * @param MosaicInterface $mosaic
     * @param string          $country
     */
    public function __construct(MosaicInterface $mosaic, $country)
    {
        $this->country = $country;

        parent::__construct($mosaic);
    }

    public function accept()
    {
        return ChannelComponent::isStreamableByCountry($this->current(), $this->country);
    }
}
