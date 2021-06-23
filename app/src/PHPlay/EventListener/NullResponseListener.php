<?php

namespace PHPlay\EventListener;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Handles null responses, i.e. when a controller doesn't return $this->response via the action method.
 */
class NullResponseListener implements EventSubscriberInterface
{
    private $core;

    public function __construct(\ppl_core $core)
    {
        $this->core = $core;
    }

    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $response = $event->getControllerResult();

        // No response was returned by controller: grab it from $core object
        if (null === $response) {
            $event->setResponse($this->core->context->response);
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::VIEW => array('onKernelView', 32),
        );
    }
}
