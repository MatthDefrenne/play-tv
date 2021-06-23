<?php

namespace PHPlay;

use Symfony\Component\HttpFoundation\Response;

/**
 * Adapter to use a HttpFoundation\Response as a ppl_response object.
 */
class ResponseAdapter extends Response implements ResponseInterface
{
    /**
     * {@inheritdoc}
     */
    public function start()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function set_status($http_code)
    {
        return $this->setStatusCode($http_code);
    }

    /**
     * {@inheritdoc}
     */
    public function get_status()
    {
        return $this->getStatusCode();
    }

    /**
     * {@inheritdoc}
     */
    public function set_content_type($content_type, $charset = '')
    {
        $value = !empty($charset) ? "{$content_type}; charset={$charset}" : $content_type;
        $this->headers->set('Content-Type', $value);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function get_content_type()
    {
        return $this->headers->get('Content-Type');
    }

    /**
     * {@inheritdoc}
     */
    public function set_charset($charset)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function set_header($raw_header)
    {
        list($name, $value) = explode(':', $raw_header);

        $this->headers->set(trim($name), trim($value));

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function write($content)
    {
        $this->setContent($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function redirect($uri, $http_code = 0, $scheme = null)
    {
        $http_code = (0 === $http_code) ? 302 : $http_code;
        $this->setStatusCode($http_code);
        $this->headers->set('Location', $uri);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function end($status = 0, $commit_session = true)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function flush()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function get_buffer_level()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function not_found($request_uri = '')
    {
    }

    /**
     * {@inheritdoc}
     */
    public function unavailable($retry_after = 3600)
    {
    }
}
