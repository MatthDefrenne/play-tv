<?php
/**
 * PHPlay Framework.
 *
 * Configuration loader
 *
 * Set CONFIGURATION_CACHE_TYPE to none in bootstrap for disable it
 *
 * TODO : stop using parse_ini_file() in ::parse() ?
 * TODO : Stop checking cache file modification time if cache type is not "file"
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
final class ppl_config_loader
{
    private $dir = 'config',
        $config,
        $cache;

    /**
     * Constructor.
     *
     * @param ppl_var   $config configuration
     * @param ppl_cache $cache  loader cache storage
     */
    public function __construct(ppl_var $config, $cache)
    {
        $this->config = $config;
        $this->cache = $cache;
    }

    /**
     * Load Configuration from cache or .conf file
     * (File is parsed on cache miss or if cache is out of date).
     *
     * @param string $key       configuration unique key (filename without .conf)
     * @param string $validator alternative validator
     *
     * @return array valid configuration data or NULL on failure
     */
    public function load($key, $validator = null)
    {
        $mt_cache = $this->cache->mtime($key, $this->dir);
        $file = "{$this->config->path->config}{$key}.conf";

        $appEnv = (getenv('APP_ENV')) ?: '';
        $appEnvFile = "{$this->config->path->config}{$appEnv}/{$key}.conf";

        if ($mt_cache !== false && ($mt_cache >= filemtime($file))) {
            return $this->cache->get($key, $this->dir);
        }

        if (is_file($file)) {
            $conf = parse_ini_file($file, true);

            // App env config file check
            if (is_file($appEnvFile)) {
                $appEnvConf = parse_ini_file($appEnvFile, true);
            } else {
                $appEnvConf = array();
            }

            foreach ($conf as $defKey => $defValue) {
                foreach ($defValue as $subKey => $subValue) {
                    if (isset($appEnvConf[$defKey][$subKey])) {
                        $conf[$defKey][$subKey] = $appEnvConf[$defKey][$subKey];
                    }
                }
            }

            $validatedData = $this->parse($key, $conf, $validator);

            $this->cache->set($key, $validatedData, 0, $this->dir);

            return $validatedData;
        }

        return;
    }

    /**
     * Load Configuration from raw string.
     *
     * @param string $key  configuration validator key
     * @param string $data configuration data to load and parse
     *
     * @return array valid configuration data or NULL on failure
     */
    public function load_from_string($key, $data)
    {
        //return $this->parse($key, parse_ini_string($data, true)); // parse_ini_string is (PHP 5 >= 5.3.0)
        return;
    }

    /**
     * Parse and validate a configuration file
     * (Write parsed content in cache if validation successfull).
     *
     * @param string $key       configuration unique key (filename without .conf)
     * @param string $data      configuration data to parse
     * @param string $validator alternative validator
     *
     * @return array valid configuration data or NULL on failure
     */
    private function parse($key, $data, $validator = null)
    {
        if ($data !== false) {
            $this->validate($key, $data, $validator); // throw a ValidatorException on error
            $this->cache->set($key, $data, 0, $this->dir);

            return $data;
        }

        return;
    }

    /**
     * Parse content configuration with associated validator.
     *
     * @param string $key       configuration name (filename without .conf)
     * @param array  $content   configuration content to validate (by reference)
     * @param string $validator alternative validator
     *
     * @throws ValidatorException on error
     */
    private function validate($key, &$content, $validator = null)
    {
        $class = null !== $validator ? "ppl_validator_{$validator}" : "ppl_validator_{$key}";
        $validator = new $class($this->config, $key);
        $validator->parse($content, $this->config);
        if (count($content) === 0) {
            $content = null;
        }
    }

    private function __clone()
    {
    }
}
