<?php

namespace PlayTv\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpFoundation\Request;
use Playmedia\Sdk;
use PlayTv\Core\Website;
use PlayTv\Routing\HostResolver;

class WebsiteAttributeListener implements EventSubscriberInterface
{
    private $hostResolver;
    private $sdk;

    public function __construct(HostResolver $hostResolver, Sdk $sdk)
    {
        $this->hostResolver = $hostResolver;
        $this->sdk = $sdk;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $request = $event->getRequest();

        $website = $this->getWebsite($request);

        $request->attributes->set('website', $website);
    }

    private function getWebsite(Request $request)
    {
        $host = $request->getHost();

        $country = null;
        if (!$this->hostResolver->isDotTv($host, true) && !$this->hostResolver->isDotFr($host, true)) {
            $country = $this->hostResolver->getCountryForHost($host);
        }

        $key = $this->hostResolver->getKeyForHost($host);

        return new Website($key, $host, $country);
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => array('onKernelController', 1024),
        );
    }
}
