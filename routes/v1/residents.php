<?php

use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;
Route::prefix('residents')->group(static function() {
    Route::get('list', [ResidentController::class, 'list']);
    Route::get('edit', [ResidentController::class, 'edit']);
    Route::post('store', [ResidentController::class, 'store']);
    Route::delete('destroy', [ResidentController::class, 'destroy']);
});
