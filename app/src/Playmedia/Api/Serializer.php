<?php

namespace Playmedia\Api;

use Symfony\Component\Serializer\Serializer as BaseSerializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class Serializer extends BaseSerializer
{
    public function __construct(Client $client)
    {
        $normalizers = [
            new ObjectNormalizer(),
        ];

        $encoders = [
            new JsonEncoder(),
        ];

        parent::__construct($normalizers, $encoders);
    }
}
