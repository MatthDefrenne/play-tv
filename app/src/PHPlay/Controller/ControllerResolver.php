<?php

namespace PHPlay\Controller;

use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\HttpFoundation\Request;

class ControllerResolver implements ControllerResolverInterface
{
    private $core;

    public function __construct(\ppl_core $core)
    {
        $this->core = $core;
    }

    /**
     * {@inheritdoc}
     */
    public function getController(Request $request)
    {
        if (!$task = $request->attributes->get('_task')) {
            return false;
        }

        $callable = $this->createController($task);

        if (!is_callable($callable)) {
            throw new \InvalidArgumentException(sprintf('Controller for URI "%s" is not callable.', $request->getPathInfo()));
        }

        return $callable;
    }

    /**
     * {@inheritdoc}
     */
    public function getArguments(Request $request, $controller)
    {
        if (!$task = $request->attributes->get('_task')) {
            return array();
        }

        return $task['params'];
    }

    private function createController(array $task)
    {
        $class = $task['class'];
        $method = $task['method'];

        return array(new $class($this->core, $task), $method);
    }
}
