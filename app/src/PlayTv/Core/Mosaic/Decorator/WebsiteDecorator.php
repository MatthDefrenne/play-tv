<?php

namespace PlayTv\Core\Mosaic\Decorator;

use PlayTv\Utils\Channel as ChannelUtils;
use PlayTv\Core\Mosaic\MosaicInterface;

class WebsiteDecorator extends BaseDecorator
{
    private $websites;

    public function __construct(MosaicInterface $mosaic, array $websites)
    {
        $this->websites = $websites;

        parent::__construct($mosaic);
    }

    public function current()
    {
        $channel = parent::current();

        $channel['_website'] = ChannelUtils::satisfiesWebsite($channel, $this->websites);

        return $channel;
    }
}
