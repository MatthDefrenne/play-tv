<?php
/**
 * PHPlay Framework.
 *
 * View Factory Pattern
 *
 * @static
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_view_factory
{
    private static $types = array('smarty2', 'smarty3');

    /**
     * Return instantiated view type object.
     *
     * @static
     *
     * @param ppl_context $context application context
     * @param string      $type    type of view
     *
     * @return mixed view object
     */
    public static function get_instance(ppl_context $context, $type = 'smarty')
    {
        if (!in_array($type, self::$types)) {
            throw new FactoryViewException("Invalid view type '{$type}'");
        }
        $class = "ppl_view_{$type}";

        return new $class($context);
    }

    private function __construct()
    {
    }
    private function __clone()
    {
    }
}
final class FactoryViewException extends Exception
{
}
