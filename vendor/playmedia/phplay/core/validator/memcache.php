<?php
/**
 * PHPlay Framework.
 *
 * memcache.conf validator
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_validator_memcache extends ppl_validator
{
    /**
     * Parse the configuration data.
     *
     * @param array   $content the data (by reference)
     * @param ppl_var $config  configuration
     */
    public function parse(&$content, ppl_var $config)
    {
        $this->allowed[$this->default_section] = array(
                'host' => null,
                'port' => null,
        );
        $this->validate($content, false, false); // ignore section name and allow empty configuration file

        // Check each database (data integrity)
        foreach ($content as $identifier => &$conf) {
            if (empty($identifier)) {
                throw new ValidatorException('Expected non-empty string section name in db.conf');
            }
            if (!isset($conf['host'])) {
                throw new ValidatorException("Missing parameter 'host' in section '{$identifier}'");
            }
            if (!isset($conf['port'])) {
                throw new ValidatorException("Missing parameter 'port' in section '{$identifier}'");
            }
            if ($conf['host'] === '') {
                throw new ValidatorException("'host' parameter in section '{$identifier}' must be a non-empty string");
            }
            if (!is_numeric($conf['port'])) {
                throw new ValidatorException("'port' parameter in section '{$identifier}' must be a numeric value");
            }
            $conf['port'] = (int) $conf['port'];
        }

        return true;
    }

    private function __clone()
    {
    }
}
