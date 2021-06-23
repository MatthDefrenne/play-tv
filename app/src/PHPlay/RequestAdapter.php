<?php

namespace PHPlay;

use Symfony\Component\HttpFoundation\Request;

/**
 * Adapter to use a HttpFoundation\Request as a ppl_request object.
 */
class RequestAdapter extends Request implements RequestInterface
{
    private $legacyRequest;

    public $get;
    public $post;
    public $host;
    public $is_ajax;
    public $is_cli;
    public $is_forwarded_https;
    public $scheme;
    public $protocol;
    public $referer;
    public $remote_addr;
    public $x_forwarded_for;
    public $uri;
    public $client_ip;
    public $current_domain;
    public $user_agent;
    public $do_not_track;

    public function __construct(\ppl_request $request)
    {
        $this->legacyRequest = $request;

        $this->get = $request->get;
        $this->post = $request->post;
        $this->host = $request->host;
        $this->is_ajax = $request->is_ajax;
        $this->is_cli = $request->is_cli;
        $this->is_forwarded_https = $request->is_forwarded_https;
        $this->scheme = $request->scheme;
        $this->protocol = $request->protocol;
        $this->referer = $request->referer;
        $this->remote_addr = $request->remote_addr;
        $this->x_forwarded_for = $request->x_forwarded_for;
        $this->uri = $request->uri;
        $this->client_ip = $request->client_ip;
        $this->current_domain = $request->current_domain;
        $this->user_agent = $request->user_agent;
        $this->do_not_track = $request->do_not_track;

        // $method is a protected property of HttpFoundation\Request
        // we can't declare it as a public property

        $this->initialize($request->get, $request->post, array(), $_COOKIE, $_FILES, $_SERVER);
    }

    /**
     * Overrides Symfony\Component\HttpFoundation\Request::isSecure()
     * It bypass trusted proxies and uses "is secure" legacy request.
     */
    public function isSecure()
    {
        return $this->is_secure();
    }

    public function getLegacyRequest()
    {
        return $this->legacyRequest;
    }

    /**
     * Magic getter for properties declared both in ppl_request & HttpFoundation\Request (ex: $method).
     */
    public function __get($name)
    {
        return $this->legacyRequest->{$name};
    }

    /**
     * {@inheritdoc}
     */
    public function is_secure()
    {
        return $this->legacyRequest->is_secure();
    }

    /**
     * {@inheritdoc}
     */
    public function get_client()
    {
        return $this->legacyRequest->get_client();
    }

    /**
     * {@inheritdoc}
     */
    public function is_public_ip($ip)
    {
        return $this->legacyRequest->is_public_ip($ip);
    }

    /**
     * {@inheritdoc}
     */
    public function uploaded_file($input_file_name)
    {
        return $this->legacyRequest->uploaded_file($input_file_name);
    }

    /**
     * {@inheritdoc}
     */
    public function is_public_ipv4($ip)
    {
        return $this->legacyRequest->is_public_ipv4($ip);
    }

    /**
     * {@inheritdoc}
     */
    public function is_public_ipv6($ip)
    {
        return $this->legacyRequest->is_public_ipv6($ip);
    }

    /**
     * {@inheritdoc}
     */
    public function sld_domain($hostname = null)
    {
        return $this->legacyRequest->sld_domain($hostname);
    }

    /**
     * {@inheritdoc}
     */
    public function build_uri($controller, $action = '', $params = array(), $absolute = true, $suffix = '', $scheme = '')
    {
        return $this->legacyRequest->build_uri($controller, $action, $params, $absolute, $suffix, $scheme);
    }
}
