<?php

namespace PlayTv\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use PlayTv\Core\Channel\ChannelManager;

class ChannelAttributeListener implements EventSubscriberInterface
{
    private $channelManager;
    private static $blacklist = [
        'player_embed' => true,
    ];

    public function __construct(ChannelManager $channelManager)
    {
        $this->channelManager = $channelManager;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $request = $event->getRequest();

        // WebsiteAttributeListener is not registered
        if (!$request->attributes->has('website')) {
            return;
        }

        // channel_id and channel_alias not found in matched route
        if (false === $request->attributes->has('channel_id') && false === $request->attributes->has('channel_alias')) {
            return;
        }

        // blacklisted route bc controller is handling 404 locally
        if (isset(self::$blacklist[$request->attributes->get('_route')])) {
            return;
        }

        // matched route allows null
        $identifier = null;
        if (null !== $request->attributes->get('channel_id')) {
            $identifier = $request->attributes->get('channel_id');
            $method = 'find';
        } else {
            $identifier = $request->attributes->get('channel_alias');
            $method = 'findByAlias';
        }
        if (null === $identifier) {
            return;
        }

        // invalid channel
        if (!$channel = $this->channelManager->$method($identifier)) {
            throw new NotFoundHttpException(sprintf('Channel identifier "%s" does not exist', $identifier));
        }

        // all clear, define in current request
        $request->attributes->set('channel', $channel);
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => ['onKernelController'],
        );
    }
}
