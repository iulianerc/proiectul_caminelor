<?php

use App\Http\Controllers\v1\PaymentMethodController;
use Illuminate\Support\Facades\Route;

Route::get('payment_methods/list', [PaymentMethodController::class, 'list'])->name('payment_methods');
