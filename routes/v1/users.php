<?php

use Illuminate\Support\Facades\Route;

Route::prefix('users')->name('users.')->group(static function(){
    //Route::patch('{user}/toggle_state', 'UserController@toggleState')->name('toggle_state.patch');
    Route::get('profile/work_lists/{user?}', 'UserController@getWorkLists')->name('profile.work_lists');
    Route::get('profile/get_job_application/{user?}', 'UserController@getJobApplication')->name('profile.get_job_application');
    Route::get('profile/files/{user?}', 'UserController@getFiles')->name('profile.get_files');
    Route::get('list', 'UserController@getAllUsers')->name('list.all');
    Route::get('list/specialists', 'UserController@specialistsList')->name('list.specialists');
    Route::patch('profile/{user?}', 'UserController@storeProfile')->name('profile.patch');
    Route::patch('{user}/status/{status}', 'UserController@changeStatus')->name('change_status.patch');
    Route::post('{user}/check_file', 'UserFileController@checkFile')->name('check_file.patch');
    Route::patch('{user}/change_password', 'UserController@changePassword')->name('change_password.patch');
});
Route::resource('users', 'UserController', ['name_rewrite' => true]);
