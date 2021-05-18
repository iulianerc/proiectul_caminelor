<?php

use App\Http\Controllers\v1\PackingCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('packing_categories')->name('infoForRequest.')->group(static function(){
    Route::get('list', [PackingCategoryController::class, 'list'])->name('list.all');
});
Route::resource('packing_categories', 'PackingCategoryController', ['name_rewrite' => true]);
