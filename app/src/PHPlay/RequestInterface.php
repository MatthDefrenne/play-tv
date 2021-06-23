<?php

namespace PHPlay;

/**
 * PHPlay's ppl_request interface.
 */
interface RequestInterface
{
    /**
     * Checks if client request is TLS/SSL encrypted (https).
     * (Detection is based on ppl_request::$protocol value).
     *
     * @return bool TRUE if encrypted, otherwise FALSE
     */
    public function is_secure();

    /**
     * Get client informations object instance.
     *
     * @see ppl_request_client
     *
     * @return ppl_request_client The client information object
     */
    public function get_client();

    /**
     * Checks if an ip address is public.
     *
     * @param string $ip
     *
     * @return bool TRUE if public, otherwise FALSE
     */
    public function is_public_ip($ip);

    /**
     * Get uploaded file.
     *
     * @param string $input_file_name
     *
     * @return mixed uploaded file as ppl_request_file, otherwise NULL
     */
    public function uploaded_file($input_file_name);

    /**
     * Checks if ipv4 public address.
     *
     * @param string $ip the ipv4 address
     *
     * @return bool TRUE if ipv4 public address, otherwise FALSE
     */
    public function is_public_ipv4($ip);

    /**
     * Checks if ipv6 public address.
     *
     * @param string $ip the ipv6 address
     *
     * @return bool TRUE if ipv6 public address, otherwise FALSE
     */
    public function is_public_ipv6($ip);

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
    public function sld_domain($hostname = null);

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
    public function build_uri($controller, $action = '', $params = array(), $absolute = true, $suffix = '', $scheme = '');
}
