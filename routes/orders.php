<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::resource('/orders', OrderController::class)->middleware('auth');
