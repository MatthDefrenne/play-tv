<?php

namespace Playmedia\Utils;

class ParistreamToken
{
    protected $apiKey; // Public key (GUID)
    protected $secret; // Private key

    public function __construct($apiKey, $secret) {
        $this->apiKey = $apiKey;
        $this->secret = $secret;
    }

    public function getStreamToken($mediaId) {
        $unsignedToken = str_replace("-", "", $this->apiKey);
        $unsignedToken .= "|";
        $unsignedToken .= $mediaId;
        $unsignedToken .= "|";
        $unsignedToken .= time();
        $unsignedToken .= "|";
        $unsignedToken .= rand(10000000, 99999999);

        return $this->signToken($unsignedToken);
    }

    protected function signToken($unsignedToken) {
        $signed = sha1($unsignedToken . $this->secret);
        $signed = str_replace("-", "", $signed);
        $signed = strtolower($signed);

        return $unsignedToken . "|" . $signed;
    }
}
