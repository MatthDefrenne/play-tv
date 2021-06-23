<?php

/**
 * Related to oauth action.
 * Handle login/register with third parties.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class oauth_controller extends ppl_app_controller
{
    public function facebook_connect_action()
    {
        $incomingFacebookData = $this->request->post;
        if (count($incomingFacebookData) == 0) {
            // No POST data
            return $this->doError('Une erreur est survenue. Veuillez réessayer un peu plus tard.');
        }

        // Sanitize incoming data from Facebook, choosing only what we need
        $inputData = array(
            'userID' => $incomingFacebookData['userID'],
            'signedRequest' => $incomingFacebookData['signedRequest'],
            'accessToken' => $incomingFacebookData['accessToken'],
            'expiresIn' => $incomingFacebookData['expiresIn'],
        );

        if (true == $this->doAssociateFacebook($this->container['account']->getId(), $inputData)) {
            // Purge account oauths cache for a full round trip to API
            $this->getSdk()->getApi()->accounts()->purge('oauths', array('id' => $this->container['account']->getId()));

            return $this->doSuccess();
        } else {
            // API unavailable
            return $this->doError('Une erreur est survenue. Veuillez réessayer un peu plus tard.');
        }
    }

    /**
     * Handle Facebook third party login/associate/register.
     */
    public function facebook_action()
    {
        if ($this->container['is_connected']) {
            return $this->doSuccess();
        } // Logged out only

        $incomingFacebookData = $this->request->post;
        if (count($incomingFacebookData) == 0) {
            // No POST
            return $this->doError('Une erreur est survenue. Veuillez réessayer un peu plus tard.');
        }

        if (!isset($incomingFacebookData['email']) || $incomingFacebookData['email'] == '') {
            // No email
            return $this->doError('Nous avons besoin de votre adresse email pour créer un compte Play TV.');
        }

        if (!isset($incomingFacebookData['gender']) || $incomingFacebookData['gender'] == '') {
            $incomingFacebookData['gender'] = 'male';
        }

        // @see https://developers.facebook.com/docs/facebook-login/permissions#reference
        // Sanitize incoming data from Facebook, choosing only what we need
        $inputData = array(
            'id' => $incomingFacebookData['id'],
            'firstName' => $incomingFacebookData['first_name'],
            'lastName' => $incomingFacebookData['last_name'],
            'username' => mb_strtolower($incomingFacebookData['first_name'].$incomingFacebookData['last_name']),
            'gender' => $incomingFacebookData['gender'],
            'verified' => true,
            'email' => $incomingFacebookData['email'],
            'userID' => $incomingFacebookData['userID'],
            'signedRequest' => $incomingFacebookData['signedRequest'],
            'accessToken' => $incomingFacebookData['accessToken'],
            'expiresIn' => $incomingFacebookData['expiresIn'],
        );

        $oauthCredentials = array(
            'provider' => 'facebook',
            'uid' => $inputData['userID'],
        );

        $account = $this->getSdk()->getApi()->oauths()->authenticate($oauthCredentials);
        $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

        switch ($statusCode) {
            case 200 :

                // PTV account associated to Facebook found so login
                $this->account()->login($account);
                $logged_in = $this->account()->build($account, false);

                return $this->doSuccess(array(
                    'flow' => 'login',
                    'redirect' => !$logged_in->isFreemium(),
                ));
                break;

            case 404 :

                // Find an existing ptv account with Facebook user email
                $accounts = $this->getSdk()->getApi()->accounts()->collection(array('email' => $inputData['email']));

                // At least one result, verifying email adresses matches
                if (count($accounts) == 1) {
                    // TODO : verify account isLocked = false before associating
                    // Associate Facebook to account
                    $associatedAccount = $accounts[0];

                    if ($this->doAssociateFacebook($associatedAccount['id'], $inputData)) {
                        $this->get_logger('account', true)->notice(
                            sprintf("> ptv API associate is '%s', next step is login",
                                'successful'
                            )
                        );
                    } else {
                        $this->get_logger('account', true)->notice(
                            sprintf("> ptv API associate is '%s', next step is login anyway",
                                'error'
                            )
                        );
                    }

                    $this->account()->login($associatedAccount);
                    $logged_in = $this->account()->build($account, false);

                    return $this->doSuccess(array(
                        'flow' => 'associate',
                        'redirect' => !$logged_in->isFreemium(),
                    ));

                // No results, ceate a new account
                } else {
                    if ($createdAccount = $this->doRegisterFacebook($inputData)) {
                        $this->account()->login($createdAccount);

                        // New account, can't have subscriptions so no redirect
                        return $this->doSuccess(array(
                            'flow' => 'register',
                            'redirect' => false,
                        ));
                    } else {
                        return $this->doError('Une erreur est survenue. Veuillez réessayer un peu plus tard.');
                    }
                }
                break;

            default :

                // API unavailable
                return $this->doError('Une erreur est survenue. Veuillez réessayer un peu plus tard.');
                break;
        }
    }

    protected function doSuccess(array $data = array())
    {
        return $this->jsonResponse($data);
    }

    protected function doError($message)
    {
        $error = array(
            'message' => $message,
        );

        return $this->badRequestJsonResponse($error);
    }

    protected function doAssociateFacebook($accountId, array $inputData)
    {
        $oauthData = array(
            'accountId' => $accountId,
            'provider' => 'facebook',
            'uid' => $inputData['userID'],
            'token' => $inputData['accessToken'],
        );

        $this->getSdk()->getApi()->oauths()->create($oauthData);
        if (201 != $this->getSdk()->getApi()->getLastResponse()->getStatusCode()) {
            return false;
        } else {
            return true;
        }
    }

    protected function doRegisterFacebook(array $inputData)
    {
        $accountData = array(
            'email' => $inputData['email'],
            'password' => uniqid(),
            'firstName' => $inputData['firstName'],
            'lastName' => $inputData['lastName'],
            'username' => $inputData['username'],
            'gender' => $inputData['gender'],
        );

        $oauthData = array(
            'provider' => 'facebook',
            'uid' => $inputData['userID'],
            'token' => $inputData['accessToken'],
        );

        $accountData['oauths'] = $oauthData;

        $account = $this->getSdk()->getApi()->accounts()->create($accountData);
        if (201 == $this->getSdk()->getApi()->getLastResponse()->getStatusCode()) {
            return $account;
        } else {
            return false;
        }
    }
}
