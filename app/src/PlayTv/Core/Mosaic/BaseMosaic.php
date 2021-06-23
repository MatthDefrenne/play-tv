<?php

namespace PlayTv\Core\Mosaic;

class BaseMosaic extends \ArrayIterator implements MosaicInterface
{
    public function __construct(array $channels = [])
    {
        $channelsByAlias = [];
        foreach ($channels as $channel) {
            $channelsByAlias[$channel['alias']] = $channel;
        }

        parent::__construct($channelsByAlias);
    }

    public function toArray()
    {
        return $this->getArrayCopy();
    }
}
