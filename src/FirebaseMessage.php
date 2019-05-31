<?php

namespace Brezgalov\FirebaseClient;

class FirebaseMessage
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $text;

    /**
     * @var array
     */
    public $recipients_ids = [];

    /**
     * @var array
     */
    public $data = [];

    /**
     * FirebaseMessage constructor.
     * @param array $args
     */
    public function __construct(array $args)
    {
        $fields = ['title', 'text', 'recipients_ids', 'data'];
        foreach ($fields as $field) {
            if (array_key_exists($field, $args)) {
                $this->{$field} = $args[$field];
            }
        }
    }
}