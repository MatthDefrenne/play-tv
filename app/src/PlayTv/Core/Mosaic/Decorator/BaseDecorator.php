<?php

namespace PlayTv\Core\Mosaic\Decorator;

use PlayTv\Core\Mosaic\MosaicInterface;

class BaseDecorator extends \IteratorIterator implements MosaicInterface
{
    public function __construct(MosaicInterface $mosaic)
    {
        parent::__construct($mosaic);
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
        return $this->getInnerIterator()->count();
    }

    public function toArray()
    {
        $channels = [];

        foreach ($this as $channel) {
            $channels[$channel['alias']] = $channel;
        }

        return $channels;
    }
}
