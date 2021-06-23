<?php

namespace PlayTv\Core\Channel;

use PlayTv\Core\WebsiteAwareInterface;
use PlayTv\Core\Website;

class Channel implements WebsiteAwareInterface
{
    private $id;
    private $alias;
    private $country;
    private $website;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->alias = $data['alias'];
        $this->country = $data['country'];
        $this->website = $data['_website'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function hasWebsite()
    {
        return null !== $this->website;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function belongsToWebsite(Website $website)
    {
        if (null === $this->website) {
            return false;
        }

        return $this->website->equals($website);
    }
}
