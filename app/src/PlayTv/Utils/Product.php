<?php

namespace PlayTv\Utils;

class Product
{
    public static function groupByType($products, $maxPacks = null)
    {
        if (count($products) > 0) {
            $retails = array_values(array_filter($products, function ($product) {
                return $product['type'] == 'retail';
            }));

            $packs = array_values(array_filter($products, function ($product) {
                return $product['type'] == 'pack';
            }));

            return [
                'retail' => $retails,
                'pack' => null !== $maxPacks ? array_slice($packs, 0, $maxPacks) : $packs,
            ];
        }

        return [];
    }
}
