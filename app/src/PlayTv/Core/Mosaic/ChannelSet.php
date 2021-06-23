<?php

namespace PlayTv\Core\Mosaic;

/**
 * A collection of channels that contains no duplicate elements.
 * Channels are considered equal if they have the same alias.
 */
class ChannelSet implements \ArrayAccess, \Countable
{
    protected $channels = array();

    public function __construct(array $channels = array())
    {
        foreach ($channels as $channel) {
            $this->channels[$channel['alias']] = $channel;
        }
    }

    public function contains($channel)
    {
        return isset($this->channels[$channel['alias']]);
    }

    /**
     * @param mixed $channel
     *
     * @return bool true if this set did not already contain $channel
     */
    public function add($channel)
    {
        if ($this->contains($channel)) {
            return false;
        }

        $this->channels[(string) $channel['alias']] = $channel;

        return true;
    }

    public function addAll($channels)
    {
        foreach ($channels as $channel) {
            $this->add($channel);
        }

        return $this;
    }

    public function toArray()
    {
        return $this->channels;
    }

    public function count()
    {
        return count($this->channels);
    }

    public function offsetExists($offset)
    {
        return isset($this->channels[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->channels[$offset]) ? $this->channels[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function offsetUnset($offset)
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
