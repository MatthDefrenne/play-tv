<?php
/**
 * PHPlay Framework.
 *
 * Event dispatcher
 *
 * For callback type, see PHP documentation at : http://fr.php.net/manual/en/language.pseudo-types.php#language.types.callback
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.4
 */
final class ppl_event_dispatcher
{
    private $observers;
    private $oh_index;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->observers = array();
        $this->oh_index = 0;
    }

    /**
     * Trigger an event
     * (Notify event to all binded observers).
     *
     * @param ppl_event $event event object
     *
     * @return int count of successfull callback call
     */
    public function trigger(ppl_event $event)
    {
        $event_name = $event->get_name();
        $r = 0;
        if (isset($this->observers[$event_name])) {
            $observers = &$this->observers[$event_name];
            foreach ($observers as $handler => $observer) {
                if ($observer[2] > 0) {
                    $calls = &$this->observers[$event_name][$handler][1];
                    if ($calls === $observer[2]) {
                        unset($this->observers[$event_name][$handler]);
                        continue;
                    }
                    ++$calls;
                }
                $event->attach('oh', $handler);
                if (ppl_callback::call($observer[0], array($event)) !== false) {
                    ++$r;
                }
            }
        }

        return $r;
    }

    /**
     * Create an event object.
     *
     * @param string $event_name event name
     *
     * @return ppl_event the instantiated event
     */
    public function create_event($event_name)
    {
        return new ppl_event($event_name);
    }

    /**
     * Bind to an event
     * (add an observer).
     *
     * @param string   $event_name event name
     * @param callback $callable   function name (string variable) or an object with method name like array($obj, 'method_name')
     * @param int      $tc         trigger count before auto-unbind listener (zero is never unbind which is default)
     *
     * @return int observer handler
     */
    public function bind($event_name, $callable, $tc = 0)
    {
        if (is_callable($callable, true)) {
            // syntax only

            $handler = $this->oh_index;
            ++$this->oh_index;
            $this->observers[$event_name][$handler] = array($callable, 0, $tc);

            return $handler;
        }
        throw new EventException('callback content is not callable');
    }

    /**
     * Unbind from an event
     * (remove an observer).
     *
     * @param int $handler the observer handler
     *
     * @return bool true on success, or false on error
     */
    public function unbind($handler)
    {
        if (is_int($handler)) {
            foreach ($this->observers as $event => $callables) {
                if (isset($callables[$handler])) {
                    unset($this->observers[$event][$handler]);

                    return true;
                }
            }
        }

        return false;
    }

    private function __clone()
    {
    }
}
final class EventException extends Exception
{
}
