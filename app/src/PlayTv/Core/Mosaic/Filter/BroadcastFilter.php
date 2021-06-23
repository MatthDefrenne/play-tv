<?php

namespace PlayTv\Core\Mosaic\Filter;

use PlayTv\Core\Mosaic\MosaicInterface;

class BroadcastFilter extends BaseFilter
{
    private $country;
    private $network;

    /**
     * @param Traversable $mosaic
     * @param string      $country
     */
    public function __construct(MosaicInterface $mosaic, $country)
    {
        $this->country = $country;

        parent::__construct($mosaic);
    }

    public function accept()
    {
        $channel = $this->current();

        if (!$channel['has_programs']) {
            return false;
        }

        if ($channel['country'] !== $this->country) {
            return false;
        }

        return true;
    }
}
