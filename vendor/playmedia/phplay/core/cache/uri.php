<?php
/**
 * PHPlay Framework.
 *
 * URI cache system
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
final class ppl_cache_uri
{
    private $config,
        $cache = null,
        $dir = 'uri';

    /**
     * Constructor.
     *
     * @param ppl_var $config configuration
     */
    public function __construct(ppl_var $config)
    {
        $this->config = $config;
        $this->cache = ppl_cache_factory::get_instance($config, $config->route->cache_uri);
    }

    /**
     * Get a previously completed task from URI cache.
     *
     * @param string $uri unique URI
     *
     * @return mixed completed task as an array or NULL on cache miss
     */
    public function get($uri)
    {
        if ($this->cache !== null) {
            if (is_file($f_route = "{$this->config->path->config}route.conf")) {
                if (is_file($f_app = "{$this->config->path->config}application.conf")) {
                    if (($task = $this->cache->get($uri, $this->dir)) !== null) {
                        // TODO: ignore mtime on production mode ?
                        if ((filemtime($f_route) < $task['cached']) && (filemtime($f_app) < $task['cached'])) {
                            return $task;
                        }
                        $this->cache->delete($uri, $this->dir);
                    }
                }
            }
        }

        return;
    }

    /**
     * Store a completed task in the URI cache.
     *
     * @param string $uri  unique URI
     * @param array  $task completed task to store
     *
     * @return bool TRUE on success, or FALSE on error
     */
    public function set($uri, $task)
    {
        if ($this->cache !== null) {
            $task['cached'] = time();

            return $this->cache->set($uri, $task, 0, $this->dir);
        }

        return false;
    }

    private function __clone()
    {
    }
}
