<?php

use App\Http\Controllers\HostelRentController;
use Illuminate\Support\Facades\Route;

Route::prefix('hostel_rents')->group(static function() {
    Route::get('list', [HostelRentController::class, 'list']);
    Route::get('edit', [HostelRentController::class, 'edit']);
    Route::post('store', [HostelRentController::class, 'store']);
    Route::delete('destroy', [HostelRentController::class, 'destroy']);
});
