<?php

namespace PlayTv\Core\Mosaic\ChannelSet;

use PlayTv\Core\Mosaic\SortedChannelSet;

/**
 * Sorts channels by CSA order.
 */
class TntSet extends SortedChannelSet
{
    public function __construct(array $channels = [])
    {
        $sortFunc = function (array $a, array $b) {
            if ($a['order'] === $b['order']) {
                // Sort by channel name if order is the same
                return strcmp(strtolower($a['name']), strtolower($b['name']));
            }

            return $a['order'] < $b['order'] ? -1 : 1;
        };

        parent::__construct($sortFunc, $channels);
    }
}
