<?php

namespace Chelout\Robokassa\Controllers;

use App\Http\Controllers\Controller;
use Chelout\Robokassa\Events\PaymentAccepted;
use Chelout\Robokassa\Events\PaymentRejected;
use Chelout\Robokassa\Robokassa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentResultController extends Controller
{
    public function __invoke(Request $request)
    {
        $robokassa = new Robokassa;

        if ($robokassa->payment->validateResult($request->all(), false)) {
            event(new PaymentAccepted($robokassa->payment));

            return $robokassa->payment->getSuccessAnswer();
        }

        event(new PaymentRejected($robokassa->payment));
    }
}