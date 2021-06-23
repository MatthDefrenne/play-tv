<?php

namespace PlayTv\Widget;

use Playmedia\Api\Client;
use Playmedia\Component\Channel as ChannelComponent;

class WidgetManager
{
    private $channelComponent;
    private $client;

    public function __construct(Client $client, ChannelComponent $channelComponent)
    {
        $this->client = $client;
        $this->channelComponent = $channelComponent;
    }

    public function getWidget($type, $country)
    {
        $data = $this->client->getJSON("/widgets/{$type}/", ['query' => 'country='.$country], []);
        if (!empty($data)) {
            $channels = current($data);
        }

        return $this->hydrate($channels);
    }

    protected function hydrate($channels)
    {
        return array_map(function ($channel) {
            return $this->channelComponent->show($channel);
        }, $channels);
    }
}
