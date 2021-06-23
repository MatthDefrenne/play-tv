<?php
/**
 * PHPlay Framework.
 *
 * Application Context Storage Object
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.7
 */
final class ppl_context
{
    /**
     * The database object.
     *
     * @var ppl_db
     */
    private $db = null;

    /**
     * The cookie object.
     *
     * @var ppl_cookie
     */
    private $cookie = null;

    /**
     * The sendmail object.
     *
     * @var ppl_sendmail
     */
    private $sendmail = null;

    /**
     * The global object.
     *
     * @var ppl_globals
     */
    private $globals = null;

    /**
     * The configuration object.
     *
     * @var ppl_var
     */
    public $config;

    /**
     * The events manager object.
     *
     * @var ppl_event_dispatcher
     */
    public $events;

    /**
     * The request object.
     *
     * @see phplay::run()
     *
     * @var ppl_request
     */
    public $request;

    /**
     * The response object.
     *
     * @see phplay::run()
     *
     * @var ppl_response
     */
    public $response;

    /**
     * The session object.
     *
     * @see phplay::run()
     *
     * @var ppl_session
     */
    public $session;

    /**
     * The configuration loader object.
     *
     * @var ppl_config_loader
     */
    public $config_loader;

    /**
     * Constructor.
     *
     * @param array  $app_env         application environment
     * @param string $conf_cache_type configuration loader cache type
     */
    public function __construct($app_env, $conf_cache_type = 'file')
    {
        if (!is_array($app_env) || !isset($app_env['path'])) {
            throw new ContextException('Invalid application environment');
        }

        // Put application path environment into configuration storage object
        $this->config = new ppl_var();
        $this->config->set($app_env);

        // Put application configuration into configuration storage object
        $this->config_loader = new ppl_config_loader($this->config, ppl_cache_factory::get_instance($this->config, $conf_cache_type));
        if (($app_config = $this->config_loader->load('application')) === null) {
            throw new ContextException('Failed to load application configuration');
        }
        $this->config->set($app_config);

        // Setup charset encoding
        mb_internal_encoding($this->config->response->default_charset);
        mb_regex_encoding($this->config->response->default_charset);

        // Setup application log system
        ppl_log::set_root($this->config->path->log);
        ppl_log::set_report_level($this->config->application->report_level);

        // Put database configuration into configuration storage object
        $this->config->set(array('db' => $this->config_loader->load('db')));

        // Put memcache configuration into configuration storage object
        $this->config->set(array('memcache' => $this->config_loader->load('memcache')));

        // Put sendmail configuration into configuration storage object
        $this->config->set(array('sendmail' => $this->config_loader->load('sendmail')));

        // Load custom application configuration (custom.conf is optional & has NO VALIDATION)
        $this->config->set(array('custom' => $this->config_loader->load('custom')));

        $this->events = new ppl_event_dispatcher();
    }

    /**
     * Return database object.
     *
     * @return ppl_db database object
     */
    public function get_db()
    {
        if ($this->db === null) {
            $this->db = new ppl_db($this->config);
        }

        return $this->db;
    }

    /**
     * Return cookie object.
     *
     * @return ppl_cookie cookie object
     */
    public function get_cookie()
    {
        if ($this->cookie === null) {
            $this->cookie = new ppl_cookie($this->config);
        }

        return $this->cookie;
    }

    /**
     * Return sendmail object.
     *
     * @return ppl_sendmail sendmail object
     */
    public function get_mail()
    {
        if ($this->sendmail === null) {
            $this->sendmail = new ppl_sendmail($this->config);
        }

        return $this->sendmail;
    }

    /**
     * Return globals object.
     *
     * @return ppl_globals globals object
     */
    public function get_globals()
    {
        if ($this->globals === null) {
            $this->globals = new ppl_globals();
        }

        return $this->globals;
    }

    private function __clone()
    {
    }
}
final class ContextException extends Exception
{
}
