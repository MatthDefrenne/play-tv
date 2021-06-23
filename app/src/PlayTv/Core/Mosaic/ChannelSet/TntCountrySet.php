<?php

namespace PlayTv\Core\Mosaic\ChannelSet;

use PlayTv\Core\Mosaic\SortedChannelSet;

/**
 * Sorts channels by:
 * - Country priority
 * - CSA order.
 * - Name.
 */
class TntCountrySet extends SortedChannelSet
{
    public function __construct(array $channels = [])
    {
        $sortFunc = function (array $channel1, array $channel2) {
            if ($channel1['country_priority'] === $channel2['country_priority']) {
                if ($channel1['order'] === $channel2['order']) {
                    // Sort by channel name if country priority and order are the same
                    return strcmp(strtolower($channel1['name']), strtolower($channel2['name']));
                }

                return ($channel1['order'] < $channel2['order']) ? -1 : 1;
            }

            return ($channel1['country_priority'] < $channel2['country_priority']) ? -1 : 1;
        };

        parent::__construct($sortFunc, $channels);
    }
}
