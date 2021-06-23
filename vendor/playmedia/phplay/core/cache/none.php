<?php
/**
 * PHPlay Framework.
 *
 * Fake cache system (none)
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_cache_none extends ppl_cache_base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    /**
     * Store a value in the cache.
     *
     * @param string $key       cache unique key
     * @param mixed  $value     variable to store
     * @param int    $ttl       time to live in seconds (never expire if zero)
     * @param string $dir       cache subdirectory (prefix)
     * @param bool   $serialize unused
     *
     * @return bool TRUE on success, or FALSE on error
     */
    public function set($key, $value, $ttl = 0, $dir = '', $serialize = true)
    {
        return true;
    }

    /**
     * Retrieve a value in the cache.
     *
     * @param string $key         cache unique key
     * @param string $dir         cache subdirectory (prefix)
     * @param bool   $unserialize unused
     *
     * @return mixed the stored variable, or NULL on failure
     */
    public function get($key, $dir = '', $unserialize = true)
    {
        return;
    }

    /**
     * Delete a value in the cache.
     *
     * @param string $key cache unique key
     * @param string $dir cache subdirectory (prefix)
     *
     * @return bool TRUE on success, or FALSE on error
     */
    public function delete($key, $dir = '')
    {
        return true;
    }

    private function __clone()
    {
    }
}
