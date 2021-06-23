<?php

namespace PlayTv\Core\Mosaic\ChannelSet;

use PlayTv\Core\Mosaic\SortedChannelSet;

/**
 * Sorts channels by:
 * - Theme order
 * - Channel name.
 */
class InternationalSet extends SortedChannelSet
{
    public function __construct(array $channels = [])
    {
        $sortFunc = function (array $channel1, array $channel2) {
            if ($channel1['theme_order'] === $channel2['theme_order']) {
                // Sort by channel name if order is the same
                return strcmp(strtolower($channel1['name']), strtolower($channel2['name']));
            }

            return ($channel1['theme_order'] < $channel2['theme_order']) ? -1 : 1;
        };

        parent::__construct($sortFunc, $channels);
    }
}
