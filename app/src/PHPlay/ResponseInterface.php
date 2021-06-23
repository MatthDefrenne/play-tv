<?php

namespace PHPlay;

/**
 * PHPlay's ppl_response interface.
 */
interface ResponseInterface
{
    /**
     * Start response output buffering.
     */
    public function start();

    /**
     * Set response status code.
     *
     * @param int $http_code the http status code
     */
    public function set_status($http_code);

    /**
     * Get current response status code.
     *
     * @return int the current http status code
     */
    public function get_status();

    /**
     * Set response content type.
     *
     * @param string $content_type the content type mime
     * @param string $charset      the charset
     */
    public function set_content_type($content_type, $charset = '');

    /**
     * Get the current response content type.
     *
     * @return string the content type mime
     */
    public function get_content_type();

    /**
     * Set response charset (use response content type).
     *
     * @param string $charset the charset
     */
    public function set_charset($charset);

    /**
     * Send a raw HTTP Header.
     *
     * @param string $raw_header raw http header
     */
    public function set_header($raw_header);

    /**
     * Write content in response output buffer.
     *
     * @param string $content the content
     */
    public function write($content);

    /**
     * Redirect the client to URI and exit application.
     *
     * @param string $uri       internal or external URI
     * @param int    $http_code optional http status code (use default redirect code)
     * @param string $scheme    optional forced URI scheme (Affect only internal URI)
     */
    public function redirect($uri, $http_code = 0, $scheme = null);

    /**
     * Send the response & terminate application.
     *
     * @param int  $status         the exit status
     * @param bool $commit_session
     */
    public function end($status = 0, $commit_session = true);

    /**
     * Send the current output buffer content to client.
     */
    public function flush();

    /**
     * Clear the current output buffer content.
     */
    public function clear();

    /**
     * Return the nesting level of the output buffering mechanism.
     *
     * @return int the nesting level or ZERO if output buffering is not active
     */
    public function get_buffer_level();

    /**
     * Send impersonal 404 Not Found Error page
     * Exit application without commit user session.
     *
     * @param string $request_uri the requested URI
     */
    public function not_found($request_uri = '');

    /**
     * Send impersonal 503 Service Unavailable Error page
     * Exit application without commit user session.
     *
     * @param string $retry_after delay to wait in seconds before retry
     */
    public function unavailable($retry_after = 3600);
}
