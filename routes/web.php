<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('redirect', [AuthController::class, 'redirect'])->name('auth.redirect');
        Route::get('callback', [AuthController::class, 'callback'])->name('auth.callback');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    });
});
