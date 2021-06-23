<?php

namespace PlayTv\Sales;

use Playmedia\Api\Api;

class CellpassUtils
{
    private $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * Returns the Cellpass Service ID to use for the product contained in $cart.
     *
     * @param Cart $cart
     *
     * @return mixed an array if a service exist, or null
     */
    public function getService(Cart $cart)
    {
        if ($cart->isEmpty()) {
            return;
        }

        $products = $cart->getProducts(); // TODO Make sure there is only one product
        $product = current($products);

        $services = $this->api->cellpass()->services([
            'product' => $product['id'],
        ]);

        // There is no service associated with the product contained in cart
        // It can't be bought via Cellpass
        if (!$this->api->getLastResponse()->isSuccessful() || empty($services)) {
            return;
        }

        return current($services);
    }
}
