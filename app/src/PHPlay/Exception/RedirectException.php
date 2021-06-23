<?php

namespace PHPlay\Exception;

use Symfony\Component\HttpFoundation\Response;

class RedirectException extends \RuntimeException
{
    private $response;

    public function __construct(Response $response)
    {
        parent::__construct();
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
