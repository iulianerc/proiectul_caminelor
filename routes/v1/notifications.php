<?php

use App\Http\Controllers\v1\NotificationController;
use Illuminate\Support\Facades\Route;

Route::prefix('notifications')->name('notifications.')->group(static function () {
    Route::get('list', [NotificationController::class, 'list'])->name('list.get');
    Route::post('send', [NotificationController::class, 'send'])->name('send.post');
    Route::post('{notification_id}/read', [NotificationController::class, 'read'])->name('read.post');
});
