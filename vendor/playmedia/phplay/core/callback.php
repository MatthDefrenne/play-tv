<?php
/**
 * PHPlay Framework.
 *
 * Callback Caller
 * For callback type, see PHP documentation at : http://fr.php.net/manual/en/language.pseudo-types.php#language.types.callback
 *
 * @static
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
final class ppl_callback
{
    /**
     * Verify that the contents of a variable can be called as a function
     * Extended version of PHP is_callable().
     *
     * @static
     *
     * @param callback $callable        callable function or class method
     * @param array    $params          function parameters (does not check required parameters if NULL)
     * @param bool     $static_call     if callable first param is a string, STATIC call is tested (set to FALSE to bypass)
     * @param bool     $raise_exception set to TRUE to raise a CallbackException if not callable
     *
     * @return bool return TRUE if is callable, FALSE otherwise
     */
    public static function is_callable($callable, $params = null, $static_call = true, $raise_exception = false)
    {
        if (($params !== null) && !is_array($params)) {
            throw new CallbackException('params must be an array');
        }
        if (is_callable($callable, true, $name) === false) {
            if ($raise_exception === true) {
                throw new CallbackException('callback content is not callable');
            }

            return false;
        }
        if (is_array($callable) && is_string($callable[1])) {
            if (is_string($callable[0])) {
                if (!class_exists($callable[0], true) || !method_exists($callable[0], $callable[1])) {
                    if ($raise_exception === true) {
                        throw new CallbackException("Class {$callable[0]} or method {$callable[1]} not found");
                    }

                    return false;
                }
                if ($static_call === true) {
                    $method = new ReflectionMethod($name);
                    if (!$method->isStatic() || !$method->isPublic()) {
                        if ($raise_exception === true) {
                            throw new CallbackException("{$name} must be a public static method");
                        }

                        return false;
                    }
                }
            } elseif (!is_object($callable[0]) || !method_exists($callable[0], $callable[1])) {
                if ($raise_exception === true) {
                    $classname = get_class($callable[0]);
                    throw new CallbackException("The method '{$callable[1]}' from class '{$classname}' does not exist");
                }

                return false;
            }
            if (is_array($params)) {
                $class = new ReflectionClass($callable[0]);
                $n = $class->getMethod($callable[1])->getNumberOfRequiredParameters();
                if (count($params) < $n) {
                    if ($raise_exception === true) {
                        throw new CallbackException("{$name} require {$n} parameter(s)");
                    }

                    return false;
                }
            }
        } elseif (is_string($callable)) {
            if (function_exists($callable) === false) {
                return false;
            }
            // TODO: find a way to check function required parameters
        }

        return true;
    }

    /**
     * Call a function or a class method.
     *
     * @static
     *
     * @param callback $callable        callable function or class method
     * @param array    $params          function parameters
     * @param bool     $raise_exception does not raise a CallbackException on error if set to FALSE
     *
     * @return mixed the function result, or FALSE on error
     */
    public static function call($callable, $params = array(), $raise_exception = true)
    {
        if (self::is_callable($callable, $params, true, $raise_exception) === true) {
            return call_user_func_array($callable, $params);
        }

        return false;
    }

    private function __construct()
    {
    }
    private function __clone()
    {
    }
}
final class CallbackException extends Exception
{
}
