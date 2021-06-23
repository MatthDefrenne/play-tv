<?php
/**
 * PHPlay Framework.
 *
 * Logger helper class
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 1.0.1
 */
final class ppl_log_logger
{
    private $identifier,
        $is_debug,
        $dc = 0,
        $nc = 0,
        $wc = 0,
        $ec = 0;

    /**
     * Constructor.
     *
     * @param string $identifier unique identifier (sub-directory in log root directory)
     * @param bool   $is_debug   set to TRUE to enable DEBUG messages
     */
    final public function __construct($identifier, $is_debug = false)
    {
        $this->identifier = $identifier;
        $this->is_debug = ($is_debug === true) ? true : false;
    }

    /**
     * Set debug mode.
     *
     * @param bool $is_debug
     */
    final public function set_debug($is_debug)
    {
        $this->is_debug = ($is_debug === true) ? true : false;
    }

    /**
     * Append a DEBUG message in log file associated to identifier.
     *
     * @param string $message
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    final public function debug($message)
    {
        if ($this->is_debug) {
            ++$this->dc;

            return ppl_log::write($this->identifier, "[DEBUG] {$message}");
        }

        return true;
    }

    /**
     * Append a NOTICE message in log file associated to identifier.
     *
     * @param string $message
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    final public function notice($message)
    {
        ++$this->nc;

        return ppl_log::write($this->identifier, "[NOTICE] {$message}");
    }

    /**
     * Append a WARNING message in log file associated to identifier.
     *
     * @param string $message
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    final public function warning($message)
    {
        ++$this->wc;

        return ppl_log::write($this->identifier, "[WARNING] {$message}");
    }

    /**
     * Append an ERROR message in log file associated to identifier.
     *
     * @param string $message
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    final public function error($message)
    {
        ++$this->ec;

        return ppl_log::write($this->identifier, "[ERROR] {$message}");
    }

    /**
     * Get current DEBUG count.
     *
     * @return int
     */
    final public function debug_count()
    {
        return $this->dc;
    }

    /**
     * Get current NOTICE count.
     *
     * @return int
     */
    final public function notice_count()
    {
        return $this->nc;
    }

    /**
     * Get current WARNING count.
     *
     * @return int
     */
    final public function warning_count()
    {
        return $this->wc;
    }

    /**
     * Get current ERROR count.
     *
     * @return int
     */
    final public function error_count()
    {
        return $this->ec;
    }

    /**
     * Get human read formated duration.
     *
     * @param float $duration duration in seconds
     *
     * @return mixed the formatted duration, otherwise FALSE on error
     */
    final public function format_duration($duration)
    {
        return ppl_log::format_duration($duration);
    }
}
