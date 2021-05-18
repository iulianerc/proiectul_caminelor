<?php

use App\Http\Controllers\v1\TransportController;
use Illuminate\Support\Facades\Route;

Route::prefix('transports')->name('transports.')->group(static function(){
    Route::get('list', [TransportController::class, 'list'])->name('list.get');
});
Route::resource('transports', 'TransportController', ['name_rewrite' => true]);
