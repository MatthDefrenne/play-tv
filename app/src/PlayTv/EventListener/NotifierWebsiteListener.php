<?php

namespace PlayTv\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpFoundation\Request;
use PlayTv\Core\Website;

class NotifierWebsiteListener implements EventSubscriberInterface
{
    private $hostResolver;
    private $alternateLinkGenerator;

    public function __construct($hostResolver, $alternateLinkGenerator)
    {
        $this->hostResolver = $hostResolver;
        $this->alternateLinkGenerator = $alternateLinkGenerator;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $request = $event->getRequest();

        // already displayed banner
        if ($request->cookies->has('__ptv_disable_notifier_website')) {
            return;
        }

        // if no public ip or undefined country, quit. otherwise, keep diving
        $clientCountryCode = $request->headers->get('x-geoip-country-code');
        if (null === $clientCountryCode) {
            return;
        }

        // if no host for that country, quit. otherwise, keep diving
        // available for FR, UK
        $hostForCountry = ('FR' === $clientCountryCode) ? $this->hostResolver->getDotFrHost() : $this->hostResolver->getHostForCountry($clientCountryCode);
        if (null === $hostForCountry) {
            return;
        }

        // if matches current host, quit. otherwise, keep diving
        if ($request->getHost() === $hostForCountry) {
            return;
        }

        // clone current request
        // generate absolute url website to home page
        $subRequest = clone $request;
        $subRequest->attributes->set('_route', 'homepage');

        $url = $this->alternateLinkGenerator->getLink($subRequest, $hostForCountry);

        $localeForHost = $this->hostResolver->getLocaleForHost($hostForCountry);

        $notifierWebsite = [
            'country' => $clientCountryCode,
            'locale' => $localeForHost,
            'url' => $url,
        ];

        $request->attributes->set('notifier_website', $notifierWebsite);
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => array('onKernelController', -10),
        );
    }
}
