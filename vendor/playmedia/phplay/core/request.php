<?php
/**
 * PHPlay Framework.
 *
 * Simple request class
 *
 * TODO : implement download(url, try=3) which return the content of url with multiple download try on failure (file_get_contents)
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.9
 */
final class ppl_request
{
    /**
     * The application configuration object.
     *
     * @var ppl_var
     */
    private $config;

    /**
     * The uploaded files informations.
     *
     * @var array
     */
    private $files;

    /**
     * The client informations object.
     *
     * @var ppl_request_client
     */
    private $client = null;

    /**
     * Reference on $_GET.
     *
     * @var array
     */
    public $get;

    /**
     * Reference on $_POST.
     *
     * @var array
     */
    public $post;

    /**
     * The Host: header value.
     *
     * @var string
     */
    public $host;

    /**
     * Indicates if the request is AJAX (XMLHttpRequest).
     *
     * @var bool
     */
    public $is_ajax;

    /**
     * Indicates if the client is PHP CLI.
     *
     * @var bool
     */
    public $is_cli;

    /**
     * The request method.
     *
     * @var string
     */
    public $method;

    /**
     * Indicates if the originating protocol was HTTPS
     * (in a reverse proxy scenario).
     *
     * @var bool
     */
    public $is_forwarded_https;

    /**
     * The request URI scheme extracted from request headers.
     * (may differ from ppl_request::$protocol in a reverse proxy scenario).
     *
     * @var string
     */
    public $scheme;

    /**
     * The "real" detected URI scheme used by client.
     * (may differ from ppl_request::$scheme in a reverse proxy scenario).
     *
     * @var string
     */
    public $protocol;

    /**
     * The HTTP referrer.
     *
     * @var string
     */
    public $referer;

    /**
     * The server address.
     *
     * @var string
     */
    public $remote_addr;

    /**
     * The X-Forwarded-For: header value.
     *
     * @var string
     */
    public $x_forwarded_for;

    /**
     * The cleaned request URI, without GET query parameter or route uri prefix.
     * (may differ from $_SERVER['REQUEST_URI'] value).
     *
     * @var string
     */
    public $uri;

    /**
     * The client ip address.
     *
     * @var string
     */
    public $client_ip;

    /**
     * The second level domain name (SLD)
     * (extracted from current host).
     *
     * @var string
     */
    public $current_domain;

    /**
     * The HTTP_USER_AGENT header (sniffing).
     *
     * @var mixed
     */
    public $user_agent;

    /**
     * The HTTP_DNT header (privacy).
     *
     * @var bool
     */
    public $do_not_track;

    /**
     * Constructor (GET and POST as reference on $_GET and $_POST).
     *
     * @param ppl_var $config application configuration
     */
    public function __construct(ppl_var $config)
    {
        $this->config = $config;
        $this->get = &$_GET;
        $this->post = &$_POST;
        $this->host = (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null);
        $this->is_ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
        $this->is_cli = (php_sapi_name() === 'cli');
        $this->is_forwarded_https = $this->is_forwarded_https_request();
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->scheme = $this->get_scheme();
        $this->protocol = ($this->is_forwarded_https) ? 'https' : $this->scheme;
        $this->referer = (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null);
        $this->remote_addr = $_SERVER['REMOTE_ADDR'];
        $this->x_forwarded_for = (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : null;
        $this->uri = $this->get_uri();
        $this->client_ip = $this->get_client_ip();
        $this->current_domain = $this->sld_domain();
        $this->user_agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : null;
        $this->do_not_track = (isset($_SERVER['HTTP_DNT'])) ? true : false;
    }

    /**
     * Get request scheme.
     *
     * @return string The request scheme
     */
    private function get_scheme()
    {
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
            return 'https';
        }
        if (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') {
            return 'https';
        }

        return 'http';
    }

    /**
     * Check if behind reverse proxy using https.
     *
     * @return bool TRUE if proxy https, otherwise FALSE
     */
    private function is_forwarded_https_request()
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
     * Checks if client request is TLS/SSL encrypted (https).
     * (Detection is based on ppl_request::$protocol value).
     *
     * @return bool TRUE if encrypted, otherwise FALSE
     */
    public function is_secure()
    {
        return $this->protocol == 'https';
    }

    /**
     * Return the requested URI.
     *
     * @return string the requested URI
     */
    private function get_uri()
    {
        // Remove GET parameters from request uri
        $uri = $_SERVER['REQUEST_URI'];
        $qmpos = mb_strpos($uri, '?');
        if ($qmpos !== false) {
            $uri = mb_substr($uri, 0, $qmpos);
        }

        // Check for uri prefix to remove
        if (isset($this->config->route->uri_prefix)) {
            if (mb_substr($uri, 0, mb_strlen($this->config->route->uri_prefix)) === $this->config->route->uri_prefix) {
                $uri = preg_replace("#^{$this->config->route->uri_prefix}#", '', $uri, 1);
            }
        }

        // Remove framework front controller
        $uri = strtr($uri, array(
            '/index.php' => '',
            '/index_debug.php' => '',
            '/index_test.php' => '',
        ));

        return $uri;
    }

    /**
     * Get request client ip address.
     *
     * @see application.conf request section for define real ip header
     *
     * @return string ip address
     */
    private function get_client_ip()
    {
        // Checks "trusted" real ip header (defined in application configuration)
        if (isset($_SERVER[$this->config->request->real_ip_header])) {
            return $_SERVER[$this->config->request->real_ip_header];
        }
        // Checks for public ip in HTTP request headers
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if ($this->is_public_ip($ip)) {
                        return $ip;
                    }
                }
            }
        }
        // Failover on remote_addr request header
        return (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : null;
    }

    /**
     * Get client informations object instance.
     *
     * @see ppl_request_client
     *
     * @return ppl_request_client The client information object
     */
    public function get_client()
    {
        if ($this->client === null) {
            $this->client = new ppl_request_client($this->config, $this);
        }

        return $this->client;
    }

    /**
     * Checks if an ip address is public.
     *
     * @param string $ip
     *
     * @return bool TRUE if public, otherwise FALSE
     */
    public function is_public_ip($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false;
    }

    /**
     * Get uploaded file.
     *
     * @param string $input_file_name
     *
     * @return mixed uploaded file as ppl_request_file, otherwise NULL
     */
    public function uploaded_file($input_file_name)
    {
        if (!isset($this->files[$input_file_name])) {
            if (isset($_FILES) && isset($_FILES[$input_file_name])) {
                $this->files[$input_file_name] = new ppl_request_file($this->config, $_FILES[$input_file_name]);
            } else {
                return;
            }
        }

        return $this->files[$input_file_name];
    }

    /**
     * Checks if ipv4 public address.
     *
     * @param string $ip the ipv4 address
     *
     * @return bool TRUE if ipv4 public address, otherwise FALSE
     */
    public function is_public_ipv4($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false;
    }

    /**
     * Checks if ipv6 public address.
     *
     * @param string $ip the ipv6 address
     *
     * @return bool TRUE if ipv6 public address, otherwise FALSE
     */
    public function is_public_ipv6($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false;
    }

    /**
     * Get the second level domain name (SLD) from host
     * (ie. domain.tld).
     *
     * @see http://en.wikipedia.org/wiki/Domain_name
     *
     * If host is 'www.domain.com', this function return 'domain.com'
     * This function only support host with Country code top-level domains
     * (ie. domain.co.uk is not supported because .co.uk is not TLD)
     * @see http://en.wikipedia.org/wiki/Country_code_top-level_domain
     *
     * @param $host The host name (Default if current host)
     *
     * @return string the SLD, otherwise the current host
     */
    public function sld_domain($hostname = null)
    {
        if ($hostname === null) {
            $hostname = $this->host;
        }
        preg_match('#([^.]+\.[^.]+)$#', $hostname, $host);

        return isset($host[1]) ? $host[1] : $hostname;
    }

    /**
     * Build an URI.
     *
     * @param string $controller The controller name
     * @param string $action     The action name (Default is action in application configuration)
     * @param array  $params     Action parameters as an unidimensional array (Associative or not)
     * @param bool   $absolute   If TRUE, build an absolute URI (with detected host & scheme), otherwise build a relative URI (Default is TRUE)
     * @param string $suffix     Optional suffix (with dot)
     * @param string $scheme     Optionnal scheme without '://' (Default is current detected scheme)
     *
     * @return string return an URI on success or NULL on failure
     */
    public function build_uri($controller, $action = '', $params = array(), $absolute = true, $suffix = '', $scheme = '')
    {
        if ($controller === '') {
            return;
        } // Need at least a controller name
        if ($action === '') {
            $action = $this->config->route->default_action;
        } // Set to default action (if empty)
        if (!is_array($params)) {
            $params = array();
        }

        // Start building URI
        $uri = "/{$controller}/";

        // Add absolute URI part (if required)
        if ($absolute === true) {
            $scheme = ($this->is_forwarded_https === true) ? 'https' : $this->scheme;
            $uri = "{$scheme}://{$this->host}{$uri}";
        }

        // Check for request parameters
        $uri_params = '';
        $params = array_values($params);
        if (count($params) > 0) {
            $params = array_map('rawurlencode', $params);
            $uri_params = implode('/', $params);
        }

        // Check for special case where no request parameters and no suffix
        if (($uri_params === '') && ($suffix === '')) {
            if ($action != $this->config->route->default_action) {
                $uri .= $action.'/';
            }

            return $uri;
        }

        // Add action to URI (with ending slash)
        $uri .= "$action/";

        // Add request parameters to URI
        $uri .= $uri_params;

        // Add suffix to URI, otherwise add ending slash
        $uri = ($suffix !== '') ? "{$uri}{$suffix}" : "{$uri}/";

        return $uri;
    }

    private function __clone()
    {
    }
}
