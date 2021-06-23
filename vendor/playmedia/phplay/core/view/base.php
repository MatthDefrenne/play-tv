<?php
/**
 * PHPlay Framework.
 *
 * Base view system
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
abstract class ppl_view_base
{
    /**
     * Type controller.
     *
     * @var string
     */
    const CONTROLLER = 'controller';

    /**
     * The application core.
     *
     * @var ppl_core
     */
    protected $parent;

    /**
     * The application context.
     *
     * @var ppl_context
     */
    protected $context;

    /**
     * The controller type.
     *
     * @var string
     */
    protected $type;

    /**
     * The controller name.
     *
     * @var string
     */
    protected $controller;

    /**
     * The controller action name.
     *
     * @var string
     */
    protected $action;

    /**
     * The view parameters.
     *
     * @var array
     */
    protected $params;

    /**
     * The template directory.
     *
     * @var string
     */
    protected $template_dir;

    /**
     * The template file.
     *
     * @var string
     */
    protected $template_file;

    /**
     * The template header.
     *
     * @var string
     */
    protected $template_header;

    /**
     * The template footer.
     *
     * @var string
     */
    protected $template_footer;

    /**
     * The cache ttl.
     *
     * @var int
     */
    protected $cache_ttl;

    /**
     * The cache id.
     *
     * @var string
     */
    protected $cache_id;

    abstract public function set_cache($ttl = 0);
    abstract public function is_cached();
    abstract public function set_name($name, $path = '');
    abstract public function render();
    abstract public function fetch();
    abstract public function set_skin($name);

    /**
     * Constructor.
     *
     * @param ppl_context $context application context
     */
    final public function __construct(ppl_context $context)
    {
        $this->context = $context;
        $this->clear_params();
    }

    /**
     * Set view default parameters.
     *
     * @param string $controller current controller name
     * @param string $action     current action name
     * @param string $type       current controller type
     */
    final public function __init($controller, $action, $type, ppl_core $parent)
    {
        $ds = DIRECTORY_SEPARATOR;
        $this->controller = $controller;
        $this->action = $action;
        $this->type = $type;
        $this->parent = $parent;
        $this->template_dir = "{$this->context->config->path->views}{$this->type}s{$ds}"; // watchout the 's' after type !
        $this->set_name($action);

        if ($type === self::CONTROLLER) {
            $this->set_skin($this->context->config->view->default_skin);
        } else {
            $this->set_skin(false);
        }
    }

    /**
     * Clear the parameters.
     */
    public function clear_params()
    {
        $this->params = array();
    }

    /**
     * Return the template file path.
     *
     * @return string the template absolute file path
     */
    public function get_template_file()
    {
        return "{$this->template_dir}{$this->template_file}";
    }

    /**
     * Return the cache time to live in second.
     *
     * @return int the ttl
     */
    public function get_cache_ttl()
    {
        return $this->cache_ttl;
    }

    /**
     * Return the cache id.
     *
     * @return string the cache id
     */
    public function get_cache_id()
    {
        return $this->cache_id;
    }

    /**
     * Set a variable to the view.
     *
     * @param string $name  variable name
     * @param mixed  $value variable value
     */
    public function set_var($name, $value)
    {
        $this->params[$name] = $value;
    }
}
final class ViewException extends Exception
{
}
