<?php
/**
 * PHPlay Framework.
 *
 * Simple session class
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.9
 */
final class ppl_session
{
    /**
     * The application configuration object.
     *
     * @var ppl_var
     */
    private $config;

    /**
     * The request object.
     *
     * @var ppl_request
     */
    private $request;

    /**
     * Indicate if session is started.
     *
     * @var bool
     */
    private $started = false;

    /**
     * Constructor.
     *
     * @param ppl_var     $config  application configuration
     * @param ppl_request $request the request object
     */
    public function __construct(ppl_var $config, ppl_request $request)
    {
        $this->config = $config;
        $this->request = $request;
        if (session_id() === '') {
            $this->configure_subdomain_cookies();
            session_name($config->session->name);
            session_set_cookie_params($config->session->duration, $config->session->path, $config->session->cookie_domain, $config->session->https, $config->session->http_only);
            if ($this->config->session->autostart === true) {
                $this->started = session_start();
            }
        }
    }

    /**
     * Start the session.
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    private function start()
    {
        if (session_id() === '') {
            $this->started = session_start();
        }

        return $this->started;
    }

    /**
     * Enable subdomains cookies if cookie domain in configuration is '.' (dot)
     * Cookie domain in configuration is replaced by current domain and start with a dot.
     */
    private function configure_subdomain_cookies()
    {
        if ($this->config->session->cookie_domain == '.') {
            $this->config->session->cookie_domain .= $this->request->current_domain;
        }
        if ($this->config->cookie->domain == '.') {
            $this->config->cookie->domain .= $this->request->current_domain;
        }
    }

    /**
     * Retrieve a value from session.
     *
     * @param string $key unique key
     *
     * @return mixed value
     */
    public function get($key)
    {
        if (false === $this->started) {
            $this->start();
        }

        return (isset($_SESSION[$key])) ? $_SESSION[$key] : null;
    }

    /**
     * Store a value into session.
     *
     * @param string $key   unique key
     * @param mixed  $value value to store
     */
    public function set($key, $value)
    {
        if (false === $this->started) {
            $this->start();
        }
        if (isset($_SESSION)) {
            $_SESSION[$key] = $value;
        }
    }

    /**
     * Delete key/value from session.
     *
     * @param string $key unique key
     *
     * @return mixed value associated to key
     */
    public function delete($key)
    {
        $value = $this->get($key);
        unset($_SESSION[$key]);

        return $value;
    }

    private function __clone()
    {
    }

    public function set_flash_message($key, $value)
    {
        return $this->set($key, $value);
    }

    public function get_flash_message($key)
    {
        $value = $this->get($key);
        $this->delete($key);

        return $value;
    }
}
final class SessionException extends Exception
{
}
