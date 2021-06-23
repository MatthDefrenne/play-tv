<?php

namespace PlayTv\Sitemap\Builder;

use PlayTv\Core\Website;
use PlayTv\Core\Channel\Channel as CoreChannel;
use PlayTv\Sitemap\Sitemap;
use Symfony\Component\Routing\Route;

class Replay extends AbstractBuilder
{
    private $website;

    private function getChannels(Website $website)
    {
        $channels = $this->channelComponent->collection(true);

        $websiteChannels = [];
        foreach ($channels as $item) {
            $channel = new CoreChannel($item);

            // uk.play.tv
            if (null !== $website->getCountry() && !$channel->belongsToWebsite($website)) {
                continue;
            }

            // playtv.fr
            // play.tv
            if (null === $website->getCountry() && $channel->hasWebsite()) {
                continue;
            }

            $websiteChannels[] = $channel->getId();
        }

        return $websiteChannels;
    }

    protected function getBasename()
    {
        return 'replay-channels';
    }

    protected function countItems()
    {
        $channels = $this->getChannels($this->website);

        if (empty($channels)) {
            return 0;
        }

        $inClause = implode(',', $channels);

        $sql = <<<SQL
        SELECT COUNT(*)
        FROM tv_channels_grabbers
        WHERE channel_id IN ($inClause)
SQL;

        return $this->executeCount($sql);
    }

    protected function getItems($page)
    {
        $channels = $this->getChannels($this->website);
        $inClause = implode(',', $channels);

        $sql = <<<SQL
        SELECT c.channel_id AS id, c.alias
        FROM tv_channels_grabbers g
        JOIN television_channel c ON g.channel_id = c.channel_id
        WHERE g.channel_id IN ($inClause)
SQL;

        return $this->executeSelect($this->limit($sql, $page));
    }

    protected function getChangeFrequency()
    {
        return 'daily';
    }

    protected function getRouteParameters($item)
    {
        return [
            'channel_id' => $item['id'],
            'channel_alias' => $item['alias'],
        ];
    }

    public function build(Website $website, $routeName, Route $route)
    {
        $this->website = $website;

        return parent::build($website, $routeName, $route);
    }
}
