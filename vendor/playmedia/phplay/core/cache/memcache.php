<?php
/**
 * PHPlay Framework.
 *
 * Memcache cache system
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
final class ppl_cache_memcache extends ppl_cache_base
{
    private $current,
        $mc,
        $conn,
        $host,
        $port;

    /**
     * Constructor.
     *
     * @param ppl_var $config configuration
     * @param string persistend_id persistend_id
     */
    public function __construct(ppl_var $config, $persistend_id)
    {
        // Memcache Detection
        if (!extension_loaded('memcache')) {
            throw new CacheException('Memcache extension is not loaded');
        }

        $this->mc = new \Memcache();
        $this->host = $config->host;
        $this->port = $config->port;
        $this->conn = false;
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
        if ($this->conn === true) {
            $this->mc->close();
        }
    }

    /**
     * Open a Memcache connection.
     *
     * @return bool TRUE on success, or FALSE on error
     */
    private function connect()
    {
        if ($this->conn === false) {
            $this->conn = $this->mc->connect($this->host, $this->port);
            if ($this->conn === false) {
                throw new CacheException("Memcache connect to {$this->host}:{$this->port} failed");
            }
        }

        return $this->conn;
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
        if ($this->connect() === true) {
            $id = $this->keypath($key, $dir);

            return $this->mc->set($id, $value, 0, $ttl); // using 0 as flag value, compression is not used
        }

        return false;
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
        if ($this->connect() === true) {
            $id = $this->keypath($key, $dir);
            if (($value = $this->mc->get($id)) !== false) {
                return $value;
            }
        }

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
        if ($this->connect() === true) {
            $id = $this->keypath($key, $dir);

            return $this->mc->delete($id, 0); // using 0 as ttl value, value is deleted right away
        }

        return false;
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
        if ($this->connect() === true) {
            $id = $this->keypath($key, $dir);

            return $this->mc->add($id, $value, 0, $ttl); // using 0 as flag value, compression is not used
        }

        return false;
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
        if ($this->connect() === true) {
            $id = $this->keypath($key, $dir);

            return $this->mc->increment($id, $value);
        }

        return false;
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
        if ($this->connect() === true) {
            $id = $this->keypath($key, $dir);

            return $this->mc->decrement($id, $value);
        }

        return false;
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

    private function __clone()
    {
    }
}
