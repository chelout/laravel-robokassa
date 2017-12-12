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
        Log::info('Result', $request->all());

        $robokassa = new Robokassa;

        // Должна быть проверка суммы
        if ($robokassa->payment->validateResult($request->all(), false)) {
            $result = $robokassa->payment->getSuccessAnswer();
            
            Log::info('Result', [$result]);
            
            event(new PaymentAccepted($robokassa->payment->getId()));

            return $result;
        } else {
            event(new PaymentRejected($request->all()));

            return $request->all();
        }
    }
}