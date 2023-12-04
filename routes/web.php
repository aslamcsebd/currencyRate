<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CurrencyController;

Route::get('home', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/csv_import', [CurrencyController::class, 'csv_import'])->name('csv_import');
Route::get('/export', [CurrencyController::class, 'export'])->name('export');
Route::get('/commission-rate', [CurrencyController::class, 'commission_rate'])->name('commission_rate');
Route::get('/doct', [CurrencyController::class, 'doct'])->name('doct');


Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";
 });
