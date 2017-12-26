<?php

namespace Chelout\Robokassa\Controllers;

use Illuminate\Support\Facades\Route;

Route::prefix('payment')->group(function () {
    Route::match(['get', 'post'], 'result', PaymentResultController::class)->name('robokassa.payment.result');
    Route::match(['get', 'post'], 'success', PaymentSuccessController::class)->name('robokassa.payment.success');
    Route::match(['get', 'post'], 'fail', PaymentFailController::class)->name('robokassa.payment.fail');
});