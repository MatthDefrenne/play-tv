<?php

abstract class ppl_abstract_dispatcher
{
    /**
     * The core object.
     *
     * @var ppl_core
     */
    protected $core;

    /**
     * The application context object.
     *
     * @var ppl_context
     */
    protected $context;

    /**
     * Constructor.
     *
     * @param ppl_core $core core object
     */
    public function __construct(ppl_core $core)
    {
        $this->core = $core;
        $this->context = $core->context;
    }

    /**
     * Convert a route to a callable task.
     *
     * @param array $route the route
     *
     * @return mixed a task as an array, or FALSE if task not callable
     */
    public function route_to_task($route)
    {
        if ($route === null) {
            return false;
        }
        if (isset($route['redirect'])) {
            return $route;
        }

        // Set callable infos
        if (!isset($route['type'])) {
            $route['type'] = 'controller';
        }
        $route['class'] = "{$route['controller']}_{$route['type']}";
        $route['method'] = "{$route['action']}_action";

        // Check task
        if ($this->check_task($route) === false) {
            return false;
        }

        return $route;
    }

    /**
     * Check task validity (is callable).
     *
     * @param array $task the task
     *
     * @return bool TRUE if valid, otherwise FALSE
     */
    public function check_task($task)
    {
        if (($task !== null)) {
            if (isset($task['redirect'])) {
                return true;
            }
            // Check if class->method(params) is callable
            if (ppl_callback::is_callable(array($task['class'], $task['method']), $task['params'], false) === true) {
                // Check "parent-child" relationship
                $parents = class_parents($task['class'], false);
                if (!isset($parents['ppl_controller'])) {
                    throw new DispatcherException("Controller '{$task['class']}' must be a children of ppl_controller class");
                }

                return true;
            }
        }

        return false;
    }

    /**
     * Request a task.
     *
     * @param string $request_uri the requested URI
     *
     * @return mixed a task as an array, or FALSE if no task found
     */
    abstract public function request($request_uri = null);
}
final class DispatcherException extends Exception
{
}
