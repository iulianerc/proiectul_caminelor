<?php

use App\Http\Controllers\ResidentController;
use App\Http\Controllers\RoomCategoryController;
use Illuminate\Support\Facades\Route;
Route::prefix('room_categories')->group(static function() {
    Route::get('list', [RoomCategoryController::class, 'list']);
    Route::get('edit', [RoomCategoryController::class, 'edit']);
    Route::post('store', [RoomCategoryController::class, 'store']);
    Route::delete('destroy', [RoomCategoryController::class, 'destroy']);
});
