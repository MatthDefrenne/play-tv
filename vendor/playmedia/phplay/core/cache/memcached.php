<?php
/**
 * PHPlay Framework.
 *
 * Memcached.
 *
 * @author David Guyon <d.guyon@playmedia.fr>
 */
final class ppl_cache_memcached extends ppl_cache_base
{
    private $mc;

    /**
     * Constructor.
     *
     * @param ppl_var $config configuration
     * @param string persistend_id persistend_id
     */
    public function __construct(ppl_var $config, $persistend_id)
    {
        // Memcached Detection
        if (!extension_loaded('memcached')) {
            throw new CacheException('Memcached extension is not loaded');
        }

        $this->mc = new \Memcached($persistend_id);

        $this->mc->setOption(\Memcached::OPT_SERIALIZER, \Memcached::SERIALIZER_IGBINARY);
        $this->mc->setOption(\Memcached::OPT_HASH, \Memcached::HASH_MD5);
        $this->mc->setOption(\Memcached::OPT_DISTRIBUTION, \Memcached::DISTRIBUTION_CONSISTENT);

        if (count($this->mc->getServerList()) < 1) {
            $this->mc->addServer($config->host, $config->port);
        }
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
        $id = $this->keypath($key, $dir);

        return $this->mc->set($id, $value, $ttl);
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
        $id = $this->keypath($key, $dir);
        if (($value = $this->mc->get($id)) !== false) {
            return $value;
        } else {
            return;
        }
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
        $id = $this->keypath($key, $dir);

        return $this->mc->delete($id, 0); // using 0 as ttl value, value is deleted right away
    }

    /**
     * Add an item.
     *
     * @see Memcache::add()
     *
     * @param string $key   cache unique key
     * @param mixed  $value variable to store
     * @param int    $ttl   time to live in seconds (never expire if zero)
     * @param string $dir   cache subdirectory (prefix)
     *
     * @return bool TRUE on success, or FALSE on failure
     */
    public function add($key, $value, $ttl = 0, $dir = '')
    {
        $id = $this->keypath($key, $dir);

        return $this->mc->add($id, $value, $ttl);
    }

    /**
     * Increment an item value.
     *
     * @see Memcache::increment()
     *
     * @param string $key   cache unique key
     * @param mixed  $value increment the item by $value
     * @param string $dir   unused
     *
     * @return bool TRUE on success, or FALSE on failure
     */
    public function increment($key, $value = 1, $dir = '')
    {
        $id = $this->keypath($key, $dir);

        return $this->mc->increment($id, $value);
    }

    /**
     * Decrement an item value.
     *
     * @see Memcache::decrement()
     *
     * @param string $key   cache unique key
     * @param mixed  $value decrement the item by $value
     * @param string $dir   unused
     *
     * @return bool TRUE on success, or FALSE on failure
     */
    public function decrement($key, $value = 1, $dir = '')
    {
        $id = $this->keypath($key, $dir);

        return $this->mc->decrement($id, $value);
    }

    /**
     * Create cache ID.
     *
     * @param string $key cache unique key
     * @param string $dir cache subdirectory (prefix)
     *
     * @return string cache key
     */
    protected function keypath($key, $dir)
    {
        return (($dir !== null && $dir !== '') ? "DIR:{$dir}_" : '')."KEY:{$key}";
    }

    /**
     * Get current Memcached object instance.
     *
     * @return \Memcached
     */
    public function getMemcachedObject()
    {
        return $this->mc;
    }
}
