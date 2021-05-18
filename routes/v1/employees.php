<?php

use Illuminate\Support\Facades\Route;

Route::resource('employees', 'EmployeeController', ['name_rewrite' => true]);
