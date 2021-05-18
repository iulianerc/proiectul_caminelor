<?php

use App\Http\Controllers\v1\CountryController;
use App\Http\Controllers\v1\CurrencyController;
use App\Http\Controllers\v1\ExchangeRateController;
use Illuminate\Support\Facades\Route;

Route::resource('html_pages', 'HtmlPageController', ['name_rewrite' => true]);
Route::resource('countries', 'CountryController', ['name_rewrite' => true]);
Route::get('countries/list/accept_ata', [CountryController::class, 'list'])->name('countries.list.all');
Route::get('currencies/list', [CurrencyController::class, 'list'])->name('currencies.list');
Route::get('exchange_rates/{currency_id}/{date}', [ExchangeRateController::class, 'getExchange'])->name('exchange_rates.get_exchange');
Route::get('exchange_rates/{currency_id}', [ExchangeRateController::class, 'getExchangeNow'])->name('exchange_rates.get_exchange');
Route::resource('client_bank_accounts', 'ClientBankAccountController', ['name_rewrite' => true]);
Route::resource('system_variable_books', 'SystemVariableBookController', ['name_rewrite' => true]);

