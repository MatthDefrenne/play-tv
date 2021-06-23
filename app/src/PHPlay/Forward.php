<?php

namespace PHPlay;

/**
 * Forward response.
 * Does not extend HttpFoundation\Response to force a KernelEvents::VIEW.
 */
class Forward
{
    private $controller;
    private $action;
    private $params;

    public function __construct($controller, $action, array $params = [])
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
        return $this->params;
    }
}
