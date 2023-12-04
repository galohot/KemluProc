<?php

use App\Http\Controllers\ISBsirupController;
use App\Http\Controllers\DataFetchController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ISBlpseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SatkerController;
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

Route::get('/main/{tahun_anggaran}', [HomeController::class, 'show'])->name('main.show');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/fetch-all-data', [DataFetchController::class, 'fetchAllData']);
Route::get('/fetch-data-epurchasing', [DataFetchController::class, 'fetchDataEpurchasing']);
Route::get('/fetch-data-lpse', [DataFetchController::class, 'fetchDataLpse']);
Route::get('/fetch-data-sirup', [DataFetchController::class, 'fetchDataSirup']);

Route::get('/sirup/{kd_satker}', [ISBsirupController::class, 'show']);
Route::get('/lpse/{kd_satker}', [ISBlpseController::class, 'show']);
Route::get('/satker/{kd_satker_str}', [SatkerController::class, 'show']);
Route::get('/satker/{tahun_anggaran}/{kd_satker_str}', [SatkerController::class, 'show'])->name('satker.show');
Route::get('/error-page', [ErrorController::class, 'errorPage'])->name('error.page');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';