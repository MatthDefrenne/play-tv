<?php
/**
 * PHPlay Framework.
 *
 * Log file system
 *
 * @static
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 1.0.1
 */
final class ppl_log
{
    private static $logger = array(),
        $root,
        $report_level,
        $set = false;

    /**
     * Set log root directory.
     *
     * @static
     *
     * @param string $root absolute path of root log directory
     */
    public static function set_root($root)
    {
        if (self::$set === false) {
            self::$root = $root;
            self::$set = true;
        }
    }

    /**
     * Set report level.
     *
     * @static
     *
     * @param int $report_level application report level
     */
    public static function set_report_level($report_level)
    {
        self::$report_level = $report_level;
    }

    /**
     * Append a message in log file associated to identifier.
     *
     * @static
     *
     * @param string $identifier unique identifier
     * @param string $message    message to append to log file
     *
     * @return mixed returns the number of bytes written, or false on error
     */
    public static function write($identifier, $message)
    {
        if (!is_string($identifier) || ($identifier === '')) {
            throw new LogException('Identifier must be a non-empty string');
        }

        $dir = self::$root;

        // Impossible as it's a framework requirement
        if (!is_dir($dir)) {
            mkdir($dir, 0755); // E_WARNING may happen if no sufficient permissions
        }
        if (!is_writable($dir)) {
            //throw new LogException("Cannot write log files in '{$dir}' directory, please check permissions");
            return false;
        }

        // rewrite multiple paths to a "_" separated identifier instead
        $identifier = str_replace('/', '_', $identifier);
        $identifier = strtolower($identifier);

        $file = "{$dir}{$identifier}.log";
        $message = date('d-m-Y H:i:s ')."{$message}\n";

        return ppl_filesys::write($file, $message);
    }

    /**
     * Get logger helper object.
     *
     * @param string $identifier  unique identifier (sub-directory in log root directory)
     * @param bool   $force_debug set to TRUE to enable DEBUG message in production mode
     *
     * @return ppl_log_logger the logger instance object
     */
    public static function get_logger($identifier, $force_debug = false)
    {
        if (!isset(self::$logger[$identifier])) {
            $force_debug = ($force_debug === true) ? true : (self::$report_level > 1);
            self::$logger[$identifier] = new ppl_log_logger($identifier, $force_debug);
        }

        return self::$logger[$identifier];
    }

    /**
     * Get human read formated duration.
     *
     * @param float  $duration duration in seconds
     * @param string $sep      separator
     *
     * @return mixed the formatted duration, otherwise FALSE on error
     */
    public static function format_duration($duration, $sep = ', ')
    {
        if (!is_numeric($duration)) {
            return false;
        }
        $s = $duration % 60;
        $m = floor(($duration % 3600) / 60);
        $h = floor(($duration % 86400) / 3600);
        $d = floor(($duration % 2592000) / 86400); // supposing months are 30 days long

        if ($duration >= 86400) {
            return self::fmtu($d, 'day').$sep.self::fmtu($h, 'hour').$sep.self::fmtu($m, 'minute').$sep.self::fmtu($s, 'second');
        } elseif ($duration >= 3600) {
            return self::fmtu($h, 'hour').$sep.self::fmtu($m, 'minute').$sep.self::fmtu($s, 'second');
        } elseif ($duration >= 60) {
            return self::fmtu($m, 'minute').$sep.self::fmtu($s, 'second');
        }

        return self::fmtu($s, 'second');
    }

    /**
     * Format unit according value.
     *
     * @param int    $value
     * @param string $unit
     *
     * @return string formated unit value
     */
    private static function fmtu($value, $unit)
    {
        return ($value > 1) ? "{$value} {$unit}s" : "{$value} {$unit}";
    }

    private function __construct()
    {
    }
    private function __clone()
    {
    }
}
final class LogException extends Exception
{
}
