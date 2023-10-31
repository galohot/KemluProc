<?php

use App\Http\Controllers\ISBsirupController;
use App\Http\Controllers\DataFetchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fetch-all-data', [DataFetchController::class, 'fetchAllData']);
Route::get('/fetch-data-epurchasing', [DataFetchController::class, 'fetchDataEpurchasing']);
Route::get('/fetch-data-lpse', [DataFetchController::class, 'fetchDataLpse']);
Route::get('/fetch-data-sirup', [DataFetchController::class, 'fetchDataSirup']);

Route::get('/sirup/{kd_satker}', [ISBsirupController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard-layout');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
