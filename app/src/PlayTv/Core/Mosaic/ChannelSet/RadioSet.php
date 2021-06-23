<?php

namespace PlayTv\Core\Mosaic\ChannelSet;

use PlayTv\Core\Mosaic\SortedChannelSet;

/**
 * Sorts radios by:
 * - Theme order
 * - Radio name.
 */
class RadioSet extends SortedChannelSet
{
    public function __construct(array $channels = [])
    {
        $sortFunc = function (array $channel1, array $channel2) {
            if ($channel1['theme_order'] === $channel2['theme_order']) {
                // Sort by radio name if order is the same
                return strcmp(strtolower($channel1['name']), strtolower($channel2['name']));
            }

            return ($channel1['theme_order'] < $channel2['theme_order']) ? -1 : 1;
        };

        parent::__construct($sortFunc, $channels);
    }
}
