<?php

namespace PlayTv\Core\Mosaic;

class GroupingMosaic implements \IteratorAggregate, MosaicInterface
{
    protected $mosaics = [];

    /**
     * @param MosaicInterface $mosaic
     * @param callable        $callback A callback that returns the key to group elements
     */
    public function __construct(MosaicInterface $mosaic, $callback)
    {
        $groups = [];
        foreach ($mosaic as $channel) {
            $key = call_user_func_array($callback, [$channel]);
            $groups[$key][] = $channel;
        }

        foreach ($groups as $key => $channels) {
            $this->mosaics[$key] = new BaseMosaic($channels);
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->mosaics[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->mosaics[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if (!$value instanceof MosaicInterface) {
            throw new \BadMethodCallException('$value should implement MosaicInterface');
        }

        $this->mosaics[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->mosaics[$offset]);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->mosaics);
    }

    public function count()
    {
        $count = 0;

        foreach ($this as $mosaic) {
            $count += count($mosaic);
        }

        return $count;
    }

    public function toArray()
    {
        $toArray = [];

        foreach ($this as $key => $mosaic) {
            $toArray[$key] = $mosaic->toArray();
        }

        return $toArray;
    }
}
