<?php

namespace Playmedia\Component;

use Playmedia\Api\Api;

class Product
{
    private $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function show($identifier)
    {
        $product = $this->api->products()->show($identifier);

        return $product;
    }

    public function collection(array $filters)
    {
        return $this->api->products()->collection($filters);
    }

    /**
     * Find all active/inactive products by type with channels filtered by geoloc.
     *
     * @param string $type   pack|retail|free
     * @param bool   $active active flag
     *
     * @return array
     */
    public function findByType($type, $active = true)
    {
        $filters = array(
            'type' => $type,
            'active' => (int) $active,
        );

        return $this->collection($filters, true);
    }
}
