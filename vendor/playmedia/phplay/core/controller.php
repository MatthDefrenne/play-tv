<?php
/**
 * PHPlay Framework.
 *
 * Controller base class
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.8
 */
abstract class ppl_controller
{
    /**
     * The application core object.
     *
     * @var ppl_core
     */
    private $core;

    /**
     * The controller type.
     *
     * @var string
     */
    private $type;

    /**
     * The application context object.
     *
     * @var ppl_context
     */
    private $context;

    /**
     * The view object.
     *
     * @var ppl_view_base
     */
    private $view;

    /**
     * The before action event handler.
     *
     * @var int
     */
    private $_ba;

    /**
     * The after action event handler.
     *
     * @var int
     */
    private $_aa;

    /**
     * The before render event handler.
     *
     * @var int
     */
    private $_br;

    /**
     * The after render event handler.
     *
     * @var int
     */
    private $_ar;

    /**
     * The controller name.
     *
     * @var string
     */
    protected $name;

    /**
     * The controller action name.
     *
     * @var string
     */
    protected $action;

    /**
     * The application configuration object.
     *
     * @var ppl_var
     */
    protected $config;

    /**
     * The application event object.
     *
     * @var ppl_event
     */
    protected $events;

    /**
     * The request object.
     *
     * @var ppl_request
     */
    protected $request;

    /**
     * The application session object.
     *
     * @var ppl_session
     */
    protected $session;

    /**
     * The application response object.
     *
     * @var ppl_response
     */
    protected $response;

    /**
     * The controller action parameters.
     *
     * @var array
     */
    public $params;

    abstract public function before_action();
    abstract public function after_action();
    abstract public function before_render();
    abstract public function after_render();

    /**
     * Constructor.
     *
     * @param ppl_core $core The application core object
     * @param array    $task The core forwarded task
     */
    final public function __construct(ppl_core $core, $task)
    {
        // Setup environment
        $this->core = $core;
        $this->context = $core->context;
        $this->config = $core->context->config;
        $this->events = $core->context->events;
        $this->request = $core->context->request;
        $this->session = $core->context->session;
        $this->response = $core->context->response;

        // Setup controller
        $this->name = $task['controller'];
        $this->action = $task['action'];
        $this->type = $task['type'];
        $this->params = $task['params'];

        // Setup event listeners
        $this->_ba = $this->context->events->bind("{$this->type}.before.action", array($this, 'before_action'), 1);
        $this->_aa = $this->context->events->bind("{$this->type}.after.action", array($this, 'after_action'), 1);
        $this->_br = $this->context->events->bind("{$this->type}.before.render", array($this, 'before_render'), 1);
        $this->_ar = $this->context->events->bind("{$this->type}.after.render", array($this, 'after_render'), 1);

        // initialize callback
        $this->initialize();
    }

    /**
     * Allow overwrites and new class definitions
     * Avoid doing so into 'before_action'.
     */
    public function initialize()
    {
    }

    /**
     * Append a message in log file associated to identifier.
     *
     * @param string $identifier unique identifier (sub-directory in log root directory)
     * @param string $message    message to append to log file
     *
     * @return mixed returns the number of bytes written, or false on error
     */
    final public function log($identifier, $message)
    {
        return ppl_log::write($identifier, $message);
    }

    /**
     * Get logger helper object.
     *
     * @param string $identifier  unique identifier (sub-directory in log root directory)
     * @param bool   $force_debug set to TRUE to enable DEBUG message in production mode
     */
    final public function get_logger($identifier, $force_debug = false)
    {
        return ppl_log::get_logger($identifier, $force_debug);
    }

    /**
     * Get a cache instance object.
     *
     * @param string $type type of cache
     *
     * @return mixed cache object
     */
    final public function cache($type = 'file')
    {
        return ppl_cache_factory::get_instance($this->config, $type);
    }

    /**
     * Load a component.
     * This function is variadic, rest of arguments are passed in component constructor.
     *
     * @param string $component The component name
     *
     * @return mixed The component instance object
     */
    final public function load($component)
    {
        $component = "{$component}_component";
        $parents = class_parents($component, true);
        if (!isset($parents['ppl_component'])) {
            throw new ControllerException("Component '{$component}' must be a children of ppl_component class");
        }

        // Create component instance object
        $component = new $component($this, $this->context);

        // Checks if construct() exists
        if (method_exists($component, 'construct')) {
            // Setup constructor parameters
            $args = func_get_args();
            unset($args[0]);

            // Execute component constructor (may throws CallbackException)
            ppl_callback::call(array($component, 'construct'), $args);
        }

        return $component;
    }

    /**
     * Forward
     * (this function is DEPRECATED & exists only for backward compatibility).
     *
     * @see ppl_controller::execute_controller()
     *
     * @param string $controller controller name
     * @param string $action     action name
     * @param array  $params     action parameters
     * @param int    $http_code  http response code
     *
     * @return mixed the controller action result
     */
    public function forward($controller, $action = null, $params = null, $http_code = null)
    {
        return $this->execute_controller($controller, $action, $params, $http_code);
    }

    /**
     * Execute a controller action.
     *
     * @param string $controller controller name
     * @param string $action     action name
     * @param array  $params     action parameters
     * @param int    $http_code  http response code
     *
     * @return mixed the controller action result
     */
    final public function execute_controller($controller, $action = null, $params = null, $http_code = null)
    {
        // Check type
        if ($this->type !== 'controller') {
            throw new ControllerException('execute_controller() method is only available in controllers');
        }

        // Check controller name (TODO : regex ?)
        if (!is_string($controller) || ($controller === '')) {
            throw new ControllerException('Bad controller name');
        }

        // Get default action if unset
        $action = ($action !== null && is_string($action) && ($action !== '')) ? $action : $this->context->config->route->default_action;

        // Get current response http code (if unset)
        $http_code = (($http_code !== null) && is_int($http_code)) ? $http_code : $this->context->response->get_status();

        // Replace all dashes to underscores
        $controller = strtr($controller, '-', '_');
        $action = strtr($action, '-', '_');

        // set empty params if unset
        $params = (($params !== null) && is_array($params)) ? $params : array();

        $route = array(
                'action' => $action,
                'controller' => $controller,
                'http_code' => $http_code,
                'params' => $params,
                'redirect' => null,
                'route' => "forwarded_from_{$this->name}_controller",
                );

        // Unbind events
        $this->context->events->unbind($this->_ba);
        $this->context->events->unbind($this->_aa);
        $this->context->events->unbind($this->_br);
        $this->context->events->unbind($this->_ar);

        return $this->core->execute($route);
    }

    /**
     * Property getter overloader
     * Used for lazy loading and read only public property.
     *
     * @param string $name property name
     *
     * @return mixed property value
     */
    final public function __get($name)
    {
        switch ($name) {
            case 'cookie':
            case 'db':
            case 'mail':
            case 'globals':
                $name = "get_{$name}";

                return $this->context->$name();

            case 'view':
                if (!isset($this->view)) {
                    $this->view = ppl_view_factory::get_instance($this->context, $this->config->view->engine);
                    $this->view->__init($this->name, $this->action, $this->type, $this->core);
                }

                return $this->view;
        }
    }

    /**
     * Property setter overloader
     * Used for read only public property.
     *
     * @param string $name  property name
     * @param string $value property value
     *
     * @return mixed property value
     */
    final public function __set($name, $value)
    {
        switch ($name) {
            case 'cookie':
            case 'db':
            case 'mail':
            case 'globals':
            case 'view':
                throw new ControllerException("Controller property '{$name}' is read only");
        }
    }

    /**
     * Get the current controller type.
     *
     * @return string The type
     */
    final public function _type()
    {
        return $this->type;
    }

    /**
     * Get the current controller name.
     *
     * @return string The name
     */
    final public function _name()
    {
        return $this->name;
    }

    /**
     * Get the current controller action name.
     *
     * @return string The action name
     */
    final public function _action()
    {
        return $this->action;
    }

    private function __clone()
    {
    }
}
final class ControllerException extends Exception
{
}
