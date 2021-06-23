<?php

namespace PlayTv\Controller;

use Symfony\Component\HttpKernel\Controller\ControllerResolver as BaseControllerResolver;

class ControllerResolver extends BaseControllerResolver
{
    private $core;

    public function __construct(\ppl_core $core)
    {
        $this->core = $core;
    }

    protected function createController($controller)
    {
        if (false === strpos($controller, '::')) {
            throw new \InvalidArgumentException(sprintf('Unable to find controller "%s".', $controller));
        }

        list($class, $method) = explode('::', $controller, 2);

        if (!class_exists($class)) {
            throw new \InvalidArgumentException(sprintf('Class "%s" does not exist.', $class));
        }

        $task = $this->createTask($class, $method);

        return array(new $class($this->core, $task), $method);
    }

    private function createTask($class, $method)
    {
        return array(
            'type' => 'controller',
            'controller' => str_replace('_controller', '', $class),
            'action' => str_replace('_action', '', $method),
            'params' => array(),
            'class' => $class,
            'method' => $method,
        );
    }
}
