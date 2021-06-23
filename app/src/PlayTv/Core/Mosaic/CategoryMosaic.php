<?php

namespace PlayTv\Core\Mosaic;

use PlayTv\Core\Mosaic\ChannelSet\TntCountrySet;

class CategoryMosaic extends GroupingMosaic
{
    public function __construct(MosaicInterface $mosaic)
    {
        parent::__construct($mosaic, function (array $channel) {
            return $channel['category_name'];
        });

        // Reorder TNT channels
        if (isset($this['TNT'])) {
            $tntSet = new TntCountrySet($this['TNT']->toArray());
            $this['TNT'] = new BaseMosaic($tntSet->toArray());
        }
    }
}
