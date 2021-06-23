<?php

namespace PlayTv\Sitemap\Builder;

use PlayTv\Core\Website;
use PlayTv\Core\Channel\Channel as CoreChannel;
use PlayTv\Sitemap\Sitemap;
use PlayTv\Sitemap\Video;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class Channel extends AbstractBuilder
{
    protected function getBasename()
    {
        return 'channels';
    }

    protected function countItems()
    {
        return count($this->channelComponent->collection(true));
    }

    protected function getItems($page)
    {
        return $this->channelComponent->collection(true);
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

    protected function getPlayerUrl(Website $website, $item)
    {
        // Known issue : this is an ugly hack
        // See also "player_embed" route in app/config/routes-fr.yml
        return sprintf(
            '%s://%s/player/embed/%s/',
            $this->scheme,
            $website->getHost(),
            $item['alias']
        );
    }

    public function build(Website $website, $routeName, Route $route)
    {
        // See app/config/custom.conf file
        $isPlayTvFr = $website->getKey() === 'ptv_fr';
        $isPlayTvUk = $website->getKey() === 'ptv_gb';
        // $isPlayTvDefault = $website->getKey() === 'ptv_default';
        $isLiveChannelSitemap = $isPlayTvFr && $this->getBasename() === 'channels-live';

        $sitemap = new Sitemap($website->getHost(), $this->scheme, $isLiveChannelSitemap);

        $channels = $this->getItems(1);
        foreach ($channels as $item) {
            $channel = new CoreChannel($item);

            // uk.play.tv
            if ($isPlayTvUk && !$channel->belongsToWebsite($website)) {
                continue;
            }

            // playtv.fr (playtv.fr channels website property is null)
            if ($isPlayTvFr && $channel->hasWebsite()) {
                continue;
            }

            try {
                $lastmod = null;  // Unused
                $priority = null; // Unused
                $video = null;

                // Add Google video sitemap element (if building french live channel sitemap)
                if ($isLiveChannelSitemap) {
                    $item['player_url'] = $this->getPlayerUrl($website, $item);
                    $video = new Video($item, $this->scheme);
                }

                $url = $this->getUrl($item, $routeName, $route);
                $sitemap->add($url, $this->getChangeFrequency(), $lastmod, $priority, $video);
            } catch (InvalidParameterException $e) {
                $this->logger->warn($e->getMessage());
            }
        }

        $prefix = $this->scheme === 'http' ? 'sitemap-' : 'sitemap-https-';
        $file = $this->targetDir.'/'.$prefix.$this->getBasename().'.xml';

        if ($sitemap->count() === 0) {
            $this->logger->warn(sprintf('Sitemap "%s" has no items, skip "%s" file', $this->getBasename(), $file));

            return;
        }

        // echo (string) $sitemap;
        $sitemap->write($file);
    }
}
