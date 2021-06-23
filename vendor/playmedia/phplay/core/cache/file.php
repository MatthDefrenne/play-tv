<?php
/**
 * PHPlay Framework.
 *
 * File cache system
 * (default cache subdirectory is "application")
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_cache_file extends ppl_cache_base
{
    private $config;

    /**
     * Constructor.
     *
     * @param ppl_var configuration
     */
    public function __construct(ppl_var $config)
    {
        $this->config = $config;
    }

    /**
     * Store a value in the cache.
     *
     * @param string $key       cache unique key
     * @param mixed  $value     variable to store (must be serializable)
     * @param int    $ttl       time to live in seconds (never expire if zero)
     * @param string $dir       cache subdirectory (default is cache root)
     * @param bool   $serialize serialize the value if true
     *
     * @return bool TRUE on success, or FALSE on error
     */
    public function set($key, $value, $ttl = 0, $dir = 'application', $serialize = true)
    {
        if (($key === '') || !is_int($ttl)) {
            return false;
        }
        if ($ttl !== 0) {
            $ttl += time();
        }
        if ($serialize === true) {
            $value = serialize($value);
        }
        if (ppl_filesys::write($this->keypath($key, $dir), "$ttl\n$value", true) === false) {
            return false;
        }

        return true;
    }

    /**
     * Retrieve a value in the cache.
     *
     * @param string $key         cache unique key
     * @param string $dir         cache subdirectory (default is cache root)
     * @param bool   $unserialize unserialize returned value if true
     *
     * @return mixed the stored variable, or NULL on failure
     */
    public function get($key, $dir = 'application', $unserialize = true)
    {
        if (is_file($file = $this->keypath($key, $dir))) {
            $content = file_get_contents($file); // file may be deleted or locked just after is_file() returned true
            if ($content !== false) {
                list($expire, $value) = explode("\n", $content, 2);
                $content = null;
                $expire = (int) $expire;
                if (($expire === 0) || ($expire > time())) {
                    if ($unserialize === true) {
                        $value = unserialize($value); // may issue a E_NOTICE if data are corrupt
                    }

                    return $value;
                }
                if (is_writable($file)) {
                    unlink($file); // use @ instead of is_writeable ?
                }
            }
        }

        return;
    }

    /**
     * Delete a value in the cache.
     *
     * @param string $key cache unique key
     * @param string $dir cache subdirectory (default is cache root)
     *
     * @return bool TRUE on success, or FALSE on error
     */
    public function delete($key, $dir = 'application')
    {
        if (is_file($file = $this->keypath($key, $dir))) {
            return unlink($file);
        }

        return false;
    }

    /**
     * Clear a cache directory
     * (delete all sub-dirs and files recursively).
     *
     * @param string $dir cache subdirectory (prefix)
     *
     * @return bool TRUE on success, or FALSE on error
     * @override
     */
    public function clear_cache($dir = 'application')
    {
        return ppl_filesys::rrmdir("{$this->config->path->cache}{$dir}", false);
    }

    /**
     * Retrieve the cache file modification time.
     *
     * @param string $key cache unique key
     * @param string $dir cache subdirectory (default is cache root)
     *
     * @return mixed the time the cache file was modified (Unix timestamp), or FALSE on failure
     * @override
     */
    public function mtime($key, $dir = 'application')
    {
        if (is_file($file = $this->keypath($key, $dir))) {
            return filemtime($file);
        }

        return false;
    }

    /**
     * Convert a key to a cache file path
     * SHA1 is collision safe until 2^(160/2) entries (Div. by 2 is due to birthday paradox).
     *
     * @param string $key cache unique key
     * @param string $dir cache subdirectory (default is cache root)
     *
     * @return string the cache filename
     * @override
     */
    protected function keypath($key, $dir)
    {
        $ds = DIRECTORY_SEPARATOR;
        if ($dir !== '') {
            $dir = "$dir$ds";
        }
        $crc32 = dechex(crc32($key));

        return "{$this->config->path->cache}{$dir}".mb_substr($crc32, 0, 2).$ds.mb_substr($crc32, 2, 2).$ds.mb_substr($crc32, 4).md5($key);
    }

    private function __clone()
    {
    }
}
