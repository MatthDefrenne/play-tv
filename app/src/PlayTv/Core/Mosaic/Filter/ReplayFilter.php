<?php

namespace PlayTv\Core\Mosaic\Filter;

use Playmedia\Component\Channel\ReplayTv as ReplayComponent;
use PlayTv\Core\Mosaic\MosaicInterface;

class ReplayFilter extends BaseFilter
{
    private $replayChannels;

    /**
     * @param MosaicInterface $mosaic
     */
    public function __construct(MosaicInterface $mosaic, ReplayComponent $replayComponent)
    {
        $replayChannels = $replayComponent->getReplaysChannel();
        $replayChannels = array_map(function ($item) { return $item['channel_id']; }, $replayChannels);

        $this->replayChannels = array_combine($replayChannels, $replayChannels);

        parent::__construct($mosaic);
    }

    public function accept()
    {
        $channel = $this->current();

        return isset($this->replayChannels[$channel['id']]);
    }
}
