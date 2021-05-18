<?php

use App\Http\Controllers\v1\BankController;
use App\Http\Controllers\v1\OrderController;
use App\Http\Controllers\v1\OrderGuaranteeController;
use Illuminate\Support\Facades\Route;

Route::prefix('order_guarantees')->name('order_guarantees.')->group(static function(){
    Route::get('{orderGuarantee}/proof_document', [OrderGuaranteeController::class, 'getProofDocument'])->name('proof_document');
    Route::get('types', [OrderGuaranteeController::class, 'getTypes'])->name('edit');
//    Route::post('{order_guarantee}/proof_document', [OrderGuaranteeController::class, 'getProofDocument'])->name('proof_document');
});
Route::resource('order_guarantees', 'OrderGuaranteeController', ['name_rewrite' => true]);
