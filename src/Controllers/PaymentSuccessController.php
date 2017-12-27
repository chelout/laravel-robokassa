<?php

namespace Chelout\Robokassa\Controllers;

use App\Http\Controllers\Controller;
use Chelout\Robokassa\Robokassa;
use Illuminate\Http\Request;

class PaymentSuccessController extends Controller
{
    public function __invoke(Request $request)
    {
    	$robokassa = new Robokassa;

        $attributes = collect($request->all())->filter(function ($value, $key) {
            return in_array($key, ['OutSum', 'InvId', 'SignatureValue', 'Culture']) || starts_with($key, 'Shp_');
        });

    	if (! $robokassa->payment->validateSuccess($request->all(), false)) {
    		return view('robokassa::fail', ['attributes' => $attributes]);
    	}

        return view('robokassa::success', ['attributes' => $attributes]);
    }
}