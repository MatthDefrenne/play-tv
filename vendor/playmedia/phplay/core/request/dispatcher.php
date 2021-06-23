<?php
/**
 * PHPlay Framework.
 *
 * Request dispatcher
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.4
 */
final class ppl_request_dispatcher extends ppl_abstract_dispatcher
{
    /**
     * The cache uri object.
     *
     * @var ppl_cache_uri
     */
    private $cache_uri;

    /**
     * The request uri.
     *
     * @var string
     */
    private $request_uri;

    /**
     * The current task.
     *
     * @var array
     */
    private $task;

    /**
     * The "after action" event handler.
     *
     * @var int
     */
    private $task_evt;

    /**
     * Request a task.
     *
     * @param string $request_uri the requested URI
     *
     * @return mixed a task as an array, or FALSE if no task found
     */
    public function request($request_uri = null)
    {
        if (!is_string($request_uri) || ($request_uri === '')) {
            throw new DispatcherException('Request URI must be a non-empty string');
        }
        $this->request_uri = $request_uri;
        $this->cache_uri = new ppl_cache_uri($this->context->config);
        $this->task = $this->cache_uri->get($this->request_uri);
        //if (($this->task !== NULL) && ($this->check_task($this->task) === true))
        if ($this->task !== null) {
            return $this->task;
        }

        $route_filename = isset($this->context->config->route_filename) ? $this->context->config->route_filename : 'route';
        $router = new ppl_router($this->context->config, $this->context->config_loader->load($route_filename, 'route'));
        $router->set_request_uri($this->request_uri);
        while (($route = $router->request()) !== false) {
            $this->task = $this->route_to_task($route);
            if ($this->task !== false) {
                $this->context->events->unbind($this->task_evt);
                $this->task_evt = $this->context->events->bind('controller.after.action', array($this, 'save_to_cache'));

                return $this->task;
            }
        }

        return false;
    }

    /**
     * Save completed task to URI cache
     * (Bind to 'controler.after.action' event).
     *
     * @param ppl_event $event the event
     */
    public function save_to_cache($event)
    {
        // Store in cache URI only if no error response code
        if ($this->context->response->get_status() < 400) {
            $this->cache_uri->set($this->request_uri, $this->task);
        }
    }

    private function __clone()
    {
    }
}
