<?php
/**
 * PHPlay Framework.
 *
 * Response class
 *
 * TODO: set_expires($ttl) : navigator cache (check how headers works for browser cache)
 * TODO : use regex for URI validation in redirect() ?
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.3
 */
final class ppl_response
{
    /**
     * The application configuration object.
     *
     * @var ppl_var
     */
    private $config;

    /**
     * The application event dispatcher object.
     *
     * @var ppl_event_dispatcher
     */
    private $events;

    /**
     * The application request object.
     *
     * @var ppl_request
     */
    private $request;

    /**
     * The response status code.
     *
     * @var int
     */
    private $status;

    /**
     * The response content type.
     *
     * @var string
     */
    private $content_type;

    /**
     * The response charset.
     *
     * @var string
     */
    private $charset;

    /**
     * HTTP Status Codes.
     *
     * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
     */
    private $headers = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            );

    /**
     * Constructor.
     *
     * @param ppl_var              $config    configuration
     * @param bool                 $autostart autostart output buffering if true
     * @param ppl_event_dispatcher $events    event dispatcher
     * @param ppl_request          $request   request object
     */
    public function __construct(ppl_var $config, $autostart = true, ppl_event_dispatcher $events = null, ppl_request $request = null)
    {
        if ($autostart === true) {
            $this->start();
        }
        $this->config = $config;
        $this->events = ($events === null) ? new ppl_event_dispatcher() : $events;
        $this->request = ($request === null) ? new ppl_request($config) : $request;
        $this->set_content_type($config->response->default_content_type, $config->response->default_charset);
        $this->set_status($this->config->response->default_status_code);
    }

    /**
     * Start response output buffering.
     */
    public function start()
    {
        ob_start();
    }

    /**
     * Set response status code.
     *
     * @param int $http_code the http status code
     */
    public function set_status($http_code)
    {
        if (!is_int($http_code)) {
            throw new ResponseException('http_code must be an integer');
        }
        $this->status = $http_code;
        $this->send_header($this->status);
    }

    /**
     * Get current response status code.
     *
     * @return int the current http status code
     */
    public function get_status()
    {
        return $this->status;
    }

    /**
     * Set response content type.
     *
     * @param string $content_type the content type mime
     * @param string $charset      the charset
     */
    public function set_content_type($content_type, $charset = '')
    {
        if (!is_string($content_type) || ($content_type === '')) {
            throw new ResponseException('content_type must be a non empty string');
        }
        if (!is_string($charset)) {
            throw new ResponseException('charset must be a string');
        }
        $this->content_type = $content_type;
        if ($charset !== '') {
            $this->charset = $charset;
        }
        header("Content-Type: {$content_type}; charset={$this->charset}");
    }

    /**
     * Get the current response content type.
     *
     * @return string the content type mime
     */
    public function get_content_type()
    {
        return $this->content_type;
    }

    /**
     * Set response charset (use response content type).
     *
     * @param string $charset the charset
     */
    public function set_charset($charset)
    {
        if (!is_string($charset) || ($charset === '')) {
            throw new ResponseException('charset must be a non empty string');
        }
        $this->charset = $charset;
        header("Content-Type: {$this->content_type}; charset={$charset}");
    }

    /**
     * Send a raw HTTP Header.
     *
     * @param string $raw_header raw http header
     */
    public function set_header($raw_header)
    {
        header($raw_header);
    }

    /**
     * Write content in response output buffer.
     *
     * @param string $content the content
     */
    public function write($content)
    {
        echo $content;
    }

    /**
     * Redirect the client to URI and exit application.
     *
     * @param string $uri       internal or external URI
     * @param int    $http_code optional http status code (use default redirect code)
     * @param string $scheme    optional forced URI scheme (Affect only internal URI)
     */
    public function redirect($uri, $http_code = 0, $scheme = null)
    {
        if ($uri === '') {
            throw new ResponseException('URI cannot be empty');
        }
        if (!is_int($http_code)) {
            throw new ResponseException('http_code must be an integer');
        }
        $this->status = ($http_code === 0) ? $this->config->response->default_redirect_code : $http_code;
        if ($uri[0] === '/') {
            if ($scheme === null) {
                // Use HTTPS if behind https proxy, otherwise use request scheme
                $scheme = ($this->request->is_forwarded_https === true) ? 'https' : $this->request->scheme;
            }
            $uri = "{$scheme}://{$_SERVER['HTTP_HOST']}{$uri}"; // Internal URI
        }
        $this->send_header($this->status, $uri);
    }

    /**
     * Send a raw HTTP Header
     * Automatically send Location header if code is 301, 302 or 303.
     *
     * @param int    $code the http code
     * @param string $uri  optional URI
     *
     * @return bool TRUE on success or FALSE on failure (may not return on redirect)
     */
    private function send_header($code, $uri = '')
    {
        if (is_int($code) && isset($this->headers[$code])) {
            if (strpos(php_sapi_name(), 'cgi') > 0) {
                header("Status: {$code} {$this->headers[$code]}");
            } else {
                header("HTTP/1.1 {$code} {$this->headers[$code]}");
            }

            if (($code >= 301) && ($code <= 303) && ($uri !== '')) {
                // Specific rules for SEO
                if (301 == $code) {
                    header('Cache-Control: private, no-cache, no-store, must-revalidate');
                    header('Content-Length: 0');
                    header('Expires: Sat, 01 Jan 2000 00:00:00 GMT');
                    header('Pragma: no-cache');
                }

                // TODO : check if no previous write() ?? --> throw exception ???
                header("Location: {$uri}");
                $this->end();
            }

            return true;
        }

        return false;
    }

    /**
     * Send the response & terminate application.
     *
     * @param int  $status         the exit status
     * @param bool $commit_session
     */
    public function end($status = 0, $commit_session = true)
    {
        ob_end_flush();
        exit($status);
    }

    /**
     * Send the current output buffer content to client.
     */
    public function flush()
    {
        ob_flush();
    }

    /**
     * Clear the current output buffer content.
     */
    public function clear()
    {
        ob_clean();
    }

    /**
     * Return the nesting level of the output buffering mechanism.
     *
     * @return int the nesting level or ZERO if output buffering is not active
     */
    public function get_buffer_level()
    {
        return ob_get_level();
    }

    /**
     * Send impersonal 404 Not Found Error page
     * Exit application without commit user session.
     *
     * @param string $request_uri the requested URI
     */
    public function not_found($request_uri = '')
    {
        $content = "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n";
        $content .= "<html><head>\n";
        $content .= "<title></title>\n";
        $content .= "</head><body>\n";
        $content .= "<h1>Not Found</h1>\n";
        $content .= "<p>The requested URL {$request_uri} was not found on this server.</p>\n";
        $content .= '</body></html>';
        $this->set_status(404);
        $this->write($content);
        $this->end(1, false);
    }

    /**
     * Send impersonal 503 Service Unavailable Error page
     * Exit application without commit user session.
     *
     * @param string $retry_after delay to wait in seconds before retry
     */
    public function unavailable($retry_after = 3600)
    {
        if (!is_int($retry_after)) {
            throw new ResponseException('retry_after must be an integer');
        }
        $content = "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n";
        $content .= "<html><head>\n";
        $content .= "<title></title>\n";
        $content .= "</head><body>\n";
        $content .= "<h1>Service Temporarily Unavailable</h1>\n";
        $content .= "<p>The server is temporarily unable to service your request due to maintenance downtime or capacity problems. Please try again later.</p>\n";
        $content .= '</body></html>';
        $this->set_status(503);
        $this->set_header("Retry-After: {$retry_after}");
        $this->write($content);
        $this->end(1, false);
    }

    private function __clone()
    {
    }
}
final class ResponseException extends Exception
{
}
