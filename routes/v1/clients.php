<?php

use App\Http\Controllers\v1\ClientController;
use Illuminate\Support\Facades\Route;

Route::resource('clients', 'ClientController', ['name_rewrite' => true]);
Route::prefix('clients')->name('clients.')->group(static function () {
    Route::get('{client}/info_for_request/{lang}', [ClientController::class, 'infoForRequest'])->name('info_for_request');
    Route::get('types',  [ClientController::class, 'getTypes'])->name('edit');
    Route::get('live_search_for_request', [ClientController::class, 'liveSearchForRequest'])->name('live_search');
    Route::get('live_search_for_filters', [ClientController::class, 'liveSearchForFilters'])->name('live_search');
});
