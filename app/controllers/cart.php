<?php

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use PlayTv\Sales\Cart;

class cart_controller extends ppl_app_controller
{
    protected $cart;

    public function before_action()
    {
        parent::before_action();

        if (null === ($cart = $this->session->get('cart'))) {
            $cart = new Cart();
            $this->session->set('cart', $cart);
        }

        $this->cart = $cart;
    }

    public function index_action()
    {
        if ('POST' == $this->request->method) {
            $product_alias = $this->request->post['product_alias'];
        }
        if ('GET' == $this->request->method) {
            $product_alias = $this->request->get['product_alias'];
        }

        // Request is coming from embedded player : go back to player after order
        $return_url = null;
        if (isset($_SERVER['HTTP_REFERER'])) {
            if (false !== strpos($_SERVER['HTTP_REFERER'], '/player/embed/')) {
                $return_url = urlencode($_SERVER['HTTP_REFERER']);
            }
        }

        if ($product_alias) {
            $product = $this->container['product.formatter']->show($product_alias);

            $this->cart->clear();

            if ($this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
                $this->cart->add($product);
            }
        }

        $this->session->set('cart', $this->cart);

        return $this->response->redirect('/commande/'.(null !== $return_url ? "?return_url={$return_url}" : ''));
    }

    private function getPrepaidProductForAmount($amount)
    {
        $client = $this->getSdk()->getApi();
        $response = $client->get('products/prepaid/?amount='.$amount)->send();

        if ($response->isSuccessful()) {
            $product = $response->json();
            $this->container['product.formatter']->hydrate($product);
            $product['price'] = $amount;

            return $product;
        }
    }

    public function crowdfunding_action(Request $request)
    {
        if ('POST' === $request->getMethod()) {
            $amount = $request->request->getInt('amount');

            if (!$product = $this->getPrepaidProductForAmount($amount)) {
                $this->session->set_flash_message('order_error', 'Pas de produit correspondant au montant sélectionné.');

                return RedirectResponse::create(
                    $this->container['url_generator']->generate('order_error')
                );
            }

            $this->cart->clear();
            $this->cart->add($product);

            $this->session->set('cart', $this->cart);

            return RedirectResponse::create(
                $this->container['url_generator']->generate('order_index')
            );
        }
    }
}
