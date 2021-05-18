<?php

use App\Http\Controllers\v1\HtmlPageController;
use App\Http\Controllers\v1\UserFileController;
use App\Services\LocalizationService;
use App\Services\NavigationService;
use App\Services\Profile\UserProfileService;
use App\Services\Redis\UserSettingService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Localization
|--------------------------------------------------------------------------
*/
Route::get('localization/{directory}/{file?}', LocalizationService::class);

/*
|--------------------------------------------------------------------------
| Navigation
|--------------------------------------------------------------------------
*/
Route::get('navigation', NavigationService::class);

/*
|--------------------------------------------------------------------------
| User settings
|--------------------------------------------------------------------------
*/
Route::prefix('user_settings')->group(static function () {
    Route::get('', UserSettingService::class.'@all');
    Route::get('multiple', UserSettingService::class.'@getMultiple');
    Route::get('{key}', UserSettingService::class.'@get');
    Route::post('apply', UserSettingService::class.'@apply');
    Route::post('', UserSettingService::class.'@set');
    Route::patch('multiple', UserSettingService::class.'@setMultiple');
    Route::delete('multiple', UserSettingService::class.'@deleteMultiple');
    Route::delete('clear', UserSettingService::class.'@clear');
    Route::delete('{key}', UserSettingService::class.'@delete');
});

/*
|--------------------------------------------------------------------------
| User file
|--------------------------------------------------------------------------
*/
Route::post('users/upload_file', UserFileController::class.'@uploadFile')
    ->name('users.upload_file');
Route::get('users/profile/get/{user?}', UserProfileService::class)->name('users.profile.get');


Route::get('pages/{alias}',  HtmlPageController::class . '@staticPages')
    ->name('pages.html.get');

