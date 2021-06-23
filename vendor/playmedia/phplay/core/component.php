<?php
/**
 * PHPlay Framework.
 *
 * Component base class
 *
 * TODO: Add in documentation about application context not available in component constructor
 * TODO: Add a new constructor() method to implments in all component which populate application context, etc...
 * TODO: Add __construct() as final to avoid implements in components
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.5
 */
abstract class ppl_component
{
    /**
     * The application context object.
     *
     * @var ppl_context
     */
    private $context;

    /**
     * The parent controller object instance.
     *
     * @var ppl_controller
     */
    private $parent;

    /**
     * The database object.
     *
     * @var ppl_db
     */
    private $db = null;

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
     * Class constructor.
     * Children must implements construct() instead of __construct().
     *
     * @param mixed       $parent  The parent object (ppl_controller or ppl_component)
     * @param ppl_context $context The application context object
     */
    final public function __construct($parent, $context)
    {
        // TODO : $context can't be defined as ppl_context (PLAYTV backward compatibility)
        $this->parent = $parent;
        $this->context = $context;
        $this->config = $context->config;
        $this->events = $context->events;
        $this->request = $context->request;
        $this->session = $context->session;
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
     *
     * @return ppl_log_logger the logger instance object
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
     * Load a component
     * (Variadic function, rest of arguments are passed in component constructor).
     *
     * @param string $component component name
     *
     * @return mixed the instantiated component
     */
    final public function load($component)
    {
        if ($this->parent !== null) {
            $args = func_get_args();

            return ppl_callback::call(array($this->parent, 'load'), $args);
        }

        return; // should never happen
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
        }
    }

    /**
     * Property setter overloader
     * Used for read only public property.
     *
     * @param string $name property name
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
                throw new ComponentException("Component property '{$name}' is read only");
        }
    }

    /**
     * Get parent type.
     *
     * @return mixed the parent type as string, otherwise NULL on error
     */
    final public function _type()
    {
        return ($this->parent === null) ? null : $this->parent->_type();
    }

    /**
     * Get parent name.
     *
     * @return mixed the parent name as string, otherwise NULL on error
     */
    final public function _name()
    {
        return ($this->parent === null) ? null : $this->parent->_name();
    }

    /**
     * Get parent action name.
     *
     * @return mixed the parent action name as string, otherwise NULL on error
     */
    final public function _action()
    {
        return ($this->parent === null) ? null : $this->parent->_action();
    }

    private function __clone()
    {
    }
}
final class ComponentException extends Exception
{
}
