<?php

namespace Chelout\Robokassa\Events;

use Illuminate\Queue\SerializesModels;

class PaymentAccepted
{
    use SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}