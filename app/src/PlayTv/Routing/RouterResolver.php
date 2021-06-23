<?php

namespace PlayTv\Routing;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\RequestContext;
use Psr\Log\LoggerInterface;

class RouterResolver
{
    private $path;
    private $filesByHost = [];
    private $hostResolver;
    private $cacheDir;
    private $logger;

    public function __construct($path, array $filesByHost, HostResolver $hostResolver, $cacheDir = null, LoggerInterface $logger = null)
    {
        $this->path = $path;
        $this->filesByHost = $filesByHost;
        $this->hostResolver = $hostResolver;
        $this->cacheDir = $cacheDir;
        $this->logger = $logger;
    }

    public function getFile($host)
    {
        if (isset($this->filesByHost[$host])) {
            return $this->filesByHost[$host];
        }

        return;
    }

    public function getLoader()
    {
        $locator = new FileLocator(array($this->path));

        return new YamlFileLoader($locator);
    }

    public function getRouter($host, Request $request = null)
    {
        $options = [
            'generator_cache_class' => $this->getGeneratorCacheClass($host),
            'matcher_cache_class' => $this->getMatcherCacheClass($host),
        ];
        if (null !== $this->cacheDir) {
            $options['cache_dir'] = $this->cacheDir.'/'.$host;
        }

        $requestContext = null;
        if (null !== $request) {
            $requestContext = new RequestContext();
            $requestContext->fromRequest($request);
        }

        if (!$file = $this->getFile($host)) {
            throw new \InvalidArgumentException("No router for host {$host}");
        }

        return new Router(
            $this->getLoader(),
            $file,
            $options,
            $requestContext,
            $this->logger
        );
    }

    public function getRouters()
    {
        $routers = array();
        foreach ($this->hostResolver->getAllHosts() as $host) {
            $routers[$host] = $this->getRouter($host);
        }

        return $routers;
    }

    private function getGeneratorCacheClass($host)
    {
        $pieces = explode('.', $host);
        $pieces = array_map('ucfirst', $pieces);

        return implode('Dot', $pieces).'UrlGenerator';
    }

    private function getMatcherCacheClass($host)
    {
        $pieces = explode('.', $host);
        $pieces = array_map('ucfirst', $pieces);

        return implode('Dot', $pieces).'UrlMatcher';
    }
}
