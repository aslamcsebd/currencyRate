<?php

use Illuminate\Support\Facades\Route;

Route::get('home', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/commission-rate', [App\Http\Controllers\CurrencyController::class, 'commission_rate'])->name('commission_rate');
Route::post('/csv_import', [App\Http\Controllers\CurrencyController::class, 'csv_import'])->name('csv_import');

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";
 });
