<?php

namespace PlayTv\EventListener\Seo;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class BelongsToWebsiteListener implements EventSubscriberInterface
{
    public function onKernelController(FilterControllerEvent $event)
    {
        $request = $event->getRequest();

        // do anything if it's not the master request
        if (!$event->isMasterRequest()) {
            return;
        }

        if (!$request->attributes->has('website') || !$request->attributes->has('channel')) {
            return;
        }

        $website = $request->attributes->get('website');
        $channel = $request->attributes->get('channel');

        /*
         * $controller passed can be either a class or a Closure.
         * This is not usual in Symfony but it may happen.
         * If it is a class, it comes in array format
         */
        $controller = $event->getController();
        if (!is_array($controller)) {
            return;
        }

        // The browsed website is not tied to a country (play.tv & playtv.fr)
        // It should display BUT send meta "robots" with "noindex" in order to deindex from Google instead of
        // 404ing
        if (null === $website->getCountry()) {
            if ($channel->hasWebsite()) {
                $controller[0]->robots(false);
            }
        }

        // The browsed website is tied to a country
        // It should only display channels belonging to it
        if (null !== $website->getCountry()) {
            if (!$channel->belongsToWebsite($website)) {
                $controller[0]->robots(false);
            }
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => array('onKernelController'),
        );
    }
}
