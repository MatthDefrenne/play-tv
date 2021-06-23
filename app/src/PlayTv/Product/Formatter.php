<?php

namespace PlayTv\Product;

use Playmedia\Component\Product as ProductComponent;
use Playmedia\Component\Channel;
use PlayTv\Core\Mosaic\MosaicManager;

class Formatter
{
    private $productComponent;
    private $mosaicManager;
    private $channels = array();
    private $country;

    public function __construct(ProductComponent $productComponent, MosaicManager $mosaicManager, array $channels, $country)
    {
        $this->productComponent = $productComponent;
        $this->mosaicManager = $mosaicManager;
        $this->country = $country;
        foreach ($channels as $channel) {
            $this->channels[$channel['id']] = $channel;
        }
    }

    public function findByType($type)
    {
        $products = $this->productComponent->findByType($type);

        foreach ($products as &$product) {
            $this->hydrate($product, true);
        }

        $products = array_filter($products, function ($product) {
            if ('pack' === $product['type']) {
                return !empty($product['channels']);
            }

            if ('retail' === $product['type']) {
                return !empty($product['channel']);
            }

            return true;
        });

        return array_values($products);
    }

    public function show($identifier)
    {
        $product = $this->productComponent->show($identifier);
        $this->hydrate($product);

        return $product;
    }

    public function hydrate(&$product, $filterByCountry = false)
    {
        $product['hasAdultChannel'] = false;

        if ('pack' == $product['type'] || 'prepaid' == $product['type']) {
            foreach ($product['channels'] as $key => $channelId) {
                if (!isset($this->channels[$channelId])) {
                    unset($product['channels'][$key]);
                    continue;
                }

                $channelItem = $this->channels[$channelId];

                $product['channels'][$key] = $channelItem;

                // Apply filter
                if ($filterByCountry && !Channel::isStreamableByCountry($channelItem, $this->country)) {
                    unset($product['channels'][$key]);
                }
            }

            // Apply order
            $product['channels'] = $this->mosaicManager->createSortedMosaic($product['channels'], $this->country)->toArray();
        }

        if ('retail' == $product['type']) {
            $product['channel'] = isset($this->channels[$product['channel']]) ? $this->channels[$product['channel']] : null;

            if (null !== $product['channel'] && $filterByCountry) {
                if (!Channel::isStreamableByCountry($product['channel'], $this->country)) {
                    $product['channel'] = null;
                }
            }

            if (null !== $product['channel']) {
                $product['hasAdultChannel'] = $product['channel']['is_adult'];
            }
        }
    }
}
