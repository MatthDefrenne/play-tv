<?php

namespace PlayTv\Core\Mosaic;

use Psr\Log\LoggerInterface;
use Symfony\Component\Stopwatch\Stopwatch;
use Playmedia\Component\Channel as ChannelComponent;
use Playmedia\Component\Channel\Network as NetworkComponent;
use Playmedia\Component\Channel\ReplayTv as ReplayComponent;
use Playmedia\Component\Channel\ProductResolver;
use PlayTv\Core\Mosaic;
use PlayTv\Core\Website;

class MosaicManager
{
    private $channels;
    private $productResolver;
    private $websites;
    private $website;
    private $channelComponent;
    private $networkComponent;
    private $replayComponent;
    private $socialChannels;
    private $storage;
    private $logger;

    public function __construct(array $channels, ProductResolver $productResolver, array $websites, Website $website, ChannelComponent $channelComponent, NetworkComponent $networkComponent, ReplayComponent $replayComponent, array $socialChannels, LoggerInterface $logger = null)
    {
        $this->channels = $channels;
        $this->productResolver = $productResolver;
        $this->websites = $websites;
        $this->website = $website;
        $this->channelComponent = $channelComponent;
        $this->networkComponent = $networkComponent;
        $this->replayComponent = $replayComponent;
        $this->socialChannels = $socialChannels;
        $this->logger = $logger;

        $this->storage = [
            'sorted' => new \SplObjectStorage(),
            'television' => new \SplObjectStorage(),
            'broadcast' => new \SplObjectStorage(),
            'replay' => new \SplObjectStorage(),
        ];
    }

    /**
     * Update the channel array.
     * This will reset any previously cached mosaic.
     *
     * @param array $channels
     */
    public function setChannels(array $channels)
    {
        $this->channels = $channels;

        foreach ($this->storage as $objectStorage) {
            foreach ($objectStorage as $object) {
                $objectStorage->detach($object);
            }
        }

        return $this;
    }

    /**
     * @param string $type
     * @param string $hash
     */
    private function storageGet($type, $hash)
    {
        if (!isset($this->storage[$type])) {
            return;
        }

        $objectStorage = $this->storage[$type];

        foreach ($objectStorage as $mosaic) {
            if ($hash === $objectStorage[$mosaic]) {
                return $mosaic;
            }
        }
    }

    /**
     * @param string $type
     * @param string $hash
     * @param mixed  $mosaic
     */
    private function storageSet($type, $hash, $mosaic)
    {
        if (!isset($this->storage[$type])) {
            return;
        }

        $this->storage[$type]->attach($mosaic, $hash);
    }

    private function start($eventName)
    {
        $stopwatch = new Stopwatch();
        $stopwatch->start($eventName);

        return $stopwatch;
    }

    private function stop(Stopwatch $stopwatch, $eventName)
    {
        $event = $stopwatch->stop($eventName);
        if (null !== $this->logger) {
            $this->logger->info(sprintf('%s duration = %d ms, memory = %d bytes', $eventName, $event->getDuration(), $event->getMemory()));
        }
    }

    public function getMosaic($country)
    {
        $eventName = "MosaicManager::getMosaic({$country})";
        $stopwatch = $this->start($eventName);

        if ($mosaic = $this->storageGet('sorted', $country)) {
            $this->stop($stopwatch, $eventName);

            return $mosaic;
        }

        $mosaic = new Mosaic\Mosaic($country, $this->channels, $this->logger);
        $mosaic = new Mosaic\Decorator\WebsiteDecorator($mosaic, $this->websites);
        $mosaic = new Mosaic\Filter\WebsiteFilter($mosaic, $this->websites, $this->website);

        $this->storageSet('sorted', $country, $mosaic);
        $this->stop($stopwatch, $eventName);

        return $mosaic;
    }

    public function createSortedMosaic(array $channels, $country)
    {
        return new Mosaic\Mosaic($country, $channels);
    }

    /**
     * @param string  $country
     * @param Account $account
     * @param array   $options
     */
    public function getTelevisionMosaic($country, $account = null, array $options = array())
    {
        $hash = http_build_query(array_merge([
            'country' => $country,
            'account' => null !== $account ? $account['id'] : 'null',
        ], $options));

        $eventName = "MosaicManager::getTelevisionMosaic({$hash})";
        $stopwatch = $this->start($eventName);

        if ($mosaic = $this->storageGet('television', $hash)) {
            $this->stop($stopwatch, $eventName);

            return $mosaic;
        }

        $mosaic = $this->getMosaic($country);

        // Decorators
        $mosaic = new Mosaic\Decorator\StreamingDecorator($mosaic, $country, $account);
        $mosaic = new Mosaic\Decorator\TelevisionDecorator($mosaic, $this->productResolver);

        // Filters
        $mosaic = new Mosaic\Filter\TelevisionFilter($mosaic, $options);

        $this->storageSet('television', $hash, $mosaic);
        $this->stop($stopwatch, $eventName);

        return $mosaic;
    }

    /**
     * @param string $country
     * @param string $network
     */
    public function getBroadcastMosaic($country, $network = null)
    {
        $hash = http_build_query([
            'country' => $country,
            'network' => null !== $network ? $network : 'null',
        ]);

        $eventName = "MosaicManager::getBroadcastMosaic({$hash})";
        $stopwatch = $this->start($eventName);

        if ($mosaic = $this->storageGet('broadcast', $hash)) {
            $this->stop($stopwatch, $eventName);

            return $mosaic;
        }

        // Network "tnt" is not a real network (in database)
        if ($network === null || $network === 'tnt') {
            $mosaic = $this->getMosaic($country);

            // Filters
            if ($network === 'tnt') {
                $mosaic = new Mosaic\Filter\TntFilter($mosaic);
            }
            $mosaic = new Mosaic\Filter\GeolocFilter($mosaic, $country);
            $mosaic = new Mosaic\Filter\BroadcastFilter($mosaic, $country);
        } else {
            $channels = $this->networkComponent->getChannelsNetwork($network);
            foreach ($channels as &$channel) {
                $this->channelComponent->outputFormatted($channel);
            }
            $mosaic = new Mosaic\BaseMosaic($channels);
            $mosaic = new Mosaic\Decorator\ChannelDecorator($mosaic, $this->channelComponent);
        }

        $this->storageSet('broadcast', $hash, $mosaic);
        $this->stop($stopwatch, $eventName);

        return $mosaic;
    }

    /**
     * @param string $country
     */
    public function getHomepageMosaic($country)
    {
        $set = new ChannelSet();

        // First, TNT channels
        foreach ($this->getBroadcastMosaic($country, 'tnt') as $channel) {
            $set->add($channel);
        }

        // Then, channels streamed by us
        foreach ($this->getTelevisionMosaic($country) as $channel) {
            if ($channel['streaming_source'] === 'internal') {
                $channel['nofollow'] = true;
                $set->add($channel);
            }
        }

        return new Mosaic\BaseMosaic($set->toArray());
    }

    /**
     * @param string $country
     */
    public function getReplayMosaic($country)
    {
        $eventName = "MosaicManager::getReplayMosaic({$country})";
        $stopwatch = $this->start($eventName);

        if ($mosaic = $this->storageGet('replay', $country)) {
            $this->stop($stopwatch, $eventName);

            return $mosaic;
        }

        $mosaic = $this->getMosaic($country);

        // Decorators
        $mosaic = new Mosaic\Decorator\ReplayCountDecorator($mosaic, $this->replayComponent);

        // Filters
        $mosaic = new Mosaic\Filter\GeolocFilter($mosaic, $country);
        $mosaic = new Mosaic\Filter\ReplayFilter($mosaic, $this->replayComponent);

        $this->storageSet('replay', $country, $mosaic);
        $this->stop($stopwatch, $eventName);

        return $mosaic;
    }

    public function getThemeMosaic($country)
    {
        $mosaic = $this->getMosaic($country);

        return new Mosaic\ThemeMosaic($mosaic);
    }

    public function getCategoryMosaic($country)
    {
        $mosaic = $this->getMosaic($country);

        return new Mosaic\CategoryMosaic($mosaic);
    }

    public function getSocialMosaic($country)
    {
        $mosaic = $this->getMosaic($country);

        $mosaic = new Mosaic\Filter\SocialFilter($mosaic, $this->socialChannels);

        return $mosaic;
    }
}
