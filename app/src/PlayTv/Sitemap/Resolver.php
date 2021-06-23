<?php

namespace PlayTv\Sitemap;

class Resolver
{
    private $pathsByHost;

    public function __construct($pathsByHost)
    {
        $this->pathsByHost = $pathsByHost;
    }

    public function getPath($host)
    {
        if (isset($this->pathsByHost[$host])) {
            return $this->pathsByHost[$host];
        }

        throw new \Exception(sprintf('No path for host %s', $host));
    }
}
