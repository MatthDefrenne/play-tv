<?php

namespace PlayTv\Sales;

use Playmedia\Api\Api;
use Playmedia\Api\Entity\Account;

class Cart implements \ArrayAccess
{
    public $products = [];

    public function offsetExists($offset)
    {
    }

    public function offsetGet($offset)
    {
        if ($offset == 'products') {
            return $this->products;
        }
        if ($offset == 'total_amount') {
            return $this->getTotalAmount();
        }

        return;
    }

    public function offsetSet($offset, $value)
    {
    }

    public function offsetUnset($offset)
    {
    }

    public function contains($product)
    {
        foreach ($this->products as $oneProduct) {
            if ($product['id'] == $oneProduct['id']) {
                return true;
            }
        }

        return false;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function add($product)
    {
        if (!$this->contains($product)) {
            $this->products[] = $product;
        }
    }

    public function clear()
    {
        $this->products = array();
    }

    public function getTotalAmount()
    {
        $amount = 0;
        foreach ($this->products as $product) {
            $amount += $product['price'];
        }

        return $amount;
    }

    public function isEmpty()
    {
        return count($this->products) == 0;
    }

    public function containsAdultChannel()
    {
        if ($this->isEmpty()) {
            return false;
        }

        $hasAdultChannel = false;
        foreach ($this->products as $product) {
            if ($product['hasAdultChannel']) {
                $hasAdultChannel = true;
                break;
            }
        }

        return $hasAdultChannel;
    }

    public function containsPrepaidProduct()
    {
        foreach ($this->products as $product) {
            if ($product['type'] === 'prepaid') {
                return true;
            }
        }

        return false;
    }

    public function sync(Api $api, Account $account)
    {
        // Clear remote cart
        $api->carts()->clear(array(
            'account_id' => $account['id'],
        ));

        if ($this->containsPrepaidProduct()) {
            $headers = ['Content-Type' => 'application/json'];
            $response = $api->post('accounts/'.$account['id'].'/cart/prepaid/', $headers, [
                'amount' => $this->getTotalAmount(),
            ])->send();

            $cart = $response->json();
        } else {
            // Add products to remote cart
            $products = [];
            foreach ($this->products as $product) {
                $products[] = $product['id'];
            }

            $cart = $api->carts()->addProducts(array(
                'account_id' => $account['id'],
                'products' => $products,
            ));
        }

        return $cart;
    }
}
