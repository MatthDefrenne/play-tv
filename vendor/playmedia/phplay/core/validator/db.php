<?php
/**
 * PHPlay Framework.
 *
 * db.conf validator
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_validator_db extends ppl_validator
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
                'dsn' => null,
                'username' => null,
                'password' => null,
                'timeout' => 2,
                'failover' => null,
        );
        $this->validate($content, false, false); // ignore section name and allow empty configuration file

        // Check each database (data integrity)
        foreach ($content as $identifier => &$conf) {
            if (empty($identifier)) {
                throw new ValidatorException('Expected non-empty string section name in db.conf');
            }
            if (!isset($conf['dsn'])) {
                throw new ValidatorException("Missing parameter 'dsn' in database '{$identifier}'");
            }
            if (isset($conf['username']) && $conf['username'] === '') {
                throw new ValidatorException("Parameter 'username' in database '{$identifier}' must be a non-empty string'");
            }
            if (isset($conf['username']) && !isset($conf['password'])) {
                throw new ValidatorException("Expected parameter 'password' in database '{$identifier}'");
            }
            if (isset($conf['password']) && !isset($conf['username'])) {
                throw new ValidatorException("Expected Parameter 'username' in database '{$identifier}'");
            }
            if (isset($conf['timeout'])) {
                if (!is_numeric($conf['timeout'])) {
                    throw new ValidatorException("Parameter 'timeout' in database '{$identifier}' must be a numeric value in second'");
                }
                $conf['timeout'] = (int) $conf['timeout'];
            }
            if (isset($conf['failover']) && $conf['failover'] === '') {
                throw new ValidatorException("Parameter 'failover' in database '{$identifier}' must be a non-empty string'");
            }
        }

        return true;
    }

    private function __clone()
    {
    }
}
