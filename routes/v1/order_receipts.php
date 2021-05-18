<?php

use Illuminate\Support\Facades\Route;

Route::prefix('order_receipts')->name('order_receipts.')->group(static function(){

});
Route::resource('order_receipts', 'OrderReceiptController', ['name_rewrite' => true]);
