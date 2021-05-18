<?php

use App\Http\Controllers\v1\OrderReceiptController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'v1\AuthController@login')->name('login');
Route::post('register', 'v1\AuthController@register')->name('register');
Route::get('app/config', 'v1\AppController@config');
Route::get('app/test', 'v1\AppController@test');


/*
|--------------------------------------------------------------------------
| Passport Routes
|--------------------------------------------------------------------------
|
*/
Route::post('oauth/registration/{activated?}', 'v1\PassportAuthController@registration');
Route::post('oauth/login', 'v1\PassportAuthController@login');
Route::post('oauth/refresh-token', 'v1\PassportAuthController@refresh');
Route::post('oauth/logout', 'v1\PassportAuthController@logout')->middleware(['api', 'auth:api']);
Route::get('oauth/activate/{token}', 'v1\PassportAuthController@activate');
Route::post('oauth/update_password', 'v1\PassportAuthController@updatePassword')
    ->middleware(['api', 'auth:api'])
    ->name('oauth.update_password');

Route::post('auth/forgot-password', 'v1\PasswordResetController@create');
Route::get('auth/check-reset-token/{token}', 'v1\PasswordResetController@find');
Route::post('auth/reset-password', 'v1\PasswordResetController@reset');

/*
|--------------------------------------------------------------------------
| User statuses
|--------------------------------------------------------------------------
|
*/
Route::get('statuses/{type}', 'v1\StatusController@getTyped')->name('statuses.getTyped.get');
/*
|--------------------------------------------------------------------------
| Temp Routes
|--------------------------------------------------------------------------
|
*/
//Route::resource('order_receipts', 'v1\\OrderReceiptController', ['name_rewrite' => true]);
//Route::get('order_receipts', [OrderReceiptController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Langusge Routes
|--------------------------------------------------------------------------
|
*/
Route::get('langs', fn() => ok(config('app.locales')));
