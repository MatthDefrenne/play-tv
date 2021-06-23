<?php

namespace PHPlay\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;

class RouterListener implements EventSubscriberInterface
{
    private $requestDispatcher;

    public function __construct(\ppl_core $core)
    {
        $this->requestDispatcher = new \ppl_request_dispatcher($core);
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        if ($request->attributes->has('_task')) {
            // routing is already done
            return;
        }

        $task = $this->requestDispatcher->request($request->getPathInfo());

        // This is a redirect route
        if (isset($task['redirect'])) {
            $status = isset($task['http_code']) ? $task['http_code'] : 302;
            $event->setResponse(Response::create('', $status, ['Location' => $task['redirect']]));

            return;
        }

        $request->attributes->set('_task', $task);
        $request->attributes->set('_controller', $task['class'].'::'.$task['method']);
        $request->attributes->set('_route', $task['route']);
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => array(array('onKernelRequest', 32)),
        );
    }
}
