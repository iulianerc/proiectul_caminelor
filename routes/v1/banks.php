<?php

use App\Http\Controllers\v1\BankController;
use Illuminate\Support\Facades\Route;

Route::prefix('banks')->name('banks.')->group(static function(){
    Route::get('list', [BankController::class, 'list'])->name('list.all');
});
Route::resource('banks', 'BankController', ['name_rewrite' => true]);
