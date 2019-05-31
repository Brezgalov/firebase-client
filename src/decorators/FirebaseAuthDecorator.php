<?php

namespace Brezgalov\FirebaseClient\Decorators;

use Brezgalov\ApiWrapper\ResourceDecorator;

class FirebaseAuthDecorator extends ResourceDecorator
{
    /**
     * @var string - auth key
     */
    public $authKey;

    public function __construct($authKey)
    {
        $this->authKey = $authKey;
    }

    /**
     * decorate your resource here
     * @param resource $ch
     */
    public function decorate(&$ch)
    {
        $headers = [
            "Authorization:key={$this->authKey}",
            'Content-Type: application/json',
            'Expect: ',
        ];
        curl_setopt_array($ch, [
            CURLOPT_HTTPHEADER => $headers,
        ]);
    }
}