<?php

namespace PlayTv\Core\Mosaic;

class ThemeMosaic extends GroupingMosaic
{
    public function __construct(MosaicInterface $mosaic)
    {
        parent::__construct($mosaic, function (array $channel) {
            return $channel['theme_name'];
        });
    }
}
