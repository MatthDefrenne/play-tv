<?php

namespace PlayTv\Core\Mosaic\ChannelSet;

use PlayTv\Core\Mosaic\SortedChannelSet;

/**
 * Sorts channels by:
 * - Country name
 * - Theme order
 * - Channel name.
 */
class OtherSet extends SortedChannelSet
{
    public function __construct(array $channels = [])
    {
        $sortFunc = function (array $channel1, array $channel2) {
            if (strcmp(strtolower($channel1['country_name']), strtolower($channel2['country_name'])) === 0) {
                if ($channel1['theme_order'] === $channel2['theme_order']) {
                    // Sort by channel name if theme order is the same
                    return strcmp(strtolower($channel1['name']), strtolower($channel2['name']));
                }

                return ($channel1['theme_order'] < $channel2['theme_order']) ? -1 : 1;
            }

            return strcmp(strtolower($channel1['country_name']), strtolower($channel2['country_name']));
        };

        parent::__construct($sortFunc, $channels);
    }
}
