<?php

use App\Http\Controllers\v1\BankController;
use App\Http\Controllers\v1\ServiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('services')->name('services.')->group(static function(){
    Route::get('list', [ServiceController::class, 'list'])->name('list.all');
});
Route::resource('services', 'ServiceController', ['name_rewrite' => true]);
