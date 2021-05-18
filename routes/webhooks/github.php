<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('github-webhook', fn(Request $request) => $request->all());
