<?php
/**
 * PHPlay Framework.
 *
 * Cookie management class
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_cookie
{
    private $config;

    /**
     * Constructor.
     *
     * @param ppl_var $config application configuration
     */
    public function __construct(ppl_var $config)
    {
        $this->config = $config;
    }

    /**
     * Retrieve a cookie value.
     *
     * @param string $name cookie name
     *
     * @return string cookie value
     */
    public function get($name)
    {
        return (isset($_COOKIE[$name])) ? $_COOKIE[$name] : null;
    }

    /**
     * Send a cookie value to client.
     *
     * @param string $name     cookie name
     * @param string $value    cookie value
     * @param int    $expire   the time the cookie expires (unix timestamp)
     * @param string $path     the path on the server in which the cookie will be available on
     * @param string $domain   the domain that the cookie is available to
     * @param bool   $secure   indicates that the cookie should only be transmitted over a secure HTTPS connection from the client
     * @param bool   $httponly if TRUE the cookie will be made accessible only through the HTTP protocol
     *
     * @return bool TRUE on success, otherwise FALSE on failure (or if output exists prior to calling this function)
     */
    public function set($name, $value, $expire = 0, $path = null, $domain = null, $secure = null, $httponly = null)
    {
        if (!is_string($name) || ($name === '')) {
            return false;
        }
        if (!is_numeric($expire)) {
            return false;
        }
        $path = ($path === null) ? $this->config->cookie->path : $path;
        $domain = ($domain === null) ? $this->config->cookie->domain : $domain;
        $secure = ($secure === null) ? $this->config->cookie->https : $secure;
        $httponly = ($httponly === null) ? $this->config->cookie->http_only : $httponly;

        return setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    }

    /**
     * Delete a cookie (immediate expiration time).
     *
     * @param string $name   cookie name
     * @param string $path   the path on the server in which the cookie will be available on
     * @param string $domain the domain that the cookie is available to
     *
     * @return string cookie value
     */
    public function delete($name, $path = null, $domain = null)
    {
        $value = $this->get($name);
        $this->set($name, '', time() - 3600, $path, $domain, true);

        return $value;
    }

    private function __clone()
    {
    }
}
