<?php

namespace PlayTv\Core\Mosaic;

use Psr\Log\LoggerInterface;
use Symfony\Component\Stopwatch\Stopwatch;
use Playmedia\Utils\Intl as IntlUtils;
use Playmedia\Component\Channel as ChannelComponent;

class Mosaic implements \IteratorAggregate, MosaicInterface
{
    private $country;
    private $tntSet;
    private $thematicSet;
    private $localSet;
    private $internationalSet;
    private $otherSet;
    private $otherLocalSet;
    private $radioSet;
    private $logger;
    private $count = 0;

    /**
     * @param string          $country
     * @param array           $channels
     * @param LoggerInterface $logger
     */
    public function __construct($country, array $channels = [], LoggerInterface $logger = null)
    {
        $this->country = $country;
        $this->logger = $logger;

        if (!empty($channels)) {
            $this->initialize($channels);
        } else {
            $this->tntSet = new ChannelSet\TntSet();
            $this->thematicSet = new ChannelSet\ThematicSet();
            $this->localSet = new ChannelSet\ThematicSet();
            $this->internationalSet = new ChannelSet\InternationalSet();
            $this->otherSet = new ChannelSet\OtherSet();
            $this->otherLocalSet = new ChannelSet\InternationalSet();
            $this->radioSet = new ChannelSet\RadioSet();
        }
    }

    /**
     * Does the same as addAll, but faster.
     *
     * @param array $channels
     */
    private function initialize($channels)
    {
        $sets = [
            'tnt' => [],
            'thematic' => [],
            'local' => [],
            'international' => [],
            'other_local' => [],
            'other' => [],
            'radio' => [],
        ];

        $stopwatch = new Stopwatch();
        $stopwatch->start('Mosaic::initialize');

        foreach ($channels as $channel) {
            self::addCountryLanguageKeys($channel, $this->country);

            // TNT channels
            if ($this->isTntChannel($channel)) {
                $sets['tnt'][] = $channel;
                continue;
            }

            // Radios
            if ($this->isRadio($channel)) {
                $sets['radio'][] = $channel;
                continue;
            }

            // Thematic channels
            if ($this->isThematicChannel($channel)) {
                $sets['thematic'][] = $channel;
                continue;
            }

            // Local channels
            if ($this->isLocalChannel($channel)) {
                $sets['local'][] = $channel;
                continue;
            }

            // International channels
            if ($this->isInternationalChannel($channel)) {
                $sets['international'][] = $channel;
                continue;
            }

            if ($channel['category_alias'] === 'locale') {
                $sets['other_local'][] = $channel;
                continue;
            }

            $sets['other'][] = $channel;
        }

        $this->count = count($channels);

        $this->tntSet = new ChannelSet\TntSet($sets['tnt']);
        $this->thematicSet = new ChannelSet\ThematicSet($sets['thematic']);
        $this->localSet = new ChannelSet\ThematicSet($sets['local']);
        $this->internationalSet = new ChannelSet\InternationalSet($sets['international']);
        $this->otherSet = new ChannelSet\OtherSet($sets['other']);
        $this->otherLocalSet = new ChannelSet\InternationalSet($sets['other_local']);
        $this->radioSet = new ChannelSet\RadioSet($sets['radio']);

        $event = $stopwatch->stop('Mosaic::initialize');

        if (null !== $this->logger) {
            $this->logger->info(sprintf('Mosaic::initialize duration = %d ms, memory = %d bytes', $event->getDuration(), $event->getMemory()));
        }
    }

    private static function addCountryLanguageKeys(array &$channel, $country)
    {
        // For Euronews, set the channel language to pull up the channel's position.
        if ($channel['alias'] == 'euronews') {
            $channel['language'] = ChannelComponent::getEuronewsLanguage($country, $channel['language']);
        }

        $channel['language_priority'] = self::getLanguagePriority($channel, $country);
        $channel['country_priority'] = self::getCountryPriority($channel, $country);
    }

    public static function getLanguagePriority(array $channel, $country)
    {
        return IntlUtils::isCountryLanguage($country, $channel['language']) ? 0 : 1;
    }

    public static function getCountryPriority(array $channel, $country)
    {
        return $country === $channel['country'] ? 0 : 1;
    }

    /**
     * @param array $channels
     */
    public function addAll(array $channels)
    {
        $stopwatch = new Stopwatch();
        $stopwatch->start('Mosaic::addAll');

        foreach ($channels as $channel) {
            $this->add($channel);
        }

        $event = $stopwatch->stop('Mosaic::addAll');

        if (null !== $this->logger) {
            $this->logger->info(sprintf('Mosaic::addAll duration = %d ms, memory = %d bytes', $event->getDuration(), $event->getMemory()));
        }
    }

    /**
     * @param array $channel
     */
    public function add(array $channel)
    {
        self::addCountryLanguageKeys($channel, $this->country);

        ++$this->count;

        // TNT channels
        if ($channel['category_alias'] === 'tnt' && $channel['country_code'] === $this->country) {
            return $this->tntSet->add($channel);
        }

        // Radios
        if ($channel['category_alias'] === 'radio') {
            return $this->radioSet->add($channel);
        }

        // Thematic channels
        if ($channel['category_alias'] !== 'locale' && IntlUtils::isCountryLanguage($this->country, $channel['language'])) {
            return $this->thematicSet->add($channel);
        }

        // Local channels
        if ($channel['category_alias'] === 'locale' && $channel['country_code'] === $this->country) {
            return $this->localSet->add($channel);
        }

        // International channels
        if ($channel['category_alias'] === 'internationale') {
            return $this->internationalSet->add($channel);
        }

        if ($channel['category_alias'] === 'locale') {
            return $this->otherLocalSet->add($channel);
        }

        return $this->otherSet->add($channel);
    }

    private function isTntChannel(array $channel)
    {
        return $channel['category_alias'] === 'tnt' && $channel['country_code'] === $this->country;
    }

    private function isThematicChannel(array $channel)
    {
        return $channel['category_alias'] !== 'locale' && IntlUtils::isCountryLanguage($this->country, $channel['language']);
    }

    private function isRadio(array $channel)
    {
        return $channel['category_alias'] === 'radio';
    }

    private function isLocalChannel(array $channel)
    {
        return $channel['category_alias'] === 'locale' && $channel['country_code'] === $this->country;
    }

    private function isInternationalChannel(array $channel)
    {
        return $channel['category_alias'] === 'internationale';
    }

    public function toArray()
    {
        // FIXME Compute array once, not everytime toArray is called

        // Do not use array_merge to manage correctly channels with numeric alias (ex: 360, 24)
        return $this->tntSet->toArray()
            + $this->thematicSet->toArray()
            + $this->localSet->toArray()
            + $this->internationalSet->toArray()
            + $this->otherSet->toArray()
            + $this->otherLocalSet->toArray()
            + $this->radioSet->toArray();
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->toArray());
    }

    public function offsetExists($offset)
    {
        $sets = [
            $this->tntSet,
            $this->thematicSet,
            $this->localSet,
            $this->internationalSet,
            $this->otherSet,
            $this->otherLocalSet,
            $this->radioSet,
        ];

        foreach ($sets as $set) {
            if (isset($set[$offset])) {
                return true;
            }
        }

        return false;
    }

    public function offsetGet($offset)
    {
        $sets = [
            $this->tntSet,
            $this->thematicSet,
            $this->localSet,
            $this->internationalSet,
            $this->otherSet,
            $this->otherLocalSet,
            $this->radioSet,
        ];

        foreach ($sets as $set) {
            if (isset($set[$offset])) {
                return $set[$offset];
            }
        }

        return;
    }

    public function offsetSet($offset, $value)
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function offsetUnset($offset)
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function count()
    {
        return $this->count;
    }
}
