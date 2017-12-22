<?php

namespace Chelout\Robokassa\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentSuccessController extends Controller
{
    public function __invoke(Request $request)
    {
        $attributes = collect($request->all())->filter(function ($value, $key) {
            return in_array($key, ['OutSum', 'InvId', 'SignatureValue']) || starts_with($key, 'Shp_');
        });

        return view('robokassa::success', ['attributes' => $attributes]);
    }
}