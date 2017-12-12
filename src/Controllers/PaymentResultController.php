<?php

namespace Chelout\Robokassa\Controllers;

use App\Http\Controllers\Controller;
use Chelout\Robokassa\Events\PaymentAccepted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentResultController extends Controller
{
    public function __invoke(Request $request)
    {
        Log::info('Result', $request->all());

        // event(new PaymentAccepted($request->all()));
        // event(new PaymentRejected($request->all()));

        return $request->all();
    }
}