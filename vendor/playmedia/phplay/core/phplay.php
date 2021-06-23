<?php
/**
 * PHPlay Framework.
 *
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.6
 */
class phplay
{
    /**
     * Environment array of paths, options, and stats.
     *
     * @var array
     */
    public $environment;

    /**
     * The application core object.
     *
     * @var ppl_core
     */
    public $core;

    /**
     * Boot state (core load with environnment).
     *
     * @var bool
     */
    private $booted = false;

    /**
     * PHPlay constructor.
     *
     * @param string $application_name Application name determining app path
     * @param string $root_dir         root dir if not following convention
     * @param bool   $debug            debug flag
     * @param int    $report_level     Report level for Cerberus
     * @param string $cache_type       Cache type
     */
    public function __construct($application_name, $root_dir, $debug = false, $report_level = 0, $cache_type = 'none')
    {
        $ds = DIRECTORY_SEPARATOR;
        $root = realpath($root_dir);

        if (!is_dir($root)) {
            throw new \InvalidArgumentException("Application '{$application_name}' does not exists");
        }

        // Playmedia Log folder compliance : https://github.com/playmedia/dev/blob/master/docs/WEB-FOLDERS.md#log-folder
        $log_dir = ('dev' === getenv('APP_ENV')) ? "{$root}{$ds}var{$ds}log{$ds}" : "{$ds}var{$ds}log{$ds}apps{$ds}{$application_name}{$ds}";

        $this->environment = array(
            'path' => array(
                'root' => "{$root}{$ds}",
                'cache' => "{$root}{$ds}cache{$ds}",
                'config' => "{$root}{$ds}resources{$ds}config{$ds}",
                'log' => $log_dir,
                'views' => "{$root}{$ds}resources{$ds}views{$ds}",
                'web' => "{$root}{$ds}web{$ds}",
            ),
            'application' => array(
                'name' => $application_name,
                'report_level' => $report_level,
                'debug' => $debug,
            ),
            'cache_type' => $cache_type,
            'root_dir' => "{$root}{$ds}",
        );
    }

    public function isBooted()
    {
        return $this->booted;
    }

    /**
     * Boot error/exception handler, load config.
     */
    public function boot()
    {
        if (!$this->booted) {
            // Register Error and Exception handler
            $this->enableCerberus($this->environment);

            // Boot
            $this->core = new \ppl_core(new \ppl_context($this->environment, $this->environment['cache_type']));

            $this->booted = true;
        }
    }

    /**
     * PHPlay run.
     * Initiate a Kernel alike type, binding request/response to core.
     */
    public function run()
    {
        // Requirements
        $this->boot();

        // Kernel
        $this->core->context->request = new ppl_request($this->core->context->config);
        $this->core->context->response = new ppl_response($this->core->context->config, true, $this->core->context->events, $this->core->context->request);
        $this->core->context->session = new ppl_session($this->core->context->config, $this->core->context->request);

        $this->core->execute();
    }

    /**
     * Enable Cerberus, our internal PHP Error/Exception Handler (courtesy of @kslimani).
     *
     * @param array $environment Application environnment
     */
    private function enableCerberus($environment)
    {
        cerberus::enable();
        cerberus::set_reportlevel($environment['application']['report_level']);
        cerberus::set_error_path($environment['path']['web']);

        if (!is_dir($environment['path']['log'])) {
            @mkdir($environment['path']['log'], 0755);
        }

        cerberus::set_log_dir("{$environment['path']['log']}");
    }
}
