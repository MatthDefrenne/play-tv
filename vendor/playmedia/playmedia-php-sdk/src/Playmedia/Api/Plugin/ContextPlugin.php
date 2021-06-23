<?php

namespace Playmedia\Api\Plugin;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Guzzle\Common\Event;

/**
 * ContextPlugin.
 *
 * This plugin runs before a command is sent and adds useful headers for the API.
 *
 * @author Alexandre Segura <alexandre.segura@playmedia.fr>
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class ContextPlugin implements EventSubscriberInterface
{
    protected $context;

    public function __construct($context)
    {
        $this->context = $context;
    }

    public static function getSubscribedEvents()
    {
        return array('command.before_send' => 'onCommandBeforeSend');
    }

    public function onCommandBeforeSend(Event $event)
    {
        $command = $event['command'];
        $request = $command->getRequest();

        $request->addHeader('Content-Language', $this->context['context.contentLanguage']);
        $request->addHeader('X-Client-IP', $this->context['context.clientIp']);
        $request->addHeader('X-Client-App', $this->context['context.app']);
    }
}
