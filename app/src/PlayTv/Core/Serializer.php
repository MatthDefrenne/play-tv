<?php

namespace PlayTv\Core;

use Symfony\Component\Serializer\Serializer as BaseSerializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class Serializer extends BaseSerializer
{
    public function __construct(array $normalizers = array())
    {
        $normalizers[] = new ObjectNormalizer();

        parent::__construct($normalizers);
    }
}
