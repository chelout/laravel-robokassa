<?php

namespace Chelout\Robokassa\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentFailController extends Controller
{
    public function __invoke(Request $request)
    {
        Log::info('Fail', $request->all());

        return $request->all();
    }
}