<?php

namespace Playmedia\Component;

use Playmedia\Component\Channel as ChannelComponent;
use PlayTv\Core\Website;
use PlayTv\Utils\Channel as ChannelUtils;

class WebsiteAwareChannel extends ChannelComponent
{
    private $websites = array();

    public function addWebsite(Website $website)
    {
        $this->websites[] = $website;

        return $this;
    }

    public function collection($enabled = true)
    {
        $channels = parent::collection($enabled);

        foreach ($channels as &$channel) {
            $channel['_website'] = ChannelUtils::satisfiesWebsite($channel, $this->websites);
        }

        return $channels;
    }

    public function show($identifier, $enabled = true)
    {
        if ($channel = parent::show($identifier, $enabled)) {
            $channel['_website'] = ChannelUtils::satisfiesWebsite($channel, $this->websites);

            return $channel;
        }
    }
}
