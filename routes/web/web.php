<?php

use Illuminate\Support\Facades\Route;
use MohammadMghi\RouteTracker\Http\Controllers\RouteTrackerDashboardController;

Route::middleware(['web', 'auth'])
    ->prefix('route-tracker')
    ->group(function () {
        Route::get('/dashboard', [RouteTrackerDashboardController::class, 'index'])
            ->name('route-tracker.dashboard');
    });
