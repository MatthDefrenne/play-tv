<?php

namespace PHPlay\EventListener;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * When the response is returned as a string, methods called on $this->response may be ignored.
 * This listener modifies the headers & the status code of the Response created in the HttpKernel with the values stored in $this->response.
 */
class OverwriteResponseListener implements EventSubscriberInterface
{
    private $response;

    public function __construct(\ppl_core $core)
    {
        $this->response = $core->context->response;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        // do anything if it's not the master request
        if (!$event->isMasterRequest()) {
            return;
        }

        $response = $event->getResponse();
        // Replace response headers set in controller
        $headers = $this->response->headers->allPreserveCase();
        foreach ($headers as $name => $value) {
            $response->headers->set($name, $value, true);
        }

        // Change status code if different
        if ($this->response->getStatusCode() !== $response->getStatusCode()) {
            $response->setStatusCode($this->response->getStatusCode());
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::RESPONSE => array('onKernelResponse', -1024),
        );
    }
}
