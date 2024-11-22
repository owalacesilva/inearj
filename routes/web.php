<?php

use App\Http\Controllers\Api\StationApiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataCollectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\StationDetailsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/inventory', [StationController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('inventory');

Route::get('/stations/{code}', [StationDetailsController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('station_details');

Route::get('/data-collections', [DataCollectionController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('data-collections');

Route::get('/api/stations', [StationApiController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('api/stations');

require __DIR__.'/auth.php';
