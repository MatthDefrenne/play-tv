<?php

namespace Playmedia\Api\Service;

/**
 * Service Interface.
 * Respect Guzzle contract when working with Commands.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
interface ServiceInterface
{
    /**
     * Get command.
     *
     * @param string $name Command name
     * @param array  $args Potential parameters
     *
     * @return mixed Command result
     */
    public function getCommand($name, array $args = array());
}
