<?php
/**
 * PHPlay Framework.
 *
 * Core Application Object
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.6
 */
final class ppl_core
{
    /**
     * The request dispatcher object.
     *
     * @var ppl_request_dispatcher
     */
    private $dispatcher;

    /**
     * The application context object.
     *
     * @var ppl_context
     */
    public $context;

    /**
     * Indicate if new relic module is enabled.
     *
     * @var bool
     */
    private $nr_enabled = false;

    /**
     * Constructor.
     *
     * @param ppl_context $context application context
     */
    public function __construct(ppl_context $context)
    {
        $this->context = $context;
        if (extension_loaded('newrelic')) {
            $this->nr_enabled = true;
        }
    }

    public function set_dispatcher(ppl_abstract_dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;

        return $this;
    }

    /**
     * Start the application.
     *
     * The $route argument is used internally (internal forwarding)
     */
    public function execute($route = null)
    {
        if ($this->dispatcher === null) {
            $this->dispatcher = new ppl_request_dispatcher($this);
        }
        // Forward requested task
        if ($route === null) {
            $this->forward($this->dispatcher->request($this->context->request->uri));
        } else {
            $this->forward($this->dispatcher->route_to_task($route));
        }
        $this->context->response->end(); // End Application
    }

    /**
     * Forward a Task.
     *
     * @param array $task the task
     *
     * @return mixed ?
     */
    private function forward($task)
    {
        if ($task === false) {
            // TODO: use a controller defined in application.conf ?

            // Task not found or invalid --> end application with 404 error
            $this->context->response->not_found($this->context->request->uri);
        }
        if (isset($task['redirect'])) {
            // Task is HTTP Redirect
            $this->context->response->redirect($task['redirect'], $task['http_code'], $this->context->request->scheme);
        }

        if (isset($task['http_code'])) {
            // Set response status code
            $this->context->response->set_status($task['http_code']);
        }

        // Set New Relic transaction name using ONLY controller & action name
        // Parameters are ignored to avoid too many unique transactions
        if ($this->nr_enabled) {
            newrelic_name_transaction("/{$task['controller']}/{$task['action']}");
        }

        // Create and initialize requested controller
        $class = $task['class'];
        $callable = new $class($this, $task);

        // Trigger 'before.action'
        $this->context->events->trigger($this->context->events->create_event("{$task['type']}.before.action"));

        // Execute controller action
        $handle = ppl_callback::call(array($callable, $task['method']), $callable->params);

        // Trigger 'after.action'
        $this->context->events->trigger($this->context->events->create_event("{$task['type']}.after.action"));

        return $handle;
    }

    private function __clone()
    {
    }
}
final class CoreException extends Exception
{
}
