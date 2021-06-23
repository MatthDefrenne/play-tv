<?php

use Symfony\Component\HttpFoundation\Request;

/**
 * Contains application utils & detection functions.
 *
 * Please note that bad code design is due to backward compatibility with original ppl_app_controller.
 *
 * @author PLAYMEDIA
 */
class app_component extends ppl_component
{
    /**
     * The application hosts root URIs.
     *
     * @var array
     */
    private $hosts;

    /**
     * The analytics configuration parameters
     * (Page tracking).
     *
     * @var array
     */
    private $analytics = array(
        'tracking_on_load' => true,
        'ga' => 'UA-20364866-1',
    );

    /**
     * The ad site skin exception list
     * (matches does not display ad site skin).
     *
     * @var array
     */
    private $ad_skin_exception_controllers = array(
        'television' => true,
        'replay_tv' => 'replay',
        'user' => true,
        'login' => true,
        'signup' => true,
    );

    /**
     * The inflow popin exception list
     * (matches does not display inflow popin).
     *
     * @var array
     */
    private $inflow_popin_exception_controllers = array(
        'television' => true,
        'replay_tv' => 'replay',
        'oauth' => true,
        'account' => true,
        'pages' => true,
        'inflow' => true,
        'adblock' => true,
        'assets' => true,
        'errors' => true,
    );

    /**
     * Indicates if adverts are displayed.
     *
     * @var bool
     */
    private $display_ads;

    /**
     * Indicates if advert skin is displayed.
     *
     * @var bool
     */
    private $display_ad_skin;

    /**
     * Indicates if Inflow Popin advert is displayed.
     *
     * @var bool
     */
    private $display_inflow_popin;

    /**
     * Indicates if adblock module must be loaded.
     *
     * @var bool
     */
    private $load_adblock;

    /**
     * Constructor.
     */
    public function construct($check_suspicious_user_agent = true, $setup_hosts = true, $setup_globals = true, $setup_ads = true)
    {
        if ($check_suspicious_user_agent) {
            $this->check_suspicious_user_agent();
        }
        if ($setup_hosts) {
            $this->setup_hosts();
        }
        if ($setup_globals) {
            $this->setup_globals();
        }
        if ($setup_ads) {
            $this->setup_ads();
        }
    }

    /**
     * Log suspicious clients (if no user agent header)
     * (ppl_app_controller backward compatibility).
     */
    private function check_suspicious_user_agent()
    {
        if (null === $this->request->user_agent) {
            $this->log('ua_tracker', "unknown user agent for ip {$this->request->client_ip} on URI : {$_SERVER['REQUEST_URI']}");
        }
    }

    /**
     * Setup application hosts default values
     * (ppl_app_controller backward compatibility).
     */
    private function setup_hosts()
    {
        $this->hosts['current'] = '//'.$this->request->host;
        $this->hosts['root'] = $this->get_root_uri();

        $this->hosts['blog'] = $this->get_root_uri('blog');
        $this->hosts['ad'] = $this->config->custom->adserver->url;

        $this->hosts['partners'] = $this->get_root_uri('partners');
        $this->hosts['darty'] = $this->get_root_uri('darty');
        $this->hosts['wibox'] = $this->get_root_uri('wibox');

        // A simple hack to set current scheme to avoid to
        // change all '*_full' variable in application code.
        $currentScheme = $this->isHttps() ? 'https' : 'http';

        foreach ($this->hosts as $host => $schemelessHost) {
            $fullHostKey = sprintf('%s_full', $host);
            // $fullHostValue = sprintf('%s:%s', 'http', $schemelessHost);
            $fullHostValue = sprintf('%s:%s', $currentScheme, $schemelessHost);

            $this->hosts[$fullHostKey] = $fullHostValue;

            $fullSecureHostKey = sprintf('%s_full_secure', $host);
            $fullSecureHostValue = sprintf('%s:%s', 'https', $schemelessHost);

            $this->hosts[$fullSecureHostKey] = $fullSecureHostValue;

            unset($fullHostKey, $fullHostValue);
        }
    }

    /**
     * Check if behind reverse proxy using https.
     * Source: PHPlay ppl_request::is_forwarded_https_request()
     *
     * @return bool TRUE if proxy https, otherwise FALSE
     */
    private function isHttps()
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && ($_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) {
            // X-Forwarded-Proto "https"
            return true;
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTOCOL']) && ($_SERVER['HTTP_X_FORWARDED_PROTOCOL'] === 'https')) {
            // X-Forwarded-Protocol "https"
            return true;
        } elseif (isset($_SERVER['HTTP_FRONT_END_HTTPS']) && $_SERVER['HTTP_FRONT_END_HTTPS'] == 'on') {
            // Microsoft IIS convention
            return true;
        }

        return false;
    }

    /**
     * Setup $this->globals default values
     * (ppl_app_controller backward compatibility).
     */
    private function setup_globals()
    {
        // Performs some date calculations
        $datetime = new \DateTime('NOW', new \DateTimeZone('Europe/Paris')); // Server time
        $offset = 0;

        $timezonesByHost = (array) $this->config->custom->i18n->host_timezone;
        if (isset($timezonesByHost[$this->request->getHost()])) {
            $timezone = $timezonesByHost[$this->request->getHost()];
            if ($timezone !== date_default_timezone_get()) {
                $websiteDatetime = new \DateTime('NOW', new \DateTimeZone($timezone));
                $offset = $websiteDatetime->getOffset() - $datetime->getOffset();
                $datetime = $websiteDatetime;
            }
        }

        $now = $datetime->getTimestamp() + $offset;
        $tools = $this->load('tools');
        $max = $tools->to_day_end($now + 604800); // 7 days
        $today = $tools->to_day_start($now);

        // Set country code to 'FR' for private ip address, otherwise do detection
        $country = (null !== $this->request->get_client()->get_country_code()) ? $this->request->get_client()->get_country_code() : 'FR';

        $this->globals->set('date.datetime', $datetime);
        $this->globals->set('date.timezone', $datetime->getTimezone());
        $this->globals->set('date.now', $now);
        $this->globals->set('date.max', $max);
        $this->globals->set('date.today', $today);
        $this->globals->set('date.now.sql', $tools->to_mysql($now));
        $this->globals->set('date.max.sql', $tools->to_mysql($max));
        $this->globals->set('date.today.sql', $tools->to_mysql($today));
        $this->globals->set('user.country', $country);
        $this->globals->set('hosts', $this->hosts);
    }

    /**
     * Setup Adverts displaying flags
     * (ppl_app_controller backward compatibility).
     */
    private function setup_ads()
    {
        // Default is to display ads
        $this->display_ads = true;

        // Checks if ad site skin must be displayed
        $this->display_ad_skin = ($this->match_current_controller($this->ad_skin_exception_controllers)) ? false : $this->display_ads;

        // Checks if inflow popin must be displayed
        // $this->display_inflow_popin = ($this->match_current_controller($this->inflow_popin_exception_controllers)) ? false : $this->display_ads;
        $this->display_inflow_popin = false;
    }

    /**
     * Helper function which check if current
     * controller/action match an element of controller/action lists.
     *
     * controllers associative array format is :
     *
     *     array(
     *         'controller_name' => true,                // match any action
     *         'controller_name' => 'action_name',       // match controller & action
     *         'controller_name' => array(               // match controller & action list
     *             'action_name',
     *             'action_name',
     *             ...
     *         )
     *     )
     *
     * @param array $controllers The controller/action list
     *
     * @return bool TRUE if match, otherwise FALSE
     */
    public function match_current_controller($controllers)
    {
        if (!is_array($controllers)) {
            return false;
        }
        foreach ($controllers as $controller => $action) {
            if ($this->_name() === $controller) {
                if (is_string($action)) {
                    // Checks action name
                    if ($this->_action() === $action) {
                        return true;
                    }
                } elseif (is_array($action)) {
                    // Checks action name list
                    foreach ($action as $name) {
                        if ($this->_action() === $name) {
                            return true;
                        }
                    }
                } else {
                    // Match any action
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Helper function which build root uri
     * for a specific subdomain, using current domain.
     *
     * @param string $subdomain The subdomain name (Default is none)
     * @param string $domain    The domain name (Default is current)
     *
     * @return string The uri
     */
    public function get_root_uri($subdomain = null, $domain = null)
    {
        $domain = ($domain = null) ? $this->request->current_domain : $domain;
        $subdomain = ($subdomain === null) ? '' : "{$subdomain}.";

        return "//{$subdomain}{$this->request->current_domain}";
    }

    /**
     * Get application host(s).
     *
     * @param string $name optional host name
     *
     * @return mixed the hosts as array, otherwise the named host as string, otherwise NULL on error
     */
    public function get_hosts($name = null)
    {
        if ($name === null) {
            return $this->hosts;
        }

        return (is_string($name) && isset($this->hosts[$name])) ? $this->hosts[$name] : null;
    }

    /**
     * Get analytics parameters (page tracking).
     *
     * @param string $name optional parameter name
     *
     * @return mixed analytics parameters as array, otherwise the named parameter, otherwise NULL on error
     */
    public function get_analytics($name = null)
    {
        if ($name === null) {
            return $this->analytics;
        }

        return (is_string($name) && isset($this->analytics[$name])) ? $this->analytics[$name] : null;
    }

    /**
     * Indicates if adverts are visible.
     *
     * @return bool TRUE if adverts are visible, otherwise FALSE
     */
    public function adverts_are_visible()
    {
        return $this->display_ads;
    }

    /**
     * Indicates if advert skin is visible.
     *
     * @return bool TRUE if ad skin is visible, otherwise FALSE
     */
    public function ad_skin_is_visible()
    {
        return $this->display_ad_skin;
    }

    /**
     * Indicates if Inflow Popin advert is visible.
     *
     * @return bool TRUE if is visible, otherwise FALSE
     */
    public function inflow_popin_is_visible()
    {
        return $this->display_inflow_popin;
    }

    /**
     * Build an url.
     *
     * @param string $scheme The request uri scheme
     * @param string $host   The request host
     * @param string $uri    The uri path (Default is '/')
     */
    public function build_url($scheme, $host, $uri = '/')
    {
        return "{$scheme}://{$host}{$uri}";
    }
}
