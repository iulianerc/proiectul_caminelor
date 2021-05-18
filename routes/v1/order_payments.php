<?php

use Illuminate\Support\Facades\Route;

Route::prefix('order_payments')->name('order_payments.')->group(static function(){

});
Route::resource('order_payments', 'OrderPaymentController', ['name_rewrite' => true]);
