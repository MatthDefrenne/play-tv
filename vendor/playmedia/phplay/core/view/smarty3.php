<?php
/**
 * PHPlay Framework.
 *
 * Smarty3 view system
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.6
 */
final class ppl_view_smarty3 extends ppl_view_base
{
    /**
     * The required Smarty version
     * (application.conf >>> view >>> version).
     *
     * @var string
     */
    private $smarty_ver = '3.1.19';

    /**
     * The Smarty version prefix.
     *
     * @var string
     */
    private $smarty_ver_prefix = 'Smarty-';

    /**
     * The Smarty object instance.
     *
     * @var Smarty
     */
    private $smarty;

    /**
     * The Smarty template object.
     *
     * @var Smarty_Internal_Template
     */
    private $template;

    /**
     * The cache ttl.
     *
     * @var int
     */
    protected $cache_ttl = 0;

    /**
     * Smarty caching value.
     *
     * @var mixed
     */
    protected $caching;

    /**
     *	set the view cache ID.
     *
     *	@param mixed $id cache id string or null/empty string for no cache id
     */
    public function set_cache_id($id = null)
    {
        if (!is_string($id) && !is_null($id)) {
            throw new ViewException('Cache id must be a string or null');
        }
        $id = (is_null($id) ? '' : "|{$id}");
        $this->cache_id = "{$this->controller}|{$this->action}{$id}";

        if (!is_null($this->smarty)) {
            $this->smarty->setCacheId($this->cache_id);
            if (!is_null($this->template)) {
                $this->template->setCacheId($this->cache_id);
            }
        }

        return true;
    }

    /**
     *	set the view cache.
     *
     *	@param int $ttl cache time to live in seconds (0 is unlimited, FALSE no cache)
     *	@param bool $force_ttl set to TRUE to ignore the TTL at the cache generation
     */
    public function set_cache($ttl = false, $force_ttl = false)
    {
        if (!is_int($ttl) && $ttl !== false) {
            throw new ViewException('Cache time to live must be an integer or FALSE');
        }

        if ($ttl === false) {
            // no caching

            $this->cache_ttl = 0;
            $this->caching = Smarty::CACHING_OFF;
        } else {
            // caching

            $this->cache_ttl = ($ttl === 0) ? -1 : $ttl; // Smarty never expire is -1 instead of zero like other cache system
            $this->caching = ($force_ttl === true ? Smarty::CACHING_LIFETIME_CURRENT : Smarty::CACHING_LIFETIME_SAVED);
        }

        if (!is_null($this->smarty)) {
            $this->smarty->setCaching($this->caching);
            $this->smarty->setCacheLifetime($this->cache_ttl);
            if (!is_null($this->template)) {
                $this->template->setCaching($this->caching);
                $this->template->setCacheLifetime($this->cache_ttl);
            }
        }

        return true;
    }

    /**
     *	check cache validity.
     *
     *	@param mixed $id cache id null or empty string for no cache id
     *
     *	@return bool TRUE if the view is already cached, otherwise FALSE
     */
    public function is_cached()
    {
        $this->setup_smarty();

        if ($this->caching === Smarty::CACHING_OFF) {
            $this->smarty->setCaching(Smarty::CACHING_LIFETIME_SAVED);
            $this->template->setCaching(Smarty::CACHING_LIFETIME_SAVED);
        }

        $is_cached = ($this->smarty->isCached($this->template) === true);

        if (!$is_cached) {
            $this->smarty->clearCache($this->template_file, $this->cache_id);
            if ($this->caching === Smarty::CACHING_OFF) {
                $this->smarty->setCaching(Smarty::CACHING_OFF);
                $this->template->setCaching(Smarty::CACHING_OFF);
            }
        }

        return $is_cached;
    }

    /**
     *	set the template name to render.
     *
     *	@param string $name template name
     *	@param string $path template path
     */
    public function set_name($name, $path = '')
    {
        if (!is_string($name) || (preg_match('#^[a-z]{1}(?:[a-z0-9]{0,}|[a-z0-9_]{1,}[a-z-0-9]{1})$#i', $name) === 0)) {
            throw new ViewException('Template name must be a non-empty string (a-z, 0-9 etc.)');
        }
        if (!is_string($path)) {
            // TODO regex path ?

            throw new ViewException('Template path must be a string');
        }
        $ds = DIRECTORY_SEPARATOR;
        $this->template_file = (isset($path[0]) && ($path[0] === $ds)) ? mb_substr($path, 1) : "{$this->controller}{$ds}{$path}";
        $this->template_file = (mb_substr($this->template_file, -1, 1) === $ds) ? "{$this->template_file}{$name}.tpl" : "{$this->template_file}{$ds}{$name}.tpl";

        if (!is_null($this->template)) {
            $this->template = $this->smarty->createTemplate($this->template_file);
        }
    }

    /**
     *	setup internal Smarty object.
     */
    private function setup_smarty()
    {
        if (!is_null($this->smarty)) {
            return;
        }

        if (!is_file($tp = $this->get_template_file())) {
            throw new ViewException("Template file '{$tp}' does not exist");
        }

        $ds = DIRECTORY_SEPARATOR;
        $compile_dir = "{$this->context->config->path->cache}smarty_compile";
        $cache_dir = "{$this->context->config->path->cache}smarty_cache{$ds}{$this->type}";

        if (ppl_filesys::mkdir($compile_dir) === false) {
            throw new ViewException("Directory '{$compile_dir}' cannot be created, please check permissions");
        }
        if (ppl_filesys::mkdir($cache_dir) === false) {
            throw new ViewException("Directory '{$cache_dir}' cannot be created, please check permissions");
        }

        // create and setup smarty object
        $this->smarty = new Smarty();

        if (method_exists($this->smarty, 'muteExpectedErrors')) {
            $this->smarty->muteExpectedErrors();
        }

        $this->smarty->setTemplateDir($this->template_dir);
        $this->smarty->setCompileDir($compile_dir);
        $this->smarty->setCacheDir($cache_dir);

        // Smarty libs as config dir
        $this->smarty->use_sub_dirs = true;

        // Disable compile_check for staging|production
        $appEnv = (getenv('APP_ENV')) ?: 'production';
        if ('staging' == $appEnv || 'production' == $appEnv) {
            $this->smarty->compile_check = false;
        }

        if (is_null($this->cache_id)) {
            $this->set_cache_id($this->cache_id);
        }
        $this->smarty->setCacheId($this->cache_id);

        if (is_null($this->caching)) {
            $this->caching = Smarty::CACHING_OFF;
        }
        $this->smarty->setCaching($this->caching);

        $this->smarty->setCacheLifetime($this->cache_ttl);

        // set application smarty plugins
        if (isset($this->context->config->view->plugins_dir)) {

            // application.conf [view] plugins_dir is relative to project application root
            $plugins_dir = "{$this->context->config->root_dir}{$this->context->config->view->plugins_dir}";
            if (!is_dir($plugins_dir)) {
                throw new ViewException("Smarty plugins application directory {$plugins_dir} does not exist");
            }
            $this->smarty->addPluginsDir($plugins_dir);
        }

        $this->template = $this->smarty->createTemplate($this->template_file);
    }

    /**
     *	Assign vars to smarty template.
     */
    private function smarty_assign_var()
    {
        // Assign parameters to Smarty object (using multiple Smarty display())
        foreach ($this->params as $name => $value) {
            $this->smarty->assign($name, $value);
        }

        // Set current controller and action name
        $this->smarty->assign($this->type.'_name', $this->controller);
        $this->smarty->assign('action_name', $this->action);
    }

    /**
     * Render the view.
     */
    public function render()
    {
        $this->setup_smarty();
        $this->context->events->trigger($this->context->events->create_event("{$this->type}.before.render"));
        $this->smarty_assign_var();

        // Render template skin using multiple Smarty display()
        if ($this->template_header !== null) {
            $this->smarty->display($this->template_header, $this->cache_id);
        }

        $this->smarty->display($this->template_file, $this->cache_id);

        if ($this->template_footer !== null) {
            $this->smarty->display($this->template_footer, $this->cache_id);
        }

        $this->context->events->trigger($this->context->events->create_event("{$this->type}.after.render"));
    }

    /**
     * Render the view and return the result.
     *
     * @return string the render result
     */
    public function fetch()
    {
        $this->setup_smarty();
        $this->context->events->trigger($this->context->events->create_event("{$this->type}.before.render"));
        $this->smarty_assign_var();

        // Fetch template skin using multiple Smarty fetch()
        if (($this->template_header !== null) && ($this->template_footer !== null)) {
            // Fetch with skin
            return $this->smarty->fetch($this->template_header, $this->cache_id).$this->smarty->fetch($this->template_file, $this->cache_id).$this->smarty->fetch($this->template_footer, $this->cache_id);
        }

        // Fetch without skin
        return $this->smarty->fetch($this->template_file, $this->cache_id);
    }

    /**
     * Set the view skin
     * Set 'skin' var to input $name.
     *
     * @param string $name
     *
     * @see ppl_view_base::set_skin($name)
     */
    public function set_skin($name)
    {
        // Set skin variable to the view instance
        $this->set_var('skin', $name);

        // check if disable
        if (($name === null) || ($name === false) || !is_string($name)) {
            $this->template_header = null;
            $this->template_footer = null;

            return;
        }

        // set skin (header & footer)
        $ds = DIRECTORY_SEPARATOR;
        $path = "{$this->context->config->path->views}skins{$ds}{$name}{$ds}";

        if (!is_dir($path)) {
            throw new ViewException("Skin directory '{$name}' does not exist");
        }

        $this->template_header = "{$path}header.tpl";
        $this->template_footer = "{$path}footer.tpl";

        if (!is_file($this->template_header)) {
            throw new ViewException("Header file not found for skin '{$name}'");
        }
        if (!is_file($this->template_footer)) {
            throw new ViewException("Footer file not found for skin '{$name}'");
        }
    }

    /**
     * Clears the entire template cache.
     *
     * @param int $ttl minimum age in seconds the cache files to be deleted
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    public function clear_cache($ttl = null)
    {
        if (($ttl !== null) && !is_int($ttl)) {
            return false;
        }

        $smarty = new Smarty();
        if (method_exists($smarty, 'muteExpectedErrors')) {
            $smarty->muteExpectedErrors();
        }
        $smarty->setUseSubDirs(true);

        $cache_dir = "{$this->context->config->path->cache}smarty_cache".DIRECTORY_SEPARATOR;

        // Note: ppl_filesys::mkdir() return TRUE if directory already exists
        if (ppl_filesys::mkdir("{$cache_dir}controller")) {
            $smarty->setCacheDir("{$cache_dir}controller");
            $smarty->clearAllCache($ttl);
        }

        return true;
    }
}
