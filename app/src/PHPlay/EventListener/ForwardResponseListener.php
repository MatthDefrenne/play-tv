<?php

namespace PHPlay\EventListener;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use PHPlay\Forward;

/**
 * Handles "forward" responses, i.e. when a controller delegates the action to another controller.
 * In this case the HttpKernel will be invoked again.
 */
class ForwardResponseListener implements EventSubscriberInterface
{
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $result = $event->getControllerResult();

        if ($result instanceof Forward) {
            $request = clone $event->getRequest();

            $task = $request->attributes->get('_task');
            $route = 'forwarded_from_'.$task['controller'].'_controller';

            $request->attributes->set('_task', array(
                'type' => 'controller',
                'controller' => $result->getController(),
                'action' => $result->getAction(),
                'params' => is_array($result->getParams()) ? $result->getParams() : array(),
                'class' => $result->getController().'_controller',
                'method' => $result->getAction().'_action',
                'http_code' => null,
                'redirect' => null,
                'route' => $route,
            ));
            $request->attributes->set('_controller', $result->getController().'_controller::'.$result->getAction().'_action');
            $request->attributes->set('_route', $route);

            $response = $event->getKernel()->handle($request, HttpKernelInterface::SUB_REQUEST);

            $event->setResponse($response);
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::VIEW => array('onKernelView', 128),
        );
    }
}
