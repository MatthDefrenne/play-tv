<?php

namespace Playmedia\Caching;

/**
 * No Cache.
 */
class NullCache
{
    public function get($key)
    {
        return false;
    }

    public function set($key, $value, $expiration = 0)
    {
        return false;
    }

    public function getMulti($keys)
    {
        return false;
    }
}
