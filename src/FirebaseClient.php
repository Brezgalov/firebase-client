<?php

namespace Brezgalov\FirebaseClient;

use Brezgalov\ApiWrapper\Client;
use Brezgalov\FirebaseClient\Decorators\FirebaseAuthDecorator;
use Brezgalov\ApiWrapper\Decorators\SslVerifyPeerDecorator;

class FirebaseClient extends Client
{
    /**
     * get Api base url
     * @return string
     */
    public function getBasePath()
    {
        return 'https://fcm.googleapis.com/';
    }

    /**
     * @param FirebaseMessage $message
     * @return \Brezgalov\ApiWrapper\Response
     */
    public function send(FirebaseMessage $message)
    {
        return $this->prepareRequest('fcm/send')
            ->setMethod('POST')
            ->setDecorators([
                new SslVerifyPeerDecorator(),
                new FirebaseAuthDecorator($this->token),
            ])
            ->setBodyParams(json_encode([
                'registration_ids' => $message->recipients_ids,
                'notification' => [
                    'title' => $message->title,
                    'body' => $message->text,
                ],
                'data' => $message->data,
            ]))
            ->execJson();
    }
}