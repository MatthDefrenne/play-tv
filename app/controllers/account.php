<?php

use Playmedia\Form\Account;

/**
 * Related to accounts.
 */
class account_controller extends ppl_app_controller
{
    protected $cellpass;

    public function before_action()
    {
        parent::before_action();

        // Signed in only
        if (false === $this->container['is_connected']) {
            return $this->response->redirect('/connexion/');
        }

        StubCellpass::$REDIR_TYPE = 'return';
        StubCellpass::$LOG_FILE = $this->config->path->log.'cellpass.log';
        StubCellpass::$LOG_PRIORITY_FILTER = StubCellpass_Log::INFO;

        $this->cellpass = new \StubCellpass();

        $this->robots(false);
    }

    /**
     * Profile action.
     */
    public function profile_action()
    {
        // Render on GET request
        if ('GET' == $this->request->method) {
            $render_params = [];

            // Check if there is an active subscription with gateway = cellpass
            $delete_subscriptions = false;
            foreach ($this->container['account']->getSubscriptions() as $subscription) {
                if (isset($subscription['cancelledAt']) && !$subscription['cancelledAt'] && $subscription['gateway'] == 'cellpass') {
                    $delete_subscriptions = true;
                    break;
                }
            }

            // Check if there was an error during unsubscription
            if ($message = $this->session->get_flash_message('unsubscribe_error')) {
                $render_params['error'] = $message;
            }

            $render_params['delete_subscriptions'] = $delete_subscriptions;

            $this->set_page_title('Mon compte - Profil');
            $this->set_page_description('Tous les paramètres de votre compte Play TV.');

            if ($this->container['account']->isFreemium()) {
                $render_params['suggested_products'] = $this->get_suggested_products();
            }

            return $this->render($render_params);
        }

        // Process on POST request
        $data = $this->request->post;

        $form = $this->getSdk()->getForm('Account\ModifyForm');
        $form->submit($data);

        if (!$form->isValid()) {
            return $this->badRequestJsonResponse($form->getErrors());
        }

        $account = $this->getSdk()->getApi()->accounts()->modify($this->container['account']->getId(), $form->getData());
        $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

        switch ($statusCode) {
            case 200 :
                // Purge account cache for a full round trip to API
                $this->getSdk()->getApi()->accounts()->purge('show', array('id' => $account->getId()));

                // Reset current session (if username has changed)
                $this->account()->login($account);

                return $this->jsonResponse();
                break;

            case 400 :
                return $this->badRequestJsonResponse($this->getSdk()->getApi()->getErrors());
                break;

            default :
                $errors = array(
                    'message' => 'Une erreur est survenue. Veuillez réessayer un peu plus tard.',
                );

                return $this->badRequestJsonResponse($errors);
                break;
        }
    }

    /**
     * change password action.
     */
    public function change_password_action()
    {
        // Process on POST request
        $inputData = $this->request->post;

        $form = $this->getSdk()->getForm('Account\ChangePasswordForm');
        $form->submit($inputData);

        if (!$form->isValid()) {
            return $this->badRequestJsonResponse($form->getErrors());
        }

        $inputData['id'] = $this->container['account']->getId();
        $inputData['flow'] = 'update-account';

        $this->getSdk()->getApi()->accounts()->changePassword($inputData);
        $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

        switch ($statusCode) {
            case 200 :
                return $this->jsonResponse();
                break;

            case 400 :
                return $this->badRequestJsonResponse($this->getSdk()->getApi()->getErrors());
                break;

            default :
                $errors = array(
                    'message' => 'Une erreur est survenue. Veuillez réessayer un peu plus tard.',
                );

                return $this->badRequestJsonResponse($errors);
                break;
        }
    }

    /**
     * Deactivate action.
     */
    public function delete_action()
    {
        // Delete account
        $this->getSdk()->getApi()->accounts()->destroy($this->container['account']->getId());

        if (204 == $this->getSdk()->getApi()->getLastResponse()->getStatusCode()) {
            // Sign the user out
            $this->account()->logout();
        }

        return $this->response->redirect('/');
    }

    /**
     * Subscriptions cancellation.
     */
    public function cancel_subscription_action()
    {
        if ('POST' == $this->request->method) {
            $product_id = $this->request->post['product_id'];

            // Resolve subscription gateway
            $subscription = null;
            foreach ($this->container['account']->getSubscriptions() as $s) {
                if ($s['product']['id'] == $product_id) {
                    $subscription = $s;
                    break;
                }
            }

            if (null !== $subscription) {
                switch ($subscription['gateway']) {

                    case 'cellpass' :

                        $url_ok = "{$this->request->protocol}:{$this->hosts['current']}/cellpass/callback/init-resil/";

                        $cs = $this->getSdk()->getApi()->cellpass()->subscriptions([
                            'subscription' => $subscription['id'],
                        ]);

                        if (!empty($cs) && count($cs) == 1) {
                            $subscription_id = $cs[0]['transaction']['id'];
                            $transaction_id = $this->cellpass->initResil($subscription_id, $url_ok);

                            $this->getSdk()->getApi()->cellpass()->createTransaction([
                                'id' => $transaction_id,
                                'type' => 'resil',
                                'account' => $this->container['account']->getId(),
                                'product' => $product_id,
                            ]);

                            if (!$this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
                                $this->session->set_flash_message('unsubscribe_error', "Une erreur s'est produite, veuillez réessayer plus tard.");

                                return $this->response->redirect('/mon-compte/abonnements/');
                            }

                            $redirect_url = $this->cellpass->route();

                            return $this->response->redirect($redirect_url);
                        }

                        $this->session->set_flash_message('unsubscribe_error', "Cet abonnement n'existe pas.");

                        return $this->response->redirect('/mon-compte/abonnements/');

                        break;

                    case 'paymill' :

                        $this->getSdk()->getApi()->accounts()->unsubscribe(array(
                            'account_id' => $this->container['account']->getId(),
                            'product_id' => $product_id,
                        ));

                        if ($this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
                            // Purge account subscriptions cache for a full round trip to API
                            $this->getSdk()->getApi()->accounts()->purge('subscriptions', array('id' => $this->container['account']->getId()));

                            return $this->response->redirect('/mon-compte/abonnements/');
                        }

                        break;
                }
            }
        }

        return $this->response->redirect('/mon-compte/abonnements/');
    }

    /**
     * Change credit card informations.
     */
    public function change_credit_card_infos_action()
    {
        // Render on GET request
        if ('GET' == $this->request->method) {
            $this->set_page_title('Changer vos coordonnées bancaires');

            if (false === $this->container['account']->hasPaymill()) {
                return $this->response->redirect('/mon-compte/abonnements/');
            }

            $payments = $this->getSdk()->getApi()->accounts()->payments(array(
                'id' => $this->container['account']->getId(),
            ));

            $paymill_info = !empty($payments) ? $payments[0] : null;

            // Another guard
            if (null === $paymill_info) {
                return $this->response->redirect('/mon-compte/abonnements/');
            }

            return $this->render(array(
                'paymill_info' => $paymill_info,
            ));
        }

        // Process on POST request
        $this->getSdk()->getApi()->accounts()->payment(array(
            'id' => $this->container['account']->getId(),
            'token' => $this->request->post['token'],
        ));
        $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

        switch ($statusCode) {
            case 200 :
            case 204 :
                // Refresh current page if premium account, not rendering ads
                $data = array(
                    'message' => 'Vos coordonnées bancaires ont bien été mises à jour.',
                );

                return $this->jsonResponse($data);
                break;
            case 400:
            default:
                $errors = array(
                  'message' => 'Une erreur est survenue. Veuillez réessayer un peu plus tard.',
                );

                return $this->badRequestJsonResponse($errors);
                break;
        }
    }

    public function cellpass_callback_init_resil_action()
    {
        $transaction_id = $this->request->get['transaction_id'];

        try {
            $data = $this->cellpass->end();
        } catch (\StubCellpass_Exception $e) {
            $this->session->set_flash_message('unsubscribe_error', "Nous n'avons pas pu contacter votre opérateur, veuillez réessayer plus tard.");

            return $this->response->redirect('/mon-compte/abonnements/');
        }

        if ($data['success']) {
            $transaction = $this->getSdk()->getApi()->cellpass()->modifyTransaction([
                'id' => $transaction_id,
                'success' => true,
            ]);

            if (!$this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
                $this->session->set_flash_message('unsubscribe_error', 'Votre résiliation a bien été prise en compte et sera effective dans quelques heures.');

                return $this->response->redirect('/mon-compte/abonnements/');
            }

            // Store Cellpass subscription information in database
            $subscription = $this->getSdk()->getApi()->cellpass()->modifySubscription([
                'id' => $data['subscription']['id'],
                'dateUnsub' => $data['subscription']['date_unsub'],
                'dateEffUnsub' => $data['subscription']['date_eff_unsub'],
            ]);

            if (!$this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
                $this->session->set_flash_message('unsubscribe_error', 'Votre résiliation a bien été prise en compte et sera effective dans quelques heures.');

                return $this->response->redirect('/mon-compte/abonnements/');
            }

            $this->getSdk()->getApi()->accounts()->unsubscribe(array(
                'account_id' => $this->container['account']->getId(),
                'product_id' => $transaction['product'],
            ));

            $this->getSdk()->getApi()->accounts()->purge('subscriptions', array('id' => $this->container['account']->getId()));

            return $this->response->redirect('/mon-compte/abonnements/');
        }

        $this->getSdk()->getApi()->cellpass()->modifyTransaction([
            'id' => $transaction_id,
            'customerId' => $data['customer_id'],
            'success' => false,
            'state' => $data['state'],
            'stateValue' => $data['state_value'],
            'errorCode' => $data['error_code'],
            'error' => $data['error'],
        ]);

        $this->session->set_flash_message('unsubscribe_error',
            "Votre opérateur n'a pas confirmé votre résiliation. Connectez-vous à votre compte opérateur afin de finaliser votre résiliation. ");

        return $this->response->redirect('/mon-compte/abonnements/');
    }

    public function subscriptions_action()
    {
        // Render on GET request
        if ('GET' == $this->request->method) {
            $payments = $this->getSdk()->getApi()->accounts()->payments(array(
                'id' => $this->container['account']->getId(),
            ));

            $render_params = array(
                'paymill_info' => !empty($payments) ? $payments[0] : null,
            );

            // Check if there is an active subscription with gateway = cellpass
            $delete_subscriptions = false;

            foreach ($this->container['account']->getSubscriptions() as $subscription) {
                if (isset($subscription['cancelledAt']) && !$subscription['cancelledAt'] && $subscription['gateway'] == 'cellpass') {
                    $delete_subscriptions = true;
                    break;
                }
            }

            // Check if there was an error during unsubscription
            if ($message = $this->session->get_flash_message('unsubscribe_error')) {
                $render_params['error'] = $message;
            }

            $render_params['delete_subscriptions'] = $delete_subscriptions;

            $this->set_page_title('Mon compte - Profil');
            $this->set_page_description('Tous les paramètres de votre compte Play TV.');

            if ($this->container['account']->isFreemium()) {
                $render_params['suggested_products'] = $this->get_suggested_products();
            }

            return $this->render($render_params);
        }
    }

    protected function get_suggested_products()
    {
        $products = $this->container['product.formatter']->findByType('pack');

        $keys = array_rand($products, 3);

        $suggestions = [];
        foreach ($keys as $key) {
            $suggestions[] = $products[$key];
        }

        return $suggestions;
    }

    public function notifications_action()
    {
        $accountSubscriptions = $this->getSdk()->getApi()->mailing()->subscriberCollection(array(
            'email' => $this->container['account']->getEmail(),
        ));

        $accountSubscriptions = $accountSubscriptions[0];

        $subscriptions = [];
        foreach ($accountSubscriptions['segments'] as $accountSubscription) {
            $subscriptions[$accountSubscription['id']] = $accountSubscription;
        }

        // Render on GET request
        if ('GET' == $this->request->method) {
            $segmentsCollection = $this->getSdk()->getApi()->mailing()->segmentCollection(array('is_public' => true));

            $render_params = [
                'segments' => $segmentsCollection,
                'subscriptions' => $subscriptions,
            ];

            $this->set_page_title('Mon compte - Notifications');
            $this->set_page_description('Tous les paramètres de votre compte Play TV.');

            return $this->render($render_params);
        }

        // Process on POST request
        $data = $this->request->post;

        if (isset($data['mailing'])) {
            // Add subscriptions
            foreach ($data['mailing'] as $key => $segmentId) {
                if (isset($subscriptions[$segmentId])) {
                    unset($subscriptions[$segmentId]);
                    continue;
                }

                $this->getSdk()->getApi()->mailing()->subscriberCreate(array(
                    'segment_id' => $segmentId,
                    'email' => $this->container['account']->getEmail(),
                ));
            }
        }

        // Remove subscriptions
        if (!empty($subscriptions)) {
            foreach ($subscriptions as $subscription) {
                $this->getSdk()->getApi()->mailing()->segmentUnsubscribe(array(
                    'segmentId' => $subscription['id'],
                    'subscriberId' => $accountSubscriptions['id'],
                ));
            }
        }

        $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

        switch ($statusCode) {
            case 200 :
            case 204 :
                return $this->jsonResponse();
                break;

            case 400 :
                return $this->badRequestJsonResponse($this->getSdk()->getApi()->getErrors());
                break;

            default :
                $errors = array(
                    'message' => 'Une erreur est survenue. Veuillez réessayer un peu plus tard.',
                );

                return $this->badRequestJsonResponse($errors);
                break;
        }
    }
}
