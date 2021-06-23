<?php

use Playmedia\Utils\Rijndael;
use Playmedia\Api\Api;

/**
 * Contains all account methods.
 *
 * @author Phimmasone Jimmy <jimmy@playmedia.fr>
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class account_component extends ppl_component
{
    const KEY = '__ptv_account_session';

    private $api;
    private $current_account;
    private $logout_in_progress = false;

    /**
     * Construct function.
     *
     * @param Api $api
     */
    public function construct(Api $api)
    {
        $this->api = $api;
    }

    public function getApi()
    {
        return $this->api;
    }

    /**
     * Get user session information.
     *
     * @param string $key The optionnal key to return value
     *
     * @return mixed The user session as array, otherwise the value for key, otherwise NULL
     */
    public function get_account_session($session_key = null)
    {
        $sessionKey = is_null($session_key) ? static::KEY : $session_key;

        return $this->session->get($sessionKey);
    }

    /**
     * Set user session information.
     *
     * @param array $user The user session
     *
     * @return bool True if the operation succeed, false otherwise
     */
    public function set_account_session($data, $session_key = null)
    {
        $sessionKey = is_null($session_key) ? static::KEY : $session_key;

        if ($data === false) {
            return false;
        }

        $sessionData = array(
            'id' => $data['id'],
            'username' => $data['username'],
        );

        $this->session->set($sessionKey, $sessionData);

        return true;
    }

    /**
     * Delete user session.
     */
    public function delete_account_session($session_key = null)
    {
        $sessionKey = is_null($session_key) ? static::KEY : $session_key;

        $this->session->delete($sessionKey);

        return $this;
    }

    /**
     * Get user cookie information.
     *
     * @param string $key The optionnal key to return value
     *
     * @return mixed The user session as array, otherwise the value for key, otherwise NULL
     */
    public function get_account_cookie()
    {
        return $this->cookie->get(static::KEY);
    }

    /**
     * Set user account information.
     *
     * @param array $data
     *
     * @return bool True if the operation succeed, false otherwise
     */
    public function set_account_cookie($data)
    {
        if ($data === false) {
            return false;
        }

        $expiresAt = new \DateTime('NOW');
        $expiresAt->modify('+60 day');
        $expiresAt = $expiresAt->format('Y-m-d H:i:s');

        $cookie = array(
            'id' => $data['id'],
            'username' => $data['username'],
            'expiredAt' => $expiresAt,
        );

        $this->cookie->set(static::KEY, Rijndael::encrypt($cookie), time() + (60 * 60 * 24 * 60)); // Keep it 60 days

        return true;
    }

    /**
     * Delete account.
     *
     * @param array $data
     */
    public function delete_account_cookie()
    {
        $this->cookie->delete(static::KEY);

        return $this;
    }

    /**
     * Know if the user is connected.
     *
     * @return bool
     */
    public function is_connected()
    {
        // Dirty fix: prevent autologin on logout
        if ($this->logout_in_progress === true) {
            return false;
        }

        $session = $this->get_account_session();
        $cookie = $this->get_account_cookie();

        //
        // Try looking for an existing session
        //
        if (!is_null($session)) {
            // Verify integrity
            if (!isset($session['id'])) {
                $this->logout();

                return false;
            }

            if (is_null($cookie)) {
                $this->set_account_cookie($session);
            }

            return true;
        }

        //
        // No session, try looking for an existing cookie
        //
        if (!is_null($cookie)) {
            // Check with cypher
            $dataCipher = Rijndael::decrypt($cookie);

            // If don't exist, delete cookie and return false
            if (!isset($dataCipher['id']) || !isset($dataCipher['username'])) {
                $this->delete_account_cookie();

                return false;
            }

            // challenge API to know if the user exists
            $filters = array(
                'id' => $dataCipher['id'],
                'username' => $dataCipher['username'],
            );
            $accounts = $this->getApi()->accounts()->collection($filters);

            // At least one result, verifying usernames matches
            if (count($accounts) == 1) {
                $account = $accounts[0];

                if ($account['username'] == $dataCipher['username']) {
                    // Log the user in
                    $this->login($account);

                    return true;
                }

                return false;

            // If it doesn't exist, delete cookie and return false
            } else {
                $this->delete_account_cookie();

                return false;
            }
        }

        return false;
    }

    public function is_freemium()
    {
        if (false === $this->is_connected()) {
            return true;
        }

        return !$this->get_current_account()->isPremium();
    }

    public function get_id()
    {
        // Already processed
        if (null !== $this->current_account) {
            return $this->current_account['id'];
        }

        return $this->get_account_session()['id'];
    }

    /**
     * Get user informations.
     * Session -> Memcache.
     *
     * @return mixed object account on success, otherwise null
     */
    public function get_current_account()
    {
        // Already processed
        if (null != $this->current_account) {
            return $this->current_account;
        }

        $session = $this->get_account_session();
        if (is_null($session)) {
            return;
        }

        // Building account related entities
        $this->current_account = $this->build($session);

        return $this->current_account;
    }

    public function login($ptvAccount)
    {
        $this->set_account_session($ptvAccount);
        $this->set_account_cookie($ptvAccount);

        return $this;
    }

    public function logout()
    {
        $this->logout_in_progress = true;
        $this->delete_account_session();
        $this->delete_account_cookie();

        return $this;
    }

    /**
     * Build full Account entity with or without relationships.
     *
     * @param array $session
     *
     * @return array
     */
    public function build($session, $withOauth = true)
    {
        // Account entity
        $account = $this->getApi()->accounts()->show($session['id']);

        if (!$this->getApi()->getLastResponse()->isSuccessful()) {
            $this->logout();

            return;
        }

        // Subscriptions ongoing
        // Debts on going (if not freemium)
        $subscriptions = $this->getApi()->accounts()->subscriptions(array('id' => $session['id']));
        if ($this->getApi()->getLastResponse()->isSuccessful()) {
            $account->setSubscriptions($subscriptions);
        }
        if (!$account->isFreemium()) {
            $debts = $this->getApi()->accounts()->debts(['id' => $session['id']]);
            if ($this->getApi()->getLastResponse()->isSuccessful()) {
                $account->setDebts($debts);
            }
        }

        // Oauth associated (if required)
        if ($withOauth) {
            $oauths = $this->getApi()->accounts()->oauths($session['id']);

            if ($this->getApi()->getLastResponse()->isSuccessful()) {
                $temp = array();
                foreach ($oauths as $oauth) {
                    $provider = $oauth['provider'];
                    $temp[$provider] = $oauth;
                }

                $account->setOauths($temp);
                unset($temp);
            }
        }

        return $account;
    }
}
