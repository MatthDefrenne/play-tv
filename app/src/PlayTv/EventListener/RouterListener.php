<?php

namespace PlayTv\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\EventListener\RouterListener as BaseRouterListener;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\RequestStack;

class RouterListener extends BaseRouterListener
{
    public function __construct(Router $router, LoggerInterface $logger = null, RequestStack $requestStack = null)
    {
        parent::__construct($router->getMatcher(), $router->getContext(), $logger, $requestStack);
    }
}
