<?php

use App\Http\Controllers\v1\GoodController;
use Illuminate\Support\Facades\Route;

Route::prefix('goods')->name('goods.')->group(static function(){
    Route::get('list', [GoodController::class, 'list'])->name('list.all');
});
Route::resource('goods', 'GoodController', ['name_rewrite' => true]);
