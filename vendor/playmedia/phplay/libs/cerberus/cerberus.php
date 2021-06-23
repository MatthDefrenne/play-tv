<?php
/**
 * Cerberus Error Handler.
 *
 * Catch all non handled errors or exceptions (Also turn off HTML tags in error messages)
 * Custom error handler functions must return false to disallow cerberus to process the error
 * This script can be loaded with auto_prepend_file parameter in php.ini (auto_prepend_file=/path/to/cerberus.php)
 * Set "enable_on_parse_error" parameter of register() call to true will auto-enable Cerberus on E_PARSE error (last line of this script)
 *
 * Report level values :
 *  0 : PRODUCTION  - Log and display a custom error page ONLY for fatal errors (DEFAULT)
 *  1 : PRODUCTION  - Log all errors and display a custom error page ONLY for fatal errors
 *  2 : DEVELOPMENT - Log and display Cerberus error page ONLY for fatal errors
 *  3 : DEVELOPMENT - Log all errors and display Cerberus error page ONLY for fatal errors
 *  4 : DEVELOPMENT - Log and display Cerberus error page for all errors
 *
 *
 * TODO:
 *		- Do external class for build development error page which will be included only for display it
 *
 *
 * @author Playmedia <contact at playmedia dot fr>
 */
final class cerberus
{
    private static $nr_enabled = false,
        $max_error_count = 30,
        $max_arg_display_size = 4096,
        $version = '0.2.3 alpha',
        $name = 'cerberus',
        $enabled,
        $reportlevel,
        $charset = 'utf-8',
        $error_file = '500.html',
        $error_path = null,
        $log_dir = null,
        $autoenable,
        $registered = false,
        $sapi,
        $errors = array(),
        $types = array(
                        0 => 'E_EXCEPTION',
                        1 => 'E_ERROR',
                        2 => 'E_WARNING',
                        4 => 'E_PARSE',
                        8 => 'E_NOTICE',
                        16 => 'E_CORE_ERROR',
                        32 => 'E_CORE_WARNING',
                        64 => 'E_COMPILE_ERROR',
                        128 => 'E_COMPILE_WARNING',
                        256 => 'E_USER_ERROR',
                        512 => 'E_USER_WARNING',
                        1024 => 'E_USER_NOTICE',
                        2047 => 'E_ALL',
                        2048 => 'E_STRICT',
                        4096 => 'E_RECOVERABLE_ERROR',
                        6143 => 'E_ALL',
                        8192 => 'E_DEPRECATED',
                        16384 => 'E_USER_DEPRECATED',
                        30719 => 'E_ALL',
        );

    /**
     * Setup and register Cerberus.
     *
     * This function is called automatically (see the end of this file)
     *
     * @param bool   $enabled               enable Cerberus if set to true
     * @param int    $reportlevel           set Cerberus report level. (0 to 4 : see documentation)
     * @param string $log_dir               directory where to put error log files (set to NULL to disable log)
     * @param bool   $enable_on_parse_error Cerberus will auto-enable on E_PARSE error of set to true
     */
    public static function register($enabled, $reportlevel, $log_dir, $enable_on_parse_error)
    {
        if (self::$registered === false) {
            ob_start();
            self::$autoenable = $enable_on_parse_error;
            self::set_reportlevel($reportlevel);
            self::set_log_dir($log_dir);
            if (extension_loaded('newrelic')) {
                self::$nr_enabled = true;
            }
            self::enable($enabled);
            register_shutdown_function(array('cerberus', 'shutdown'));
            set_exception_handler(array('cerberus', 'exception_handler'));
            set_error_handler(array('cerberus', 'error_handler'));
            ini_set('html_errors', 0);
            //error_reporting(0);
            //ini_set('log_errors', 0);
            //ini_set('display_errors', 0);
            self::$sapi = php_sapi_name();
            self::$registered = true;
        } else {
            throw new CerberusException('Invalid call to register() because Cerberus is already registered');
        }
    }

    /**
     * Return Cerberus name.
     *
     * @return string Cerberus name
     */
    public static function name()
    {
        return self::$name;
    }

    /**
     * Set the error log directory
     * (Try to create directory if does not exists).
     *
     * @param string $log_dir directory where to put error log files (set to NULL to disable log)
     */
    public static function set_log_dir($log_dir)
    {
        if ($log_dir !== null) {
            if (!is_string($log_dir) || ($log_dir === '')) {
                throw new CerberusException('Log directory parameter must be a non-empty string');
            }
            $ds = DIRECTORY_SEPARATOR;
            $log_dir = (mb_substr($log_dir, -1, 1) === $ds) ? $log_dir : "{$log_dir}{$ds}";
            if (!is_dir($log_dir)) {
                mkdir($log_dir, 0755, 1); // E_WARNING may happen if no sufficient permissions
            }
            if (!is_writable($log_dir)) {
                throw new CerberusException("Cannot write log files in '{$log_dir}' directory, please check permissions");
            }
        }
        self::$log_dir = $log_dir;
    }

    /**
     * Set the charset (default is "utf-8").
     *
     * @param string $charset valid character set name.
     */
    public static function set_charset($charset)
    {
        if (!is_string($charset) || ($charset === '')) {
            throw new CerberusException('Charset parameter must be a non-empty string');
        }
        self::$charset = $charset;
    }

    /**
     * Enable or disable Cerberus.
     *
     * @param bool $enabled enable Cerberus if set to true
     */
    public static function enable($enabled = true)
    {
        if (is_bool($enabled) === false) {
            throw new CerberusException('Enabled parameter must be a boolean');
        }
        self::$enabled = $enabled;
    }

    /**
     * Set the report level.
     *
     * 0 : PRODUCTION - Log and display a custom error page ONLY for fatal errors (DEFAULT)
     * 1 : PRODUCTION - Log all errors and display a custom error page ONLY for fatal errors
     * 2 : DEVELOPMENT - Log and display Cerberus error page ONLY for fatal errors
     * 3 : DEVELOPMENT - Log all errors and display Cerberus error page ONLY for fatal errors
     * 4 : DEVELOPMENT - Log and display Cerberus error page for all errors
     *
     * @param int $reportlevel report level
     */
    public static function set_reportlevel($reportlevel)
    {
        if ((is_int($reportlevel) === false) || ($reportlevel < 0) || ($reportlevel > 4)) {
            throw new CerberusException('Report level parameter must be an integer between 0 and 4');
        }
        self::$reportlevel = $reportlevel;
    }

    /**
     * Set custom error path
     * (Set $error_path to NULL to display impersonal error page).
     *
     * @param string $error_path Absolute path to error file (without filename)
     */
    public static function set_error_path($error_path)
    {
        if (($error_path !== null) && (!is_string($error_path) || ($error_path === ''))) {
            throw new CerberusException('Error path parameter must be a non-empty string');
        }
        $ds = DIRECTORY_SEPARATOR;
        self::$error_path = (mb_substr($error_path, -1, 1) === $ds) ? $error_path : "{$error_path}{$ds}";
    }

    /**
     * Shutdown function.
     *
     * This function is used with register_shutdown_function()
     * PHP gracefully flush output buffer at end of script
     * Exit() function in the auto_preprend_file with fastcgi can leave opened files resulting in "too many open files" error
     */
    public static function shutdown()
    {
        if (!is_null($e = error_get_last())) {
            // Check auto-enable on E_PARSE
            if (($e['type'] === 4) && (self::$autoenable === true)) {
                self::$enabled = true;
            }
            if (self::can_log_error($e['type'])) {
                self::error_log($e['type'], $e['message'], $e['file'], $e['line']);
            }
            if (self::can_append_error($e['type'])) {
                if (self::$nr_enabled === true) {
                    $err_type = self::$types[$e['type']];
                    newrelic_notice_error(
                        sprintf('%s: %s in file %s at line %d', $err_type, $e['message'], $e['file'], $e['line'])
                    );
                }
                if (self::is_production()) {
                    self::append_error($e['type'], $e['message'], $e['file'], $e['line'], 1, array());
                } else {
                    self::append_error($e['type'], $e['message'], $e['file'], $e['line'], memory_get_peak_usage(false), debug_backtrace(false));
                }
            }
        }
        // Check for errors
        if (count(self::$errors) === 0) {
            return;
        }
        if (self::is_cli()) {
            self::get_and_clean_ob();
            if (self::$log_dir === null) {
                // TODO : display error(s) in text mode ?

                // Display last error message (log is disabled)
                $error = self::$errors[count(self::$errors) - 1][0];
                if ($error[4] !== null) {
                    $error[4] = " ($error[4])";
                }
                $msg = "{$types[$error[0]]}$error[4]: $error[1] in $error[2] on line $error[3]\n";
                echo "\nSome error(s) occured. (logs are disabled)\nLast error is{$msg}\n";
            } else {
                echo "\nSome error(s) occured. See Cerberus logs for more details in ".self::$log_dir."\n";
            }
            exit(1); // Exit with an error code (1)
        }
        if (self::is_production()) {
            self::production_error_page();
        } else {
            self::development_error_page();
        }
    }

    /**
     * Exception handling function.
     *
     * @param mixed $e exception object that was thrown
     */
    public static function exception_handler($e)
    {
        $exception_type = get_class($e);
        if (self::can_log_error(0)) {
            self::error_log(0, $e->getMessage(), $e->getFile(), $e->getLine(), $exception_type);
        }
        if (self::can_append_error(0)) {
            if (self::$nr_enabled === true) {
                newrelic_notice_error(
                    sprintf('%s in file %s at line %d', $e->getMessage(), $e->getFile(), $e->getLine()),
                    $e
                );
            }
            if (self::is_production()) {
                self::append_error(0, $e->getMessage(), $e->getFile(), $e->getLine(), 1, array(), $exception_type);
            } else {
                self::append_error(0, $e->getMessage(), $e->getFile(), $e->getLine(), memory_get_peak_usage(false), $e->getTrace(), $exception_type);
            }
        }
    }

    /**
     * Error handling function.
     *
     * @param int    $type    level of the error raised
     * @param string $message error message
     * @param string $file    filename that the error was raised in
     * @param int    $line    line number the error was raised at
     */
    public static function error_handler($type, $message, $file, $line)
    {
        if (self::can_log_error($type)) {
            self::error_log($type, $message, $file, $line);
        }
        if (self::can_append_error($type)) {
            if (self::$nr_enabled === true) {
                $err_type = self::$types[$type];
                newrelic_notice_error(
                    sprintf('%s: %s in file %s at line %d', $err_type, $message, $file, $line)
                );
            }
            if (self::is_production()) {
                self::append_error($type, $message, $file, $line, 1, array());
            } else {
                self::append_error($type, $message, $file, $line, memory_get_peak_usage(false), debug_backtrace(false));
            }
        }
        // return true ?
    }

    /**
     * Check if PHP interface is CLI.
     *
     * @param bool return TRUE if interface is CLI, otherwise FALSE
     */
    private static function is_cli()
    {
        return self::$sapi === 'cli';
    }

    /**
     * Check if PHP interface is CGI type.
     *
     * @param bool return TRUE if interface is CGI type, otherwise FALSE
     */
    private static function is_cgi()
    {
        return strpos(self::$sapi, 'cgi') > 0;
    }

    /**
     * Check if production reporting mode.
     *
     * @param bool return TRUE if production reporting mode, otherwise FALSE
     */
    private static function is_production()
    {
        return self::$reportlevel < 2;
    }

    /**
     * Check for fatal error type.
     *
     * @param int $error_type level of the error raised
     * @param bool return TRUE if fatal error type, otherwise FALSE
     */
    private static function is_fatal_error($error_type)
    {
        switch ($error_type) {
            case 2:    // E_WARNING
            case 8:    // E_NOTICE
            case 512:    // E_USER_WARNING
            case 1024:    // E_USER_NOTICE
            case 2048: // E_STRICT
            case 8192: // E_DEPRECATED
            case 16384: // E_USER_DEPRECATED
                return false;
        }

        return true;
    }

    /**
     * Check if error can be appended.
     *
     * @param int $error_type level of the error raised
     * @param bool return TRUE if error can be appended, otherwise FALSE
     */
    private static function can_append_error($error_type)
    {
        // Cerberus is enabled and maximum error not reached and error is fatal or report level is 4
        if ((self::$enabled === true) && (!isset(self::$errors[self::$max_error_count - 1])) && ((self::is_fatal_error($error_type)) || (self::$reportlevel === 4))) {
            return true;
        }

        return false;
    }

    /**
     * Check if error can be logged.
     *
     * @param int $error_type level of the error raised
     * @param bool return TRUE if error can be logged, otherwise FALSE
     */
    private static function can_log_error($error_type)
    {
        // Logging is enabled and Cerberus is enabled and error is fatal or report level is 1 or 3 or 4
        if ((self::$log_dir !== null) && (self::$enabled === true) && ((self::is_fatal_error($error_type)) || (self::$reportlevel === 1) || (self::$reportlevel > 2))) {
            return true;
        }

        return false;
    }

    /**
     * Append an error.
     *
     * @param int    $type           level of the error raised
     * @param string $message        error message
     * @param string $file           filename that the error was raised in
     * @param int    $line           line number the error was raised at
     * @param int    $memory         memory peak used in bytes
     * @param array  $backtrace      backtrace associative array
     * @param string $exception_type optional type of exception object that was thrown
     */
    private static function append_error($type, $message, $file, $line, $memory, $backtrace, $exception_type = null)
    {
        self::$errors[] = array(
                array($type, $message, $file, $line, $exception_type),
                $backtrace,
                $memory,
        );
    }

    /**
     * Write error message in log file.
     *
     * @param int    $type           level of the error raised
     * @param string $message        error message
     * @param int    $line           line number the error was raised at
     * @param string $exception_type type of exception object that was thrown or NULL
     */
    private static function error_log($type, $message, $file, $line, $exception_type = null)
    {
        if (self::$log_dir === null) {
            return;
        }
        $log_dir = &self::$log_dir;
        if ($exception_type !== null) {
            $exception_type = " ($exception_type)";
        }
        $types = &self::$types;
        $msg = date('d-m-Y H:i:s ')."$types[$type]$exception_type: $message in $file on line $line\n";
        $filename = 'cerberus.log';
        $logfile = "{$log_dir}{$filename}";
        $fp = fopen($logfile, 'a+');
        stream_set_blocking($fp, 0);
        if (flock($fp, LOCK_EX)) {
            fwrite($fp, $msg);
        }
        flock($fp, LOCK_UN);
        fclose($fp);
    }

    /**
     * HTML text formatting of stack arguments.
     *
     * @param array $args backtrace stack arguments
     *
     * @return string human readable html of stack args
     */
    private static function args_to_html($args)
    {
        $html = '<table>';
        $count = count($args);
        for ($i = 0; $i < $count; ++$i) {
            $arg = &$args[$i];
            $type = gettype($arg);
            if ($type === 'boolean') {
                $text = ($arg) ? 'true' : 'false';
                $html .= "<tr><td><strong>$type</strong></td><td>$text</td></tr>";
                continue;
            }
            if (($type === 'array') || ($type === 'object')) {
                $text = '(array)';
                $text = self::print_r($arg, true);
                if ($type === 'array' && count($arg) === 0) {
                    $text = 'Array (empty)';
                } elseif (mb_strlen($text) > self::$max_arg_display_size) {
                    $text = ($type === 'object') ? get_class($arg).' object' : count($arg).' element(s)';
                    $text .= ' <i>(display unavailable)</i>';
                }
                $html .= "<tr><td><strong>$type</strong></td><td><pre>$text</pre></td></tr>";
                continue;
            }
            if ($type === 'resource') {
                $type = get_resource_type($arg);
                $html .= "<tr><td>resource</td><td>$type</td></tr>";
                continue;
            }
            if (mb_strlen($arg) > self::$max_arg_display_size) {
                $html .= "<tr><td><strong>$type</strong></td><td><i>(display unavailable)</i></td></tr>";
            } else {
                $html .= "<tr><td><strong>$type</strong></td><td><pre>$arg</pre></td></tr>";
            }
        }

        return "$html</table>";
    }

    /**
     * print_r for arrays (quicker than original print_r).
     *
     * @param array $array array to print
     *
     * @return string human readable informations about arrays
     */
    private static function print_r($array, $return = false, $depth = 0)
    {
        $items = array();
        $html = '';
        foreach ($array as $key => $value) {
            $type = gettype($value);
            if ($type === 'array') {
                if (count($value) > 0) {
                    $value = self::print_r($value, $return, $depth + 1);
                } else {
                    $value = ucfirst($type).' (empty)';
                }
            } else {
                switch ($type) {
                    case 'NULL':
                        $value = $type;
                        break;
                    case 'boolean':
                        $value = ($value === true ? 'true' : 'false');
                        break;
                    case 'string':
                        $value = "'{$value}'";
                        break;
                    case 'object':
                        $value = get_class($value).' object';
                    default:
                        $value = $value;
                }
            }
            $items[$key] = htmlentities($value);
        }
        if (count($items) > 0) {
            $prefix = $tabs = '';
            for ($i = 0; $i < $depth; ++$i) {
                $tabs .= '   ';
            }
            $html .= ucfirst(gettype($array))."\n{$tabs}(\n";
            foreach ($items as $key => &$value) {
                $html .= "{$prefix}{$tabs}   [".(is_string($key) === true ? "'{$key}'" : $key)."] => {$value}";
                $prefix = ",\n";
            }
            $html .= "\n{$tabs})";
        } else {
            return 'error';
        }
        if ($return === true) {
            return $html;
        }
        echo $html;
    }

    /**
     * HTML text formatting of backtrace array.
     *
     * Cerberus backtrace stacks are filtered
     *
     * @param array $backtrace debug_backtrace associative array
     *
     * @return string human readable html of backtrace
     */
    private static function backtrace_to_html($backtrace)
    {
        $html = '';
        $count = count($backtrace);
        for ($i = 0; $i < $count; ++$i) {
            $stack = &$backtrace[$i];
            if (isset($stack['file']) && ($stack['file'] === __FILE__)) {
                continue;
            }
            $msg = '';
            if (isset($stack['class'])) {
                $msg .= $stack['class'];
            }
            if (isset($stack['type'])) {
                $msg .= $stack['type'];
            }
            if (isset($stack['function'])) {
                $msg .= "{$stack['function']}()";
            }
            if (($msg === 'cerberus::error_handler()') || ($msg === 'cerberus::shutdown()')) {
                continue;
            }
            if (isset($stack['file'])) {
                $msg .= " in file {$stack['file']}";
            }
            if (isset($stack['line'])) {
                $msg .= " on line {$stack['line']}";
            }
            if (empty($msg) === true) {
                continue;
            }
            if (isset($stack['args']) && is_array($stack['args']) && (count($stack['args']) > 0)) {
                $args = self::args_to_html($stack['args']);
                $html .= "<li><h3>at $msg</h3><ul><li>$args</li></ul></li>\n";
                continue;
            }
            $html .= "<li>at $msg</li>\n";
        }
        if (empty($html) === true) {
            return "<li>Backtrace is empty</li>\n";
        }

        return $html;
    }

    /**
     * Empty and return output buffer content.
     *
     * @return string output buffer content
     */
    private static function get_and_clean_ob()
    {
        $ob = '';
        while (ob_get_level()) {
            $ob .= ob_get_clean();
        }

        return $ob;
    }

    /**
     * Send Cerberus error page with http error code 500
     * (Development level report).
     */
    private static function development_error_page()
    {
        $template = file_get_contents(dirname(__FILE__).'/cerberus.tpl');
        if (is_file($template) && (($template = file_get_contents($template)) !== false)) {
            $template = "(Cerberus Internal Error) file not found : '{$template}'";
            self::send_error_response($template);

            return; // E_WARNING (file_get_contents)
        }

        $types = &self::$types;
        $errors = &self::$errors;
        $charset = self::$charset;
        $version = self::$version;
        $content = '';

        // Get output buffer content
        $output_buffer = self::get_and_clean_ob();

        // TODO: find a better way to format and display output buffer
        $output_buffer = htmlentities($output_buffer, ENT_COMPAT, $charset);

        $units = array('bytes', 'kilobytes', 'megabytes', 'gigabytes', 'terabytes', 'petabytes');

        $count = count($errors);
        for ($i = 0; $i < $count; ++$i) {
            $e = &$errors[$i];
            $error = $e[0]; // array( type, message, file, line, exception_type )
            $backtrace = self::backtrace_to_html($e[1]);
            $memory = $e[2];
            $unit = floor(log($memory, 1024));
            $memory = round($memory / pow(1024, $unit), 2).' '.$units[$unit];

            // Build html error message
            if ($error[4] !== null) {
                $error[4] = " ($error[4])";
            }
            $msg = "{$types[$error[0]]}$error[4]: $error[1] in $error[2] on line $error[3]\n";

            // Add error message to content
            $content .= "<li><h2>$msg</h2><ul><li>Memory used : $memory</li>$backtrace</ul></li>";

            // Stop backtrace on fatal errors
            if ($error[0] !== 8 && $error[0] !== 1024 &&  $error[0] !== 2048 &&  $error[0] !== 8192 &&  $error[0] !== 16384) {
                break;
            }
        }

        // Output buffer
        $content .= "<li><h2>Output Buffer</h2><ul><li><pre>$output_buffer</pre></li></ul></li>";

        // Replace template tags
        $template = preg_replace('/%charset%/', $charset, $template, 1);
        $template = preg_replace('/%version%/', $version, $template, 1);
        $template = preg_replace('/%content%/', $content, $template, 1);

        // Display Cerberus error page
        self::send_error_response($template);
    }

    /**
     * Send custom or impersonal error page with http error code 500
     * (Production level report).
     */
    private static function production_error_page()
    {
        self::get_and_clean_ob();
        if (self::$error_path !== null) {
            // Custom error page
            $file = self::$error_path.self::$error_file;
            if (is_file($file) && (($content = file_get_contents($file)) !== false)) {
                self::send_error_response($content);

                return;
            }
        }
        // Impersonal error page
        $content = "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n";
        $content .= "<html><head>\n";
        $content .= "<title></title>\n";
        $content .= "</head><body>\n";
        $content .= "<h1>Internal Server Error</h1>\n";
        $content .= "<p>The server encountered an internal error and was unable to complete your request.</p>\n";
        $content .= '</body></html>';
        self::send_error_response($content);
    }

    /**
     * Send response content with http error code 500.
     *
     * @param string $content output content
     */
    private static function send_error_response($content)
    {
        if (self::is_cgi()) {
            header('Status: 500 Internal Server Error');
        } else {
            header('HTTP/1.1 500 Internal Server Error');
        }
        echo $content;
    }

    private function __construct()
    {
    }
    private function __clone()
    {
    }
}
final class CerberusException extends Exception
{
}
cerberus::register(false, 0, null, false); // Auto-registration on include (Disabled in production mode, logging is also disabled)
