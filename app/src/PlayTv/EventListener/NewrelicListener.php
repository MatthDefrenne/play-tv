<?php

namespace PlayTv\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class NewrelicListener implements EventSubscriberInterface
{
    private $isEnabled = false;
    private $stack;

    public function __construct(\SplStack $stack)
    {
        $this->stack = $stack;
        $this->isEnabled = extension_loaded('newrelic');
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        if (!$this->isEnabled) {
            return;
        }

        $controller = $event->getController();

        $class = $controller[0];
        $method = $controller[1];

        if (is_object($class)) {
            $class = get_class($class);
        }

        $class = str_replace('_controller', '', $class);
        $method = str_replace('_action', '', $method);

        newrelic_name_transaction("/{$class}/{$method}");
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        if (!$this->isEnabled) {
            return;
        }

        while (!$this->stack->isEmpty()) {
            list($name, $value) = $this->stack->shift();
            newrelic_add_custom_parameter($name, $value);
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => array('onKernelController'),
            KernelEvents::RESPONSE => array('onKernelResponse', 512),
        );
    }
}
