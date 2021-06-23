<?php

namespace PlayTv\Core\Mosaic\Decorator;

use Playmedia\Component\Channel as ChannelComponent;
use PlayTv\Core\Mosaic\MosaicInterface;

class StreamingDecorator extends BaseDecorator
{
    private $country;
    private $account;

    public function __construct(MosaicInterface $mosaic, $country, $account = null)
    {
        $this->country = $country;
        $this->account = $account;

        parent::__construct($mosaic);
    }

    public static function streamingKeysAreDefined(array $channel)
    {
        return isset($channel['streamable'], $channel['streaming_source'], $channel['streaming_spec'], $channel['stream_access']);
    }

    public function current()
    {
        return ChannelComponent::getStreamingKeys(parent::current(), $this->country, $this->account);
    }
}
