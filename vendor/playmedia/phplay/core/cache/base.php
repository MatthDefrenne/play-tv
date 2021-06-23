<?php
/**
 * PHPlay Framework.
 *
 * Base cache system
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
abstract class ppl_cache_base
{
    abstract public function set($key, $value, $ttl = 0, $dir = '', $serialize = true);
    abstract public function get($key, $dir = '', $unserialize = true);
    abstract public function delete($key, $dir = '');

    /**
     * Clear cache base method
     * (can be override by children).
     *
     * @param string $dir cache subdirectory (prefix)
     *
     * @return bool TRUE
     */
    public function clear_cache($dir = '')
    {
        return true;
    }

    /**
     * Mtime base method
     * (can be override by children).
     *
     * @param string $key cache unique key
     * @param string $dir cache subdirectory (prefix)
     *
     * @return bool FALSE
     */
    public function mtime($key, $dir = '')
    {
        return false;
    }

    /**
     * Create cache ID
     * (can be override by children).
     *
     * @param string $key cache unique key
     * @param string $dir cache subdirectory (prefix)
     *
     * @return string cache key
     */
    protected function keypath($key, $dir)
    {
        return md5("{$dir}{$key}");
    }
}
