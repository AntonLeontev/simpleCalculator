<?php

use App\Http\Controllers\CalculationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::post('/', [CalculationController::class, 'calculate'])->name('calculate');
