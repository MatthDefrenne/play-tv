<?php

namespace PlayTv\Core\Mosaic\Decorator;

use Playmedia\Component\Channel as ChannelComponent;
use PlayTv\Core\Mosaic\MosaicInterface;
use PlayTv\Utils\Channel as ChannelUtils;

class ChannelDecorator extends BaseDecorator
{
    private $channelComponent;

    public function __construct(MosaicInterface $mosaic, ChannelComponent $channelComponent)
    {
        $this->channelComponent = $channelComponent;

        parent::__construct($mosaic);
    }

    public function current()
    {
        $channel = parent::current();

        $channel['has_streams'] = $this->channelComponent->hasStreams($channel['id']);
        $channel['geolocs'] = $this->channelComponent->getChannelGeolocs($channel['id']);
        $channel['products'] = $this->channelComponent->getProducts($channel['id']);
        $channel['has_social_tv'] = $this->channelComponent->hasSocialTv($channel['id']);
        $channel['has_replay_tv'] = $this->channelComponent->hasReplayTv($channel['id']);
        $channel['is_radio'] = ChannelUtils::isRadio($channel);

        return $channel;
    }
}
