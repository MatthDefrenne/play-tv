<?php

namespace PlayTv\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;

class AdblockerListener implements EventSubscriberInterface
{
    private $resolver;
    private $ignoredControllerClasses = [
        'television_controller',
        'url_controller',
    ];

    public function __construct(ControllerResolverInterface $resolver)
    {
        $this->resolver = $resolver;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $request = $event->getRequest();
        $controller = $event->getController();

        if ($event->getRequest()->query->has('adb') && 'GET' === $event->getRequest()->getMethod() && !$event->getRequest()->isXmlHttpRequest()) {
            $controllerClass = get_class($controller[0]);

            if (in_array($controllerClass, $this->ignoredControllerClasses)) {
                return;
            }

            $request = $event->getRequest()->duplicate(null, null, array('_controller' => 'adblock_controller::index_action'));
            $event->setController($this->resolver->getController($request));
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => array('onKernelController', 0),
        );
    }
}
