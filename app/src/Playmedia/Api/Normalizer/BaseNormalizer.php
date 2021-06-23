<?php

namespace Playmedia\Api\Normalizer;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Playmedia\Api\Client;

class BaseNormalizer extends ObjectNormalizer
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;

        parent::__construct();
    }
}
