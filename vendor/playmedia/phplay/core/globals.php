<?php
/**
 * PHPlay Framework.
 *
 * Globals variables container class
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_globals
{
    private $globals;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->clear();
    }

    /**
     * Store a value in globals.
     *
     * @param string $key   unique key
     * @param mixed  $value variable to store
     *
     * @return bool TRUE
     */
    public function set($key, $value)
    {
        $this->globals[$key] = $value;

        return true;
    }

    /**
     * Retrieve a value from globals.
     *
     * @param string $key unique key
     *
     * @return mixed the stored variable, or NULL on failure
     */
    public function get($key)
    {
        if (isset($this->globals[$key])) {
            return $this->globals[$key];
        }

        return;
    }

    /**
     * Delete a value in globals.
     *
     * @param string $key unique key
     *
     * @return mixed TRUE on success, or FALSE on error
     */
    public function delete($key)
    {
        if (isset($this->globals[$key])) {
            unset($this->globals[$key]);

            return true;
        }

        return false;
    }

    /**
     * Clear globals.
     */
    public function clear()
    {
        $this->globals = array();
    }

    private function __clone()
    {
    }
}
