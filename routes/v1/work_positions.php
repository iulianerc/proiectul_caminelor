<?php

use App\Http\Controllers\v1\WorkPositionController;
use Illuminate\Support\Facades\Route;

Route::resource('work_positions', 'WorkPositionController', ['name_rewrite' => true]);
Route::get('work_positions/list', [WorkPositionController::class, 'list'])->name('work_positions.list');
