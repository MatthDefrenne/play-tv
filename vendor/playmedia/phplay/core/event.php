<?php
/**
 * PHPlay Framework.
 *
 * Event class
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.3
 */
final class ppl_event
{
    private $name;

    /**
     * Constructor.
     *
     * @param string $event_name the event name
     */
    public function __construct($event_name)
    {
        $this->set_name($event_name);
    }

    /**
     * Attach a property to event
     * (Set by reference).
     *
     * @param string $name     the name of the event property
     * @param mixed  $property the property can be an object, an array, a string or a numeric value
     *
     * @return bool true on success, or false on error
     */
    public function attach($name, $property)
    {
        if (!is_string($name) || ($name === '')) {
            throw new EventException('Event property name must be a non-empty string');
        }
        if (is_object($property)) {
            $this->$name = $property;

            return true;
        } elseif (is_array($property) || is_string($property) || is_numeric($property)) {
            $this->$name = &$property;

            return true;
        }

        return false;
    }

    /**
     * Set event name.
     *
     * @param string $event_name the event name
     */
    public function set_name($event_name)
    {
        if (!is_string($event_name) || ($event_name === '')) {
            throw new EventException('Event name must be a non-empty string');
        }
        $this->name = $event_name;
    }

    /**
     * Get event name.
     *
     * @return string the event name
     */
    public function get_name()
    {
        return $this->name;
    }

    private function __clone()
    {
    }
}
