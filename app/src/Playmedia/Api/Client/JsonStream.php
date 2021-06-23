<?php

namespace Playmedia\Api\Client;

use GuzzleHttp\Psr7\StreamDecoratorTrait;
use Psr\Http\Message\StreamInterface;

class JsonStream implements StreamInterface
{
    use StreamDecoratorTrait;

    public function unserialize()
    {
        $contents = (string) $this->getContents();

        if ($contents === '') {
            return;
        }

        $data = json_decode($contents, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Error trying to decode response: '.json_last_error_msg());
        }

        return $data;
    }
}
