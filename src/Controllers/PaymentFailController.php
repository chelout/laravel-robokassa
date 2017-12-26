<?php

namespace Chelout\Robokassa\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentFailController extends Controller
{
    public function __invoke(Request $request)
    {
        $attributes = collect($request->all())->filter(function ($value, $key) {
            return in_array($key, ['OutSum', 'InvId', 'Culture']);
        });

        return view('robokassa::fail', ['attributes' => $attributes]);
    }
}