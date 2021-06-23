<?php

if (!function_exists('is_playmedia')) {
    /**
     * Allow custom injections to application if private network or
     * Playmedia office IP adress.
     *
     * @return bool
     */
    function is_playmedia()
    {
        $whitelist = array(
            '78.200.61.65',     // Freebox Magenta
            '82.224.201.2',     // Karim home
            '62.23.83.74',      // Antoine AppGratis office
            '94.126.114.164',   // Cellfish office
        );
        $ip = $_SERVER['HTTP_X_REAL_IP'];

        if (\Playmedia\Utils\Network::isPublicIP($ip)) {
            return in_array($ip, $whitelist);
        } // Whitelisted IP
        else {
            return true;
        } // Private network
    }
}
