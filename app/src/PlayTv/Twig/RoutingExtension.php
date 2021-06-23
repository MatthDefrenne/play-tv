<?php

namespace PlayTv\Twig;

use Symfony\Bridge\Twig\Extension\RoutingExtension as BaseRoutingExtension;
use Symfony\Component\Routing\RouterInterface;

class RoutingExtension extends BaseRoutingExtension
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
        parent::__construct($router->getGenerator());
    }

    private function filterRouteParameters($name, $parameters = array())
    {
        if ($route = $this->router->getRouteCollection()->get($name)) {
            $pathVariables = $route->compile()->getPathVariables();
            if (isset($parameters['channel_id'])  && !in_array('channel_id', $pathVariables)) {
                unset($parameters['channel_id']);
            }
        }

        return $parameters;
    }

    public function getPath($name, $parameters = array(), $relative = false)
    {
        $parameters = $this->filterRouteParameters($name, $parameters);

        return parent::getPath($name, $parameters, $relative);
    }

    public function getUrl($name, $parameters = array(), $schemeRelative = false)
    {
        $parameters = $this->filterRouteParameters($name, $parameters);

        return parent::getUrl($name, $parameters, $schemeRelative);
    }
}
