<?php

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use PlayTv\Sales\Cart;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class order_controller extends ppl_app_controller
{
    protected $cart;
    protected $paymentGateways = [];
    protected $cellpass;
    protected $operator;

    public function before_action()
    {
        parent::before_action();

        if (null === ($cart = $this->session->get('cart'))) {
            $cart = new Cart();
            $this->session->set('cart', $cart);
        }

        $this->cart = $cart;

        if (isset($this->request->get['return_url'])) {
            $this->session->set_flash_message('order_return_url', $this->request->get['return_url']);
        }

        $this->set_skin('light');

        // Check if logged customer; if subscribed to product, redirect
        $isSubscribedTo = false;
        if (false === $this->cart->isEmpty() && null !== $this->container['account']) {
            foreach ($this->cart->getProducts() as $product) {
                if (true === $this->container['account']->isSubscribedTo($product['alias'])) {
                    $isSubscribedTo = true;
                    break;
                }
            }
        }

        if (true === $isSubscribedTo) {
            $this->cart->clear();

            return $this->response->redirect('/commande/status/');
        }

        $this->paymentGateways = $this->get_payment_gateways();

        StubCellpass::$REDIR_TYPE = 'return';
        StubCellpass::$LOG_FILE = $this->config->path->log.'cellpass.log';
        StubCellpass::$LOG_PRIORITY_FILTER = StubCellpass_Log::INFO;

        $this->cellpass = new \StubCellpass();

        $this->robots(false);
    }

    private function get_payment_gateways()
    {
        $gatewayNames = $this->container['sales.payment.gateway_resolver']->getGateways($this->cart, $this->container['account']);

        $gatewayValues = [
            'paymill' => 'Carte bancaire',
            'paypal' => 'Paypal',
            'cellpass' => 'Facture opérateur',
        ];

        $gateways = [];
        foreach ($gatewayNames as $gatewayName) {
            $gateways[$gatewayName] = $gatewayValues[$gatewayName];
        }

        return $gateways;
    }

    private function get_operator($operator)
    {
        $patterns = [
            'bouygues',
            'free',
            'orange',
            'sfr',
        ];

        foreach ($patterns as $pattern) {
            if (false !== strpos(strtolower($operator), $pattern)) {
                return $pattern;
            }
        }
    }

    public function index_action()
    {
        $this->set_page_title('Commande');

        // process on POST
        if ('POST' == $this->request->method) {
            $gateway = $this->request->post['gateway'];

            // Signed in only
            if (false === $this->container['is_connected']) {
                return $this->response->redirect('/connexion/');
            }

            switch ($gateway) {

                case 'cellpass' :
                    return $this->process_cellpass($this->container['account']);
                    break;

                case 'paymill' :
                    return $this->process_paymill($this->container['account']);
                    break;

                case 'paypal' :
                    return $this->process_paypal($this->container['account']);
                    break;
            }
        }

        // display on GET
        if (!$this->cart->isEmpty() && isset($this->paymentGateways['cellpass'])) {
            if (!$this->detect_cellpass_network()) {
                unset($this->paymentGateways['cellpass']);
            }
        }

        $render_datas = array(
            'has_adult_channel' => $this->cart->containsAdultChannel(),
            'validate_age' => true === $this->session->get('validate_age'),
            'cart' => $this->cart,
            'trial_period_days' => $this->getSdk()->getApi()->config()->get(['key' => 'sales.trial_period_days']),
            'payment_gateways' => $this->paymentGateways,
            'operator' => $this->operator,
        );

        // Display payment if available
        if (null !== $this->container['account']) {
            if (null !== $birthdate = $this->container['account']->getBirthdate()) {
                $date = new DateTime($birthdate);
                $now = new DateTime();
                $interval = $now->diff($date);
                $age = $interval->y;
            } else {
                $age = 18; // Set 18 by default, to show the button to validate if the user have more than 18 years old.
            }

            $payments = $this->getSdk()->getApi()->accounts()->payments(array(
                'id' => $this->container['account']->getId(),
            ));

            if (!empty($payments)) {
                $render_datas['paymill'] = $payments[0];
            }

            $render_datas['user_age'] = $age;
        }

        return $this->render($render_datas);
    }

    /**
     * Detect user's network via Cellpass.
     *
     * @return bool if false, Cellpass shouldn't be displayed to customer
     */
    private function detect_cellpass_network()
    {
        if (null == ($cellpass_id = $this->cookie->get('__cellpass_id'))) {
            try {
                $res = $this->cellpass->id();

                if (is_array($res)) {
                    // $res is an array: user came back with enriched URL
                    // Store results in cookie
                    $value = [
                        'customer_operator_type' => $res['customer_operator_type'],
                        'customer_operator' => $res['customer_operator'],
                    ];
                    $this->cookie->set('__cellpass_id', serialize($value), strtotime('+10 minutes'));
                    // Redirect a last time to /commande to avoid displaying GET parameters.
                    return $this->response->redirect('/commande/');
                } else {
                    // $res is a string: redirect user to Cellpass website
                    return $this->response->redirect($res);
                }
            } catch (\StubCellpass_Exception $e) {
            }
        }

        $cellpass_id = unserialize($cellpass_id);

        // Customer's network couldn't be detected
        if (in_array($cellpass_id['customer_operator_type'], ['other', 'unknown'])) {
            return false;
        }

        $this->paymentGateways['cellpass'] = sprintf('%s %s',
            ucfirst($cellpass_id['customer_operator_type']),
            $cellpass_id['customer_operator']
        );

        $this->operator = $this->get_operator($cellpass_id['customer_operator']);

        return true;
    }

    private function process_paymill($account)
    {
        // Store credit card data if provided
        if (isset($this->request->post['token'])) {
            $this->getSdk()->getApi()->accounts()->payment(array(
                'id' => $account['id'],
                'token' => $this->request->post['token'],
            ));

            if (!$this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
                return $this->order_error();
            }
        }

        $this->cart->sync($this->getSdk()->getApi(), $account);

        // Validate remote cart
        $this->getSdk()->getApi()->carts()->validate(array(
            'account_id' => $account['id'],
            'gateway' => 'paymill',
        ));

        if (!$this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
            $errors = $this->getSdk()->getApi()->getErrors();
            $message = array_shift($errors);

            return $this->order_error($message);
        }

        return $this->order_success();
    }

    private function process_cellpass($account)
    {
        // TODO Double check if Cellpass is available

        // Synchronize cart remotely to have a cart ID
        $cart = $this->cart->sync($this->getSdk()->getApi(), $account);

        try {
            $service = $this->container['sales.cellpass_utils']->getService($this->cart);
            $transaction_id = $this->cellpass->init($service['id'], $account['id'], '/cellpass/callback/init/');

            $this->getSdk()->getApi()->cellpass()->createTransaction([
                'id' => $transaction_id,
                'type' => 'init',
                'cart' => $cart['id'],
            ]);

            if (!$this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
                return $this->order_error();
            }

            $redirect_url = $this->cellpass->route();

            return $this->response->redirect($redirect_url);
        } catch (\StubCellpass_Exception $e) {
            return $this->order_error();
        }
    }

    /**
     * Create a payment by calling the 'create' method passing it a valid apiContext.
     * The return object contains the state and the url to which the buyer must be redirected to for payment approval.
     */
    private function process_paypal($account)
    {
        $apiContext = $this->container['sales.paypal.api_context'];

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $itemList = new ItemList();
        foreach ($this->cart->getProducts() as $product) {
            $item = new Item();
            $item
                ->setName($product['name'])
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setCategory('DIGITAL')
                ->setPrice($product['price'] / 100);

            $itemList->addItem($item);
        }

        $amount = new Amount();
        $amount
            ->setCurrency('EUR')
            ->setTotal($this->cart->getTotalAmount() / 100);

        $transaction = new Transaction();
        $transaction
            ->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Abonnement Play TV');

        $redirectUrls = new RedirectUrls();
        $redirectUrls
            ->setReturnUrl($this->container['url_generator']->generate('paypal_return_url', [], UrlGeneratorInterface::ABSOLUTE_URL))
            ->setCancelUrl($this->container['url_generator']->generate('paypal_cancel_url', [], UrlGeneratorInterface::ABSOLUTE_URL));

        $payment = new Payment();
        $payment
            ->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($apiContext);

            // Synchronize cart
            $this->cart->sync($this->getSdk()->getApi(), $account);

            // Store Payment on API
            $response = $this->container['api_client']->request('POST', 'accounts/'.$this->container['account']->getId().'/cart/paypal/payments/', [
                'json' => [
                    'paymentId' => $payment->getId(),
                ],
            ]);
            if (201 !== $response->getStatusCode()) {
                return $this->order_error();
            }

            return RedirectResponse::create($payment->getApprovalLink());
        } catch (\Exception $e) {
            $this->logger('paypal')->error('Error while trying to create a Payment: '.$e->getMessage());

            return $this->order_error();
        }
    }

    /**
     * This is the second step required to complete PayPal checkout.
     * Once user completes the payment, paypal redirects the browser to "redirectUrl" provided in the request.
     */
    public function paypal_return_action(Request $request)
    {
        // Session has expired
        if ($this->cart->isEmpty()) {
            return $this->order_error('Votre session a expiré');
        }

        if (!$request->query->has('paymentId') || !$request->query->has('token') || !$request->query->has('PayerID')) {
            return $this->order_error();
        }

        $apiContext = $this->container['sales.paypal.api_context'];

        $paymentId = $request->query->get('paymentId');
        $payerId = $request->query->get('PayerID');

        $payment = Payment::get($paymentId, $apiContext);

        $amount = new Amount();
        $amount
            ->setCurrency('EUR')
            ->setTotal($this->cart->getTotalAmount() / 100);

        $transaction = new Transaction();
        $transaction->setAmount($amount);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);
        $execution->addTransaction($transaction);

        try {
            $payment->execute($execution, $apiContext);

            // Update Payment on API
            $response = $this->container['api_client']->request('PUT', 'paypal/payments/'.$payment->getId().'/', [
                'json' => [
                    'state' => $payment->getState(),
                ],
            ]);
            if (204 !== $response->getStatusCode()) {
                return $this->order_error();
            }

            // Validate cart
            $this->getSdk()->getApi()->carts()->validate(array(
                'account_id' => $this->container['account']->getId(),
                'gateway' => 'paypal',
            ));

            if (!$this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
                return $this->order_error();
            }

            return $this->order_success();
        } catch (\Exception $e) {
            $this->logger('paypal')->error('Error while trying to execute a Payment: '.$e->getMessage());

            return $this->order_error();
        }
    }

    public function paypal_cancel_action()
    {
        return RedirectResponse::create($this->container['url_generator']->generate('order_index'));
    }

    public function register_action()
    {
        // Ajax only
        if (!$this->request->is_ajax || 'POST' != $this->request->method) {
            return $this->response->redirect('/');
        }

        // Process on POST request
        $data = $this->request->post;

        $form = $this->getSdk()->getForm('Order\RegisterForm');
        $form->submit($data);

        if (!$form->isValid()) {
            return $this->badRequestJsonResponse($form->getErrors());
        }

        $account = $this->getSdk()->getApi()->accounts()->create($data);

        if ($this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
            $this->account()->login($account);

            return $this->jsonResponse();
        }

        return $this->badRequestJsonResponse($this->getSdk()->getApi()->getErrors());
    }

    public function payment_action()
    {
        if (!$this->request->is_ajax) {
            return $this->response->redirect('/');
        }

        $render_datas = array();

        if (null !== $this->container['account']) {
            $payments = $this->getSdk()->getApi()->accounts()->payments(array(
                'id' => $this->container['account']->getId(),
            ));

            $render_datas['paymill'] = !empty($payments) ? $payments[0] : null;
        }

        return $this->render($render_datas);
    }

    public function confirm_action()
    {
        $this->set_page_title('Commande - Confirmation');

        $data = [
            'success' => true,
        ];

        if ($return_url = $this->session->get_flash_message('order_return_url')) {
            $data['return_url'] = $return_url;
        } else {
            $data['return_url'] = $this->hosts['current_full'].'/television/';
        }

        return $this->render($data);
    }

    public function error_action()
    {
        $this->set_page_title('Commande - Erreur');

        $render_datas = array(
            'success' => false,
        );

        if ($message = $this->session->get_flash_message('order_error')) {
            $render_datas['message'] = $message;
        }

        return $this->render($render_datas, 'controllers/order/confirm.twig');
    }

    public function status_action()
    {
        $this->set_page_title('Commande - Vous êtes déjà abonné à cette offre');

        if ($return_url = $this->session->get_flash_message('order_return_url')) {
            $data['return_url'] = $return_url;
        } else {
            $data['return_url'] = $this->hosts['current_full'].'/television/';
        }

        return $this->render($data);
    }

    public function account_action()
    {
        if (!$this->request->is_ajax) {
            return $this->response->redirect('/');
        }

        return $this->render();
    }

    public function validate_age_action()
    {
        $this->session->set('validate_age', true);

        return $this->response->redirect('/commande/');
    }

    private function order_error($message = null)
    {
        if (!empty($message)) {
            $this->session->set_flash_message('order_error', $message);
        }

        return RedirectResponse::create($this->container['url_generator']->generate('order_error'));
    }

    private function order_success()
    {
        // Clear cart stored in session
        $this->cart->clear();

        // Purge account subscriptions cache for a full round trip to API
        $this->getSdk()->getApi()->accounts()->purge('subscriptions', array('id' => $this->container['account']->getId()));

        return RedirectResponse::create($this->container['url_generator']->generate('order_confirm'));
    }

    public function cellpass_callback_init_action()
    {
        $transaction_id = $this->request->get['transaction_id'];

        try {
            $data = $this->cellpass->end();
        } catch (\StubCellpass_Exception $e) {
            return $this->order_error();
        }

        if ($data['success'] && $data['customer_editor_id'] == $this->container['account']->getId()) {
            $this->getSdk()->getApi()->cellpass()->modifyTransaction([
                'id' => $transaction_id,
                'customerId' => $data['customer_id'],
                'success' => true,
            ]);

            if (!$this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
                return $this->order_error();
            }

            $this->getSdk()->getApi()->carts()->validate(array(
                'account_id' => $this->container['account']->getId(),
                'gateway' => 'cellpass',
            ));

            if (!$this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
                return $this->order_error();
            }

            return $this->order_success();
        } else {
            $this->getSdk()->getApi()->cellpass()->modifyTransaction([
                'id' => $transaction_id,
                'customerId' => $data['customer_id'],
                'success' => false,
                'state' => $data['state'],
                'stateValue' => $data['state_value'],
                'errorCode' => $data['error_code'],
                'error' => $data['error'],
            ]);

            switch ($data['state_value']) {
                // Canceled by user : go back to order to choose another payment
                case \StubCellpass::STATE_VALUE_CLIENT_CANCEL:
                    return $this->response->redirect('/commande/');
                    break;

                default:
                    return $this->order_error();
                    break;
            }
        }

        return $this->order_error();
    }
}
