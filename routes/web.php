<?php

use App\Http\Controllers\v1\GeneratePDFController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('volet')->group(function () {
    Route::get('import/front', [GeneratePDFController::class, 'importVoucher']);
    Route::get('reimport/front', [GeneratePDFController::class, 'reimportVoucher']);
    Route::get('reexport/front', [GeneratePDFController::class, 'reexportVoucher']);
    Route::get('transit/front', [GeneratePDFController::class, 'transitVoucher']);
    Route::prefix('export')->group(function () {
        Route::get('front', [GeneratePDFController::class, 'exportVoucher']);
        Route::get('back', [GeneratePDFController::class, 'generalList']);
        Route::get('anex', [GeneratePDFController::class, 'generalListContinuation']);
    });

    Route::get('export/preview', [GeneratePDFController::class, 'exportVoucherPreview']);
    Route::get('import/preview', [GeneratePDFController::class, 'importVoucherPreview']);
    Route::get('reimport/preview', [GeneratePDFController::class, 'reimportVoucherPreview']);
    Route::get('reexport/preview', [GeneratePDFController::class, 'reexportVoucherPreview']);
    Route::get('transit/preview', [GeneratePDFController::class, 'transitVoucherPreview']);
});
Route::prefix('cotor')->group(function () {
    Route::get('export_reimport', [GeneratePDFController::class, 'exportReimportTalon']);
    Route::get('import_reexport', [GeneratePDFController::class, 'importReexportTalon']);
    Route::get('transit', [GeneratePDFController::class, 'transitTalon']);

    Route::get('export_reimport/preview', [GeneratePDFController::class, 'exportReimportTalonPreview']);
    Route::get('import_reexport/preview', [GeneratePDFController::class, 'importReexportTalonPreview']);
    Route::get('transit/preview', [GeneratePDFController::class, 'transitTalonPreview']);
});
Route::prefix('main')->group(function () {
    Route::get('front', [GeneratePDFController::class, 'mainSheet']);
    Route::get('back', [GeneratePDFController::class, 'generalList']);
    Route::get('anex', [GeneratePDFController::class, 'generalListContinuation']);
});
Route::prefix('last')->group(function () {
    Route::get('rules', [GeneratePDFController::class, 'rules']);
    Route::get('associations', [GeneratePDFController::class, 'guarantee']);
});
