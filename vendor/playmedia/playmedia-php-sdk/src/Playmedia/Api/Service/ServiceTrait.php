<?php

namespace Playmedia\Api\Service;

/**
 * Trait Interface.
 * Declare availables services.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
trait ServiceTrait
{
    public function feedbacks()
    {
        return $this->getService('feedbacks');
    }

    public function accounts()
    {
        return $this->getService('accounts');
    }

    public function oauths()
    {
        return $this->getService('oauths');
    }

    public function carts()
    {
        return $this->getService('carts');
    }

    public function products()
    {
        return $this->getService('products');
    }

    public function channels()
    {
        return $this->getService('channels');
    }

    public function config()
    {
        return $this->getService('config');
    }

    public function cellpass()
    {
        return $this->getService('cellpass');
    }

    public function streams()
    {
        return $this->getService('streams');
    }

    public function mailing()
    {
        return $this->getService('mailing');
    }
}
