<?php

namespace Playmedia\Api\Entity;

class Account extends Entity
{
    protected $id;
    protected $email;
    protected $firstName;
    protected $lastName;
    protected $username;
    protected $birthdate;
    protected $gender;
    protected $isVerified;
    protected $isLocked;
    protected $createdAt;
    protected $updatedAt;
    protected $oauths = array();
    protected $subscriptions = array();
    protected $debts = array();
    protected $trialEnd;

    public function getId()
    {
        return (int) $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

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

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function getIsVerified()
    {
        return $this->isVerified;
    }

    public function setIsVerified($isVerified)
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getIsLocked()
    {
        return $this->isLocked;
    }

    public function setIsLocked($isLocked)
    {
        $this->isLocked = $isLocked;

        return $this;
    }

    public function getTrialEnd()
    {
        return $this->trialEnd;
    }

    public function setTrialEnd($trialEnd)
    {
        $this->trialEnd = $trialEnd;

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

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Return path to Facebook avatar if any, null otherwise.
     *
     * @param int $width  [description]
     * @param int $height [description]
     *
     * @return mixed
     */
    public function getAvatar($width = 106, $height = 106)
    {
        // Check fb, add access token https://graph.facebook.com/uid/picture?width={$width}&height={$height}
        if ($this->hasFacebook()) {
            return sprintf('https://graph.facebook.com/%s/picture?width=%d&height=%d', $this->oauths['facebook']['uid'], $width, $height);
        }

        return;
    }

    public function hasFacebook()
    {
        return isset($this->oauths['facebook']);
    }

    public function setOauths(array $oauths = array())
    {
        $this->oauths = $oauths;

        return $this;
    }

    /**
     * Alias of isPremium.
     *
     * @return bool
     */
    public function getIsPremium()
    {
        return $this->isPremium();
    }

    /**
     * Return true if the account is subscribed to the Premium Pack.
     *
     * @deprecated
     *
     * @return bool
     */
    public function isPremium()
    {
        foreach ($this->subscriptions as $subscription) {
            if ($subscription['product']['removesAds']) {
                return true;
            }
        }

        return false;
    }

    /**
     * Alias of isFreemium.
     *
     * @return bool
     */
    public function getIsFreemium()
    {
        return $this->isFreemium();
    }

    /**
     * Returns true if account has ONLY the freemium offer.
     *
     * @return bool
     */
    public function isFreemium()
    {
        return count($this->subscriptions) == 0;
    }

    public function setSubscriptions(array $subscriptions)
    {
        foreach ($subscriptions as $item) {
            $this->subscriptions[$item['product']['alias']] = $item;
        }

        return $this;
    }

    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    public function isSubscribedTo($productAlias)
    {
        return isset($this->subscriptions[$productAlias]);
    }

    /**
     * @param string $productType
     *
     * @return bool
     */
    public function isSubscribedToProductOfType($productType)
    {
        foreach ($this->subscriptions as $subscription) {
            if ($subscription['product']['type'] === $productType) {
                return true;
            }
        }

        return false;
    }

    public function hasSubscriptions()
    {
        return count($this->subscriptions) > 0;
    }

    public function getDebts()
    {
        return $this->debts;
    }

    public function setDebts($debts)
    {
        $this->debts = $debts;

        return $this;
    }

    public function hasPaymill()
    {
        $hasPaymill = false;

        foreach ($this->subscriptions as $subscription) {
            if ('paymill' === $subscription['gateway']) {
                $hasPaymill = true;
                break;
            }
        }

        return $hasPaymill;
    }

    public function hasTrialPeriod()
    {
        if (null === $this->trialEnd) {
            return true;
        }

        return strtotime($this->trialEnd) > time();
    }
}
