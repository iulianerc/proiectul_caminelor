<?php

use App\Http\Controllers\HostelController;
use Illuminate\Support\Facades\Route;
Route::prefix('hostels')->group(static function() {
    Route::get('list', [HostelController::class, 'list']);
    Route::get('edit', [HostelController::class, 'edit']);
    Route::post('store', [HostelController::class, 'store']);
    Route::delete('destroy', [HostelController::class, 'destroy']);
});
