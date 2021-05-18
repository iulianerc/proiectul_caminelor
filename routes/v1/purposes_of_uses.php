<?php

use App\Http\Controllers\v1\PurposesOfUseController;
use Illuminate\Support\Facades\Route;
Route::prefix('purposes_of_use', )->name('purposes_of_use.')->group(function () {
    Route::get('list', [PurposesOfUseController::class, 'list'])->name('list.all');
    Route::get('list/{language}', [PurposesOfUseController::class, 'listLanguage'])->name('list.all');
    Route::get('{purposesOfUse}/info_for_request/{lang}', [PurposesOfUseController::class, 'infoForRequest'])->name('info_for_request');
});
Route::resource('purposes_of_use', 'PurposesOfUseController', ['name_rewrite' => true, 'names' => 'purposes_of_uses']);
