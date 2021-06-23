<?php
/**
 * PHPlay Framework.
 *
 * application.conf validator
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
final class ppl_validator_application extends ppl_validator
{
    /**
     * Parse the configuration data.
     *
     * @param array   $content the data (by reference)
     * @param ppl_var $config  configuration
     */
    public function parse(&$content, ppl_var $config)
    {
        // Allowed sections with defaults parameters
        $this->allowed['request'] = array(
                'real_ip_header' => 'HTTP_PPL_REAL_IP',
        );
        $this->allowed['response'] = array(
                'default_content_type' => 'text/html',
                'default_charset' => 'UTF-8',
                'default_redirect_code' => 302,
                'default_status_code' => 200,
        );
        $this->allowed['route'] = array(
                'cache_uri' => 'file',
                'default_action' => 'index',
                'max_params' => 30,
                'uri_prefix' => null,
        );
        $this->allowed['session'] = array(
                'autostart' => '1',
                'name' => 'PHPSESSID',
                'duration' => 0,
                'path' => '/',
                'cookie_domain' => '',
                'https' => '0',
                'http_only' => '1',
        );
        $this->allowed['cookie'] = array(
                'path' => '/',
                'domain' => '',
                'https' => '0',
                'http_only' => '1',
        );
        $this->allowed['ajax_token'] = array(
                'name' => 'ajxtoken',
                'type' => 'none',
        );
        $this->allowed['view'] = array(
                'engine' => 'smarty',
                'version' => '2.6.26',
                'default_skin' => 'default',
                'plugins_dir' => null,
        );
        $this->validate($content);

        // convert some parameters to specific types
        // TODO : custom ini file reader can avoid this ?

        $response = &$content['response'];
        $response['default_status_code'] = (int) $response['default_status_code'];
        $response['default_redirect_code'] = (int) $response['default_redirect_code'];

        $route = &$content['route'];
        $route['max_params'] = (int) $route['max_params'];
        if (isset($route['uri_prefix'])) {
            $route['uri_prefix'] = $this->parse_uri_prefix($route['uri_prefix']);
        }

        $session = &$content['session'];
        $session['autostart'] = ($session['autostart'] === '0') ? false : true;
        $session['duration'] = (int) $session['duration'];
        $session['https'] = ($session['https'] === '1') ? true : false;
        $session['http_only'] = ($session['http_only'] === '1') ? true : false;
        // TODO: regex validation for $session['name'] value (valid chars are a..z A..Z 0..9 - ,)

        $cookie = &$content['cookie'];
        $cookie['https'] = ($cookie['https'] === '1') ? true : false;
        $cookie['http_only'] = ($cookie['http_only'] === '1') ? true : false;

        $ajax = &$content['ajax_token'];
        if ($ajax['name'] === '') {
            throw new ValidatorException('ajax token name must be a non-empty string');
        }
        if (!in_array($ajax['type'], array('all', 'cookie', 'none', 'var'))) {
            throw new ValidatorException('Invalid ajax token type');
        }

        $view = &$content['view'];
        if (isset($view['plugins_dir'])) {
            // Remove forward slash if exists
            if ($view['plugins_dir'][0] === '/') {
                $view['plugins_dir'] = mb_substr($view['plugins_dir'], 1);
            }
        }

        return true;
    }

    /**
     * Parse uri prefix.
     *
     * @param string $prefix uri prefix
     *
     * @return string parsed uri prefix (starting with / and ending without /)
     */
    private function parse_uri_prefix($prefix)
    {
        if ($prefix === '') {
            throw new ValidatorException("uri_prefix must be a non-empty string. Example: '/path/to'");
        }
        if ($prefix[0] !== '/') {
            $prefix = "/{$prefix}";
        }
        $last_char = mb_strlen($prefix) - 1;
        if ($prefix[$last_char] === '/') {
            $prefix = mb_substr($prefix, 0, -1);
        }

        return $prefix;
    }

    private function __clone()
    {
    }
}
