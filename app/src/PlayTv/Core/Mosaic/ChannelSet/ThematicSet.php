<?php

namespace PlayTv\Core\Mosaic\ChannelSet;

use PlayTv\Core\Mosaic\SortedChannelSet;

/**
 * Sorts channels by:
 * - Theme order
 * - Country priority
 * - Language priority
 * - Name.
 */
class ThematicSet extends SortedChannelSet
{
    /**
     * @param array $channels
     */
    public function __construct(array $channels = [])
    {
        $sortFunc = function (array $channel1, array $channel2) {

            if ($channel1['theme_order'] === $channel2['theme_order']) {
                if ($channel1['country_priority'] === $channel2['country_priority']) {
                    if ($channel1['language_priority'] === $channel2['language_priority']) {
                        return strcmp(strtolower($channel1['name']), strtolower($channel2['name']));
                    }

                    return ($channel1['language_priority'] < $channel2['language_priority']) ? -1 : 1;
                }

                return ($channel1['country_priority'] < $channel2['country_priority']) ? -1 : 1;
            }

            return ($channel1['theme_order'] < $channel2['theme_order']) ? -1 : 1;
        };

        parent::__construct($sortFunc, $channels);
    }
}
