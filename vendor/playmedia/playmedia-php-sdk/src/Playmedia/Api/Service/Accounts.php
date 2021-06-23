<?php

namespace Playmedia\Api\Service;

/**
 * Accounts Service class.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class Accounts extends AbstractService
{
    public function oauths($accountId)
    {
        return $this->getCommand('oauths', array('accountId' => $accountId))->getResult();
    }
}
