<?php

use App\Http\Controllers\Currency\ExchangeController;
use Illuminate\Support\Facades\Route;

Route::get('currency/exchange', [ExchangeController::class, 'index'])
->name('get.api.currency.exchange.index');
