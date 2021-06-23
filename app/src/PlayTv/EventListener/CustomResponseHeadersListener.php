<?php

namespace PlayTv\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class CustomResponseHeadersListener implements EventSubscriberInterface
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $request = $event->getRequest();
        $response = $event->getResponse();

        if ($response->isRedirection()) {
            return;
        }

        $ipAddress = $request->server->get('SERVER_ADDR');
        $node = (int) substr($ipAddress, (strrpos($ipAddress, '.') + 1));
        $node = $node - 10;

        $response->headers->set('X-PTV-Node', $node);

        if ('GET' === $request->getMethod()) {

            // Mobile Friendly
            // @see https://developers.google.com/webmasters/mobile-sites/mobile-seo/configurations/dynamic-serving
            if ($request->attributes->has('mobile_friendly') && true === $request->attributes->get('mobile_friendly')) {
                $response->headers->set('Vary', 'User-Agent');
            }

            $response->headers->set('Content-Language', $request->attributes->get('_locale'));
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::RESPONSE => array('onKernelResponse', 512),
        );
    }
}
