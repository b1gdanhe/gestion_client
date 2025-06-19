<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::resource('/orders', OrderController::class)->middleware('auth');
Route::resource('/orders/invoice', OrderController::class)->name('show','orders.invoice')->middleware('auth');
