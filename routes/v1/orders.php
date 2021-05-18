<?php

use App\Http\Controllers\v1\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('orders')->name('orders.')->group(static function () {
    Route::get('{order}/get_confirmation_file', [OrderController::class, 'getConfirmationFile'])->name('confirm_payment');
    Route::get('{order}/confirm_payment/edit', [OrderController::class, 'confirmPaymentEdit'])->name('confirm_payment');
    Route::get('{order}/payments', [OrderController::class, 'getPayments'])->name('handle_payments');
    Route::get('{order}/guarantees', [OrderController::class, 'getGuarantees'])->name('guarantees');
    Route::get('{order}/logs', [OrderController::class, 'getLogs'])->name('logs');
    Route::get('release_mods', [OrderController::class, 'getReleaseMods'])->name('logs');
    Route::post('payment', [OrderController::class, 'addPayment'])->name('handle_payments');
    Route::patch('{order}/confirm_payment', [OrderController::class, 'confirmPayment'])->name('confirm_payment');
    Route::patch('{order}/add_confirmation_file', [OrderController::class, 'addConfirmationFile'])->name('confirm_payment');
    Route::patch('change_manager', [OrderController::class, 'changeManager'])->name('change_manager');
});

Route::resource('orders', 'OrderController', ['name_rewrite' => true]);
