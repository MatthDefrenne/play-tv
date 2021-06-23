<?php

/**
 *  Bouncer controller.
 *
 *  @see http://en.wikipedia.org/wiki/Bouncer_%28doorman%29
 */
class bouncer_controller extends ppl_app_controller
{
    /**
     * Register free Account action.
     */
    public function register_action()
    {
        // Ajax only
        if (!$this->request->is_ajax && false === $this->isMobileLayout()) {
            $url = '/television/?popin_register=true';

            return $this->response->redirect($url, 302);
        }

        // Render on GET request
        if ('GET' == $this->request->method) {
            $this->robots(false);

            return $this->render();
        }

        // Process on POST request
        $data = $this->request->post;

        $form = $this->getSdk()->getForm('Account\CreateForm');
        $form->submit($data);

        if (!$form->isValid()) {
            return $this->badRequestJsonResponse($form->getErrors());
        }

        $account = $this->getSdk()->getApi()->accounts()->create($form->getData());
        $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

        switch ($statusCode) {
            case 201 :
                // Sign the user in
                $this->account()->login($account);
                $data = array('isVerified' => (bool) $account['isVerified']);

                return $this->jsonResponse($data);
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
     * Register_verify action.
     */
    public function register_verify_action()
    {
        $this->robots(false);

        $inputData = $this->request->get;

        if (!isset($inputData['cipher'])) {
            return $this->createNotFoundResponse();
        }

        // Send request with SDK to API
        $parameters = array(
            'cipher' => $inputData['cipher'],
            'flow' => 'confirmation',
        );

        $account = $this->getSdk()->getApi()->accounts()->verify($parameters);

        if (200 == $this->getSdk()->getApi()->getLastResponse()->getStatusCode()) {
            // Purge account cache for a full round trip to API
            $this->getSdk()->getApi()->accounts()->purge('show', array('id' => $account['id']));

            // Sign the user in
            $this->account()->login($account);
            $url = "{$this->request->protocol}:{$this->hosts['current']}/television/?tracking_event=register";
        } else {
            $url = "{$this->request->protocol}:{$this->hosts['current']}";
        }

        return $this->response->redirect($url, 302);
    }

    /**
     * Request confirmation email.
     */
    public function request_confirmation_email_action()
    {
        // Render on GET request
        if ('GET' == $this->request->method) {
            $this->robots(false);

            return $this->render(array(
                'src' => (isset($this->request->get['src'])) ? $this->request->get['src'] : '',
                'email' => (isset($this->request->get['email'])) ? $this->request->get['email'] : '',
            ));
        }

        // Process on POST request
        $inputData = $this->request->post;

        $form = $this->getSdk()->getForm('Account\ForgotPasswordForm');
        $form->submit($inputData);

        if (!$form->isValid()) {
            return $this->badRequestJsonResponse($form->getErrors());
        }

        $this->getSdk()->getApi()->accounts()->sendVerifyEmail(array('email' => $inputData['email']));
        $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

        switch ($statusCode) {
            case 200 :
                $content = 'Nous venons tout juste de vous envoyer un email afin de confirmer votre compte. '
                         ."<strong>Rendez-vous sur votre boite mail ({$inputData['email']}) et cliquez sur le lien de validation</strong>.";
                $body = array(
                    'title' => 'Email de vérification envoyé !',
                    'content' => $content,
                );

                return $this->jsonResponse($body);
                break;

            case 400 :
                return $this->badRequestJsonResponse($this->getSdk()->getApi()->getErrors());
                break;

            case 404 :
                $errors = array(
                    'email' => "Attention, cette adresse n'est pas reconnue par playtv, veuillez vous <a href=\"/inscription/\">créer un compte</a>.",
                );

                return $this->notFoundJsonResponse($errors);
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
     * Request confirmation email.
     */
    public function request_another_confirmation_email_action()
    {
        if (null == $this->container['account']) {
            $errors = array(
                'message' => 'Une erreur est survenue. <a href="#" class="ptv-js-AccountMenuNotifier-link">Veuillez réessayer</a>.',
            );

            return $this->badRequestJsonResponse($errors);
        }

        $this->getSdk()->getApi()->accounts()->sendVerifyEmail(array('email' => $this->container['account']->getEmail()));

        if (200 === $this->getSdk()->getApi()->getLastResponse()->getStatusCode()) {
            $data = array(
                'content' => 'Un email de confirmation vous a été envoyé. <strong>Consultez votre boite mail</strong>.',
            );

            return $this->jsonResponse($data);
        } else {
            $errors = array(
                'message' => 'Une erreur est survenue. <a href="#" class="ptv-js-AccountMenuNotifier-link">Veuillez réessayer</a>.',
            );

            return $this->badRequestJsonResponse($errors);
        }
    }

    /**
     * Login action.
     */
    public function login_action()
    {
        // Ajax only
        if (!$this->request->is_ajax && false === $this->isMobileLayout()) {
            $url = '/television/?popin_login=true';

            return $this->response->redirect($url, 302);
        }

        // Render on GET request
        if ('GET' == $this->request->method) {
            $this->robots(false);

            return $this->render();
        }

        // Process on POST request
        $inputData = $this->request->post;

        $form = $this->getSdk()->getForm('Account\LoginForm');
        $form->submit($inputData);

        if (!$form->isValid()) {
            return $this->badRequestJsonResponse($form->getErrors());
        }

        // Check if login is correct
        $account = $this->getSdk()->getApi()->accounts()->authenticate($inputData);
        $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

        switch ($statusCode) {
            case 200:

                // Sign the user in
                $this->account()->login($account);
                $logged_in = $this->account()->build($account, false);

                // Refresh current page if paid account, not rendering ads
                $data = array(
                    'isVerified' => (bool) $logged_in['isVerified'],
                    'email' => urlencode($logged_in['email']),
                    'redirect' => !$logged_in->isFreemium(),
                );

                return $this->jsonResponse($data);
                break;

            case 400:
                $errors = array(
                    'email' => "Votre email/nom d'utilisateur et/ou le mot",
                    'password' => ' de passe sont erronés.',
                );

                return $this->badRequestJsonResponse($errors);
                break;

            case 404:
                $errors = array(
                    'email' => "Attention, cette adresse n'est pas reconnue par Play TV, veuillez vous <a href=\"/television/?popin_register=true\">créer un compte</a>.",
                );

                return $this->notFoundJsonResponse($errors);
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
     * Logout action.
     */
    public function logout_action()
    {
        $this->robots(false);

        // default
        $data = array(
            'redirect' => false,
        );

        // Refresh current page if paid account, re rendering ads
        if (null !== $this->container['account']) {
            $data['redirect'] = !$this->container['account']->isFreemium();
        }

        // Sign the user out
        $this->account()->logout();

        if ($this->request->is_ajax) {
            $this->jsonResponse($data);
        } else {
            $this->response->redirect("{$this->request->protocol}:{$this->hosts['current']}", 302);
        }
    }

    /**
     * Forgot password action.
     */
    public function forgot_password_action()
    {
        // Ajax only
        if (!$this->request->is_ajax && false === $this->isMobileLayout()) {
            $url = '/television/?popin_forgot_password=true';

            return $this->response->redirect($url, 302);
        }

        // Render on GET request
        if ('GET' == $this->request->method) {
            $this->robots(false);

            return $this->render(array(
                'src' => isset($this->request->get['src']) ? $this->request->get['src'] : '',
            ));
        }

        // Process on POST request
        if (null !== $this->container['account']) {
            $email = $this->container['account']->getEmail();
        } else {
            $inputData = $this->request->post;

            $form = $this->getSdk()->getForm('Account\ForgotPasswordForm');
            $form->submit($inputData);

            if (!$form->isValid()) {
                return $this->badRequestJsonResponse($form->getErrors());
            }

            $email = $inputData['email'];
        }

        $this->getSdk()->getApi()->accounts()->forgotPassword(array('email' => $email));
        $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

        switch ($statusCode) {
            case 200 :
                $data = array(
                    'title' => 'Mot de passe oublié ? Plus maintenant.',
                    'content' => 'Un email vous a été envoyé.',
                    'message' => 'Un email vous a été envoyé.',
                );

                return $this->jsonResponse($data);
                break;

            case 404 :
                $errors = array(
                    'email' => "Attention, cette adresse n'existe pas, veuillez vous <a href=\"/television/?popin_register=true\">créer un compte</a>.",
                );

                return $this->notFoundJsonResponse($errors);
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
     * Forgot password verify action.
     */
    public function forgot_password_verify_action()
    {
        $this->robots(false);

        $inputData = $this->request->get;

        if (!isset($inputData['cipher'])) {
            return $this->createNotFoundResponse();
        }

        $parameters = array(
            'cipher' => $inputData['cipher'],
            'flow' => 'forgot-password',
        );

        $account = $this->getSdk()->getApi()->accounts()->verify($parameters);

        if (200 == $this->getSdk()->getApi()->getLastResponse()->getStatusCode()) {
            // Set session
            $this->account()->set_account_session($account, '__ptv_forgot_password');
            $url = '/reinitialisation-mot-de-passe/';
        } else {
            $url = "{$this->request->protocol}:{$this->hosts['current']}";
        }

        return $this->response->redirect($url, 302);
    }

    public function reinitialize_password_action()
    {
        // Signed out account only
        if ($this->container['is_connected']) {
            $this->account()->logout();
        }

        // Reinitialize password flow only
        if (null == $this->account()->get_account_session('__ptv_forgot_password')) {
            $this->response->redirect("{$this->request->protocol}:{$this->hosts['current']}");
        }

        $this->set_page_title('Changer le mot de passe de mon compte');
        $this->set_page_description('Vous ne vous souvenez plus de votre mot de passe ? Plus maintenant.');
        $this->robots(false);

        if ('GET' == $this->request->method) {
            return $this->render();
        }

        if ('POST' == $this->request->method) {
            // Process on POST request
            $inputData = $this->request->post;

            $form = $this->getSdk()->getForm('Account\ResetPasswordForm');
            $form->submit($inputData);

            if (!$form->isValid()) {
                if ($this->request->is_ajax) {
                    return $this->badRequestJsonResponse($form->getErrors());
                } else {
                    return $this->render(array(
                        'errors' => $form->getErrors(),
                    ));
                }
            }

            $account = $this->account()->get_account_session('__ptv_forgot_password');

            $inputData['flow'] = 'forgot-password';
            $inputData['id'] = $account['id'];

            $this->getSdk()->getApi()->accounts()->changePassword($inputData);
            $statusCode = $this->getSdk()->getApi()->getLastResponse()->getStatusCode();

            $render_params = [];
            switch ($statusCode) {
                case 200 :
                    $this->account()->delete_account_session('__ptv_forgot_password');
                    $render_params['success'] = 'Votre mot de passe a bien été mis à jour. Vous pouvez vous connecter dès à présent.';
                    break;

                case 400 :
                    $render_params['errors'] = $this->getSdk()->getApi()->getErrors();
                    break;

                default :
                    $errors = array(
                        'message' => 'Une erreur est survenue. Veuillez réessayer un peu plus tard.',
                    );
                    $render_params['errors'] = $errors;
                    break;
            }

            if ($this->request->is_ajax) {
                if (isset($render_params['errors']) || isset($render_params['message'])) {
                    return $this->badRequestJsonResponse($errors);
                } else {
                    return $this->jsonResponse($render_params['success']);
                }
            }

            return $this->render($render_params);
        }
    }
}
