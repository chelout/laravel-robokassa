<?php

namespace Chelout\Robokassa\Events;

use Illuminate\Queue\SerializesModels;

class PaymentRejected
{
    use SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}