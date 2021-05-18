<?php

use App\Http\Controllers\v1\OrderStatusController;
use Illuminate\Support\Facades\Route;

Route::resource('order_statuses', 'OrderStatusController', ['name_rewrite' => true]);
Route::get('order_statuses/list', [OrderStatusController::class, 'list'])->name('order_statuses.list.get');
Route::get('order_statuses/list/value_text', [OrderStatusController::class, 'listValueText'])->name('order_statuses.list.value_text');
