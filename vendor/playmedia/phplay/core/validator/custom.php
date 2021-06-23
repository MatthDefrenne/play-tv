<?php
/**
 * PHPlay Framework.
 *
 * (optional) custom.conf validator
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
final class ppl_validator_custom extends ppl_validator
{
    /**
     * Parse the configuration data.
     *
     * @param array   $content the data (by reference)
     * @param ppl_var $config  configuration
     */
    public function parse(&$content, ppl_var $config)
    {
        return true; // custom.conf has no validation
    }

    private function __clone()
    {
    }
}
