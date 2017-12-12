<?php

namespace Chelout\Robokassa\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentSuccessController extends Controller
{
    public function __invoke(Request $request)
    {
        Log::info('Success', $request->all());

        return $request->all();
    }
}