<?php

use App\Http\Controllers\v1\AuthorizedPersonController;
use Illuminate\Support\Facades\Route;

Route::get('authorized_persons/list', [AuthorizedPersonController::class, 'list'])->name('authorized_persons.list.all');
Route::resource('authorized_persons', 'AuthorizedPersonController', ['name_rewrite' => true]);
