<?php

use Illuminate\Support\Facades\Route;

Route::get('home', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/csv_import', [App\Http\Controllers\CurrencyController::class, 'csv_import'])->name('csv_import');
