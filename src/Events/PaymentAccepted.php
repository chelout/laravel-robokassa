<?php

namespace Chelout\Robokassa\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PaymentAccepted
{
    use SerializesModels;

    public $payment;

    public function __construct($payment)
    {
        $this->payment = $payment;
    }
}