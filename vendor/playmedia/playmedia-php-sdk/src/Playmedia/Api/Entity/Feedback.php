<?php

namespace Playmedia\Api\Entity;

use Carbon\Carbon;

class Feedback extends Entity
{
    protected $id;
    protected $ipAddress;
    protected $app;
    protected $email;
    protected $browser;
    protected $countryId;
    protected $os;
    protected $isp;
    protected $adblock;
    protected $flashVersion;
    protected $debug;

    protected $status;
    protected $createdAt;

    protected $account = null;
    protected $messages = array();
    protected $tags = array();

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function getApp()
    {
        return $this->app;
    }

    public function setApp($app)
    {
        $this->app = $app;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getBrowser()
    {
        return $this->browser;
    }

    public function setBrowser($browser)
    {
        $this->browser = $browser;

        return $this;
    }

    public function getCountryId()
    {
        return $this->countryId;
    }

    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    public function getOs()
    {
        return $this->os;
    }

    public function setOs($os)
    {
        $this->os = $os;

        return $this;
    }

    public function getIsp()
    {
        return $this->isp;
    }

    public function setIsp($isp)
    {
        $this->isp = $isp;

        return $this;
    }

    public function getAdblock()
    {
        return $this->adblock;
    }

    public function setAdblock($adblock)
    {
        $this->adblock = $adblock;

        return $this;
    }

    public function getFlashVersion()
    {
        return $this->flashVersion;
    }

    public function setFlashVersion($flashVersion)
    {
        $this->flashVersion = $flashVersion;

        return $this;
    }

    public function getDebug()
    {
        return $this->debug;
    }

    public function setDebug($debug)
    {
        $this->debug = $debug;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function setMessages($messages)
    {
        $this->messages = $messages;

        return $this;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    public function getDateDiff()
    {
        $createdAt = new Carbon($this->getCreatedAt());

        return $createdAt->diffForHumans();
    }
}
