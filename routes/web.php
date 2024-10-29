<?php

use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inventory', [StationController::class, 'index'])->name('inventory');