<?php

namespace PlayTv\Core\Mosaic\Filter;

use PlayTv\Core\Mosaic\MosaicInterface;
use Symfony\Component\Stopwatch\Stopwatch;
use Monolog\Registry;

abstract class BaseFilter extends \FilterIterator implements MosaicInterface
{
    private $objectHash;
    private $toArray = [];

    public function __construct(MosaicInterface $iterator)
    {
        if ($iterator instanceof \IteratorAggregate) {
            $iterator = $iterator->getIterator();
        }

        parent::__construct($iterator);
    }

    public function offsetExists($offset)
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function offsetGet($offset)
    {
        throw new \BadMethodCallException('Not implemented');
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
        $count = 0;
        foreach ($this as $channel) {
            ++$count;
        }

        return $count;
    }

    /**
     * Optimized implementation of toArray.
     * Makes sure the array is not computed again if the object hasn't changed.
     *
     * @return array
     */
    public function toArray()
    {
        $eventName = sprintf('%s::toArray', get_class($this));
        $stopwatch = new Stopwatch();
        $stopwatch->start($eventName);

        // Don't compute the array again if the object hasn't changed
        if (null === $this->objectHash || $this->objectHash !== spl_object_hash($this)) {
            $this->objectHash = spl_object_hash($this);
            $this->toArray = array();
            foreach ($this as $channel) {
                $this->toArray[$channel['alias']] = $channel;
            }
        }

        $event = $stopwatch->stop($eventName);

        if (Registry::hasLogger('mosaic')) {
            Registry::getInstance('mosaic')->info(sprintf('%s duration = %d ms, memory = %d bytes', $eventName, $event->getDuration(), $event->getMemory()));
        }

        return $this->toArray;
    }
}
