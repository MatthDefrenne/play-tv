<?php
/**
 * PHPlay Framework.
 *
 * Cache Factory Pattern
 *
 * @static
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_cache_factory
{
    private static $types = array('file', 'memcache', 'memcached', 'none'),
        $instances = array();

    /**
     * Return instantiated cache type object.
     *
     * @static
     *
     * @param ppl_var $config configuration
     * @param string  $type   type of cache
     *
     * @return mixed cache object
     */
    public static function get_instance(ppl_var $config, $type = 'none', $identifier = '')
    {
        if (!in_array($type, self::$types)) {
            throw new CacheException("Invalid cache type '{$type}'");
        }

        // Cache none if debug flag
        if (true == $config->application->debug) {
            return new ppl_cache_none();
        }

        // Existing instance
        $instance = self::check($type, $identifier);
        if (null != $instance) {
            return $instance;
        }

        // Create new instance(s)
        $class = "ppl_cache_{$type}";
        switch ($type) {

            case 'memcache':
            case 'memcached':

                if (null == $config->memcache) {
                    throw new CacheException('No configuration defined in order to use Memcache');
                }

                foreach ($config->memcache as $persistend_id => $parameters) {
                    $instance = new $class($parameters, $persistend_id);
                    self::$instances[$type][$persistend_id] = $instance;
                }
                break;

            case 'file':
                $instance = new $class($config);
                self::$instances[$type] = $instance;
                break;

            default:
                $instance = new $class();
                self::$instances[$type] = $instance;
                break;
        }

        return self::check($type, $identifier);
    }

    /**
     * Check if a cache instance has already been created.
     *
     * @param string $type       Cache type
     * @param string $identifier Cache identifier
     *
     * @return mixed
     */
    protected static function check($type, $identifier = '')
    {
        $instance = null;

        switch ($type) {

            case 'memcache':
            case 'memcached':
                if (empty($identifier)) {
                    throw new CacheException("You must provide an identifier value to use '{$type}' cache");
                }

                if (isset(self::$instances[$type][$identifier])) {
                    return self::$instances[$type][$identifier];
                }
                break;

            case 'file':
            default:
                if (isset(self::$instances[$type])) {
                    return self::$instances[$type];
                }
                break;
        }

        return $instance;
    }
}
final class CacheException extends Exception
{
}
