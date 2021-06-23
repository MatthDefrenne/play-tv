<?php

namespace Playmedia\Component\Channel;

class ProductMatrix
{
    private $data;

    public function __construct(array $data = array())
    {
        foreach ($data as $product) {
            $product['id'] = $product['product_id'];
            $channelId = $product['channel_id'];

            unset($product['product_id'], $product['channel_id']);

            $this->data[$channelId][] = $product;
        }
    }

    public function getProductsByChannel($channel_id)
    {
        $products = [];

        if (isset($this->data[$channel_id])) {
            $products = array_filter($this->data[$channel_id], function ($product) {
                return (bool) $product['active'];
            });
        }

        return $products;
    }

    public function isExclusive($channel_id, $product_alias)
    {
        $productsByChannel = $this->getProductsByChannel($channel_id);

        if (count($productsByChannel) == 1) {
            $product = current($productsByChannel);

            return $product['alias'] == $product_alias;
        }

        return false;
    }
}
