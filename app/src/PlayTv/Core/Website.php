<?php

namespace PlayTv\Core;

class Website
{
    private $key;
    private $host;
    private $country;

    public function __construct($key, $host, $country = null)
    {
        $this->key = $key;
        $this->host = $host;
        $this->country = $country;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function equals(Website $website)
    {
        return $website->getCountry() === $this->country && $website->getHost() === $this->host;
    }

    /**
     * Restore object properly when unserialized.
     */
    public static function __set_state($properties)
    {
        return new self($properties['host'], $properties['country']);
    }
}
