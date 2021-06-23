<?php

namespace Playmedia\Utils;

class Network
{
    /**
     * Checks if IP is public.
     *
     * @param string $ip [description]
     *
     * @return bool True if public, otherwise false
     */
    public static function isPublicIP($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false;
    }

    /**
     * Checks if IP is ipv4 public address.
     *
     * @param string $ip the IP address
     *
     * @return bool TRUE if ipv4 public address, otherwise FALSE
     */
    public static function isPublicIPv4($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false;
    }

    /**
     * Checks if IF is ipv6 public address.
     *
     * @param string $ip the IP address
     *
     * @return bool TRUE if ipv6 public address, otherwise FALSE
     */
    public static function isPublicIPv6($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false;
    }

    public static function isIPv4($ip, $isPublic = true)
    {
        if ($isPublic) {
            return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false;
        } else {
            return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
        }
    }

    public static function isIPv6($ip, $isPublic = true)
    {
        if ($isPublic) {
            return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false;
        } else {
            return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
        }
    }
}
