<?php

namespace PlayTv\Sales;

use PlayTv\Core\Channel\Channel;
use Playmedia\Component\Channel\ProductMatrix;
use Playmedia\Api\Entity\Account;

/**
 * Helper class to retrieve products to sell for a channel.
 */
class ChannelProductResolver
{
    private $productMatrix;
    private $freeProduct;
    private $subscriptions = [];

    /**
     * @param ProductMatrix $productMatrix
     * @param array         $freeProduct
     */
    public function __construct(ProductMatrix $productMatrix, $freeProduct)
    {
        $this->productMatrix = $productMatrix;
        $this->freeProduct = $freeProduct;
    }

    /**
     * @param array   $products
     * @param Account $account
     * @param bool    $filterPremium
     *
     * @return array
     */
    public function satisfies(Channel $channel, $products, Account $account = null, $filterPremium = false)
    {
        $filters = [];

        $this->addFreeProductFilter($filters);

        if (null !== $account) {
            $this->addSubscribedProductsFilter($filters, $account->getSubscriptions());
        }

        if ($filterPremium) {
            $this->addPremiumFilter($filters, $channel->getId());
        }

        $products = array_filter($products, function ($product) use ($filters) {
            return !in_array($product['alias'], $filters);
        });

        return array_values($products);
    }

    /**
     * Returns one product associated to channel based on product ordering.
     *
     * @param array $products
     *
     * @return array
     */
    public function pickProduct($products)
    {
        // Keep only non-free packs
        $freeProductAlias = $this->freeProduct['alias'];
        $products = array_filter($products, function ($product) use ($freeProductAlias) {
            if ('retail' == $product['type'] || $product['alias'] == $freeProductAlias) {
                return false;
            }

            return true;
        });

        if (count($products) > 0) {
            // Premium always first
            uasort($products, function ($a, $b) {
                if ('pack-premium' == $a['alias']) {
                    return -1;
                } else {
                    return 1;
                }
            });
            // Shift first found pack
            return array_shift($products);
        }

        return ['alias' => 'pack-premium'];
    }

    private function addFreeProductFilter(array &$filters)
    {
        $filters[] = $this->freeProduct['alias'];

        return $this;
    }

    private function addSubscribedProductsFilter(array &$filters, array $subscriptions)
    {
        foreach ($subscriptions as $subscription) {
            $filters[] = $subscription['product']['alias'];
        }

        return $this;
    }

    /**
     * As most channels belong to pack-premium.
     */
    private function addPremiumFilter(array &$filters, $channelId)
    {
        if (!$this->productMatrix->isExclusive($channelId, 'pack-premium')) {
            $filters[] = 'pack-premium';
        }

        return $this;
    }
}
