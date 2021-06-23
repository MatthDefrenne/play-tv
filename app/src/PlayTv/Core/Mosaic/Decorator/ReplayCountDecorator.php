<?php

namespace PlayTv\Core\Mosaic\Decorator;

use Playmedia\Component\Channel\ReplayTv as ReplayComponent;
use PlayTv\Core\Mosaic\MosaicInterface;

class ReplayCountDecorator extends BaseDecorator
{
    private $replayCount = array();

    public function __construct(MosaicInterface $mosaic, ReplayComponent $replayComponent)
    {
        $replayChannels = $replayComponent->getReplaysChannel();

        foreach ($replayChannels as $channel) {
            $this->replayCount[$channel['channel_id']] = $channel['replay_count'];
        }

        parent::__construct($mosaic);
    }

    public function current()
    {
        $channel = parent::current();

        $channel['replay_count'] = isset($this->replayCount[$channel['id']]) ? $this->replayCount[$channel['id']] : 0;

        return $channel;
    }
}
