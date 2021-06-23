<?php

namespace PlayTv\Meta;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Exception\MissingMandatoryParametersException;
use Playmedia\Sdk;
use Playmedia\Utils\Tool as Utils;
use PlayTv\Routing\HostResolver;
use PlayTv\Routing\RouterResolver;

class AlternateLinkGenerator
{
    private $hostResolver;
    private $routerResolver;
    private $sdk;

    public function __construct(HostResolver $hostResolver, RouterResolver $routerResolver, Sdk $sdk)
    {
        $this->hostResolver = $hostResolver;
        $this->routerResolver = $routerResolver;
        $this->sdk = $sdk;
    }

    private function resolveParameters(Route $route, Request $request, array $parameters)
    {
        $pathVariables = $route->compile()->getPathVariables();

        if (in_array('channel_id', $pathVariables) && isset($parameters['channel_alias']) && !isset($parameters['channel_id'])) {
            $channelComponent = $this->sdk['services.channel'];
            if ($channel = $channelComponent->show(Utils::slugify($parameters['channel_alias']))) {
                $parameters['channel_id'] = $channel['id'];
            }
        }

        if (in_array('group_id', $pathVariables)) {
            $groupComponent = $this->sdk['services.group'];
            if ($group = $groupComponent->show($parameters['group_id'])) {
                $typeAlias = $route->getOption('type_alias');
                $typeAliasDefault = $route->getOption('type_alias_default');
                $parameters['type_alias'] = isset($typeAlias[$group['type_id']]) ? $typeAlias[$group['type_id']] : $typeAliasDefault;
            }
        }

        return array_intersect_key($parameters, array_flip($pathVariables));
    }

    public function getLinks(Request $request)
    {
        $links = [];
        foreach ($this->routerResolver->getRouters() as $host => $router) {
            if ($host === $request->getHost()) {
                continue;
            }

            if ($link = $this->getLink($request, $host)) {
                $locale = $this->hostResolver->getLocaleForHost($host);
                $links[$locale] = $link;
            }
        }

        return $links;
    }

    public function getLink(Request $request, $host)
    {
        $routeName = $request->attributes->get('_route');
        $routeParams = $request->attributes->get('_route_params', []);

        $router = $this->routerResolver->getRouter($host);

        if (null === $router) {
            throw new \LogicException("No router for host {$host}");
        }

        $generator = $router->getGenerator();
        $routeCollection = $router->getRouteCollection();
        $route = $routeCollection->get($routeName);

        // No route found
        if (null === $route) {
            return;
        }

        try {
            // Change the host of the generator for absolute URLs to work allowing scheme://domain+uri
            $generator->getContext()->setHost($host);

            return $generator->generate($routeName, $this->resolveParameters($route, $request, $routeParams), UrlGeneratorInterface::ABSOLUTE_URL);
        } catch (MissingMandatoryParametersException $e) {
            // TODO Log error
        }
    }
}
