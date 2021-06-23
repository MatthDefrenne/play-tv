<?php

namespace PHPlay\Component;

class Loader
{
    private $context;

    public function __construct(\ppl_context $context)
    {
        $this->context = $context;
    }

    public function load($name)
    {
        $class = "{$name}_component";
        $parents = class_parents($class, true);
        if (!isset($parents['ppl_component'])) {
            throw new \Exception("Component '{$name}' must be a children of ppl_component class");
        }

        $component = new $class($this, $this->context);

        if (method_exists($component, 'construct')) {
            $args = func_get_args();
            unset($args[0]);

            call_user_func_array(array($component, 'construct'), $args);
        }

        return $component;
    }
}
