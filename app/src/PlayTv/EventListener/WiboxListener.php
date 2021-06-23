<?php

namespace PlayTv\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;

class WiboxListener implements EventSubscriberInterface
{
    private $partners;
    private $host;

    public function __construct(\partners_component $partners, $host)
    {
        $this->partners = $partners;
        $this->host = $host;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->getRequest()->isXmlHttpRequest() && $this->partners->is_wibox()) {
            $location = sprintf('%s%s', $this->host, $event->getRequest()->getPathInfo());
            $event->setResponse(Response::create('', 302, ['Location' => $location]));
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => array(array('onKernelRequest', 64)),
        );
    }
}
