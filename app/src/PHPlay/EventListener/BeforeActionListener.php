<?php

namespace PHPlay\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use PHPlay\Exception\RedirectException;

/**
 * Reproduces PHPlay's before_action behavior.
 * Invokes the before_action method on the controller before the action method is actually invoked.
 */
class BeforeActionListener implements EventSubscriberInterface
{
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        // If $controller is a Closure, do nothing
        if (!is_array($controller)) {
            return;
        }

        $response = call_user_func_array(array($controller[0], 'before_action'), array());

        if (null !== $response && $response instanceof Response && $response->isRedirect()) {
            // As this listener is triggered on the KernelEvents::CONTROLLER event,
            // it's too late to return a Response.
            // To short-circuit the kernel's execution flow,
            // we throw a specific Exception that will be caught by the same listener.
            throw new RedirectException($response);
        }
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof RedirectException) {
            $response = $exception->getResponse();
            $event->setResponse($response);
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => array('onKernelController', 16),
            KernelEvents::EXCEPTION => array('onKernelException'),
        );
    }
}
