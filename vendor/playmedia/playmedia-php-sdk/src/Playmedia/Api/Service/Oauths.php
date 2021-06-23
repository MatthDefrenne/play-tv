<?php

namespace Playmedia\Api\Service;

/**
 * Oauths Service class.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class Oauths extends AbstractService
{
    public function facebook($accountId)
    {
        return $this->getCommand('facebook', array('accountId' => $accountId))->getResult();
    }
}
