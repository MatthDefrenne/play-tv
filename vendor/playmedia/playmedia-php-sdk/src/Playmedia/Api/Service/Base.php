<?php

namespace Playmedia\Api\Service;

use Playmedia\Api\Api;

/**
 * Default Service class.
 * Acts as a base, avoiding creating unecessary dedicated Service class.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class Base extends AbstractService
{
    protected $api;
    protected $serviceName;

    public function __construct(Api $api, $serviceName)
    {
        $this->api = $api;
        $this->serviceName = $serviceName;
    }

    public function buildCommandName($name)
    {
        $commandName = sprintf('%s.%s', lcfirst($this->serviceName), $name);

        return $commandName;
    }
}
