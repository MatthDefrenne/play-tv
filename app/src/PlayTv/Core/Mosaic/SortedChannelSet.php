<?php

namespace PlayTv\Core\Mosaic;

class SortedChannelSet extends ChannelSet
{
    private $sortFunc;

    public function __construct($sortFunc, array $channels = [])
    {
        uasort($channels, $sortFunc);

        parent::__construct($channels);

        $this->sortFunc = $sortFunc;
    }

    public function add($newChannel)
    {
        if ($this->contains($newChannel)) {
            return false;
        }

        $added = false;
        $newChannels = [];
        foreach ($this->channels as $channel) {
            if (!$added && (integer) call_user_func($this->sortFunc, $newChannel, $channel) < 0) {
                $newChannels[(string) $newChannel['alias']] = $newChannel;
                $added = true;
            }

            $newChannels[(string) $channel['alias']] = $channel;
        }

        if (!$added) {
            $newChannels[(string) $newChannel['alias']] = $newChannel;
        }

        $this->channels = $newChannels;
    }
}
