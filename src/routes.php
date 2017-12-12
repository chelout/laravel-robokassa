<?php

namespace Chelout\Robokassa\Controllers;

use Illuminate\Support\Facades\Route;

Route::prefix('payment')->group(function () {
    Route::post('result', PaymentResultController::class)->name('robokassa.payment.result');
    Route::post('success', PaymentSuccessController::class)->name('robokassa.payment.success');
    Route::post('fail', PaymentFailController::class)->name('robokassa.payment.fail');
});