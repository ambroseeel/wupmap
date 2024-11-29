<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', action: [DashboardController::class, 'index'])->name('papunta_sa_dashboard');
Route::get('/dashboard', action: [DashboardController::class, 'index'])->name('papunta_sa_dashboard');
Route::get('/google-map', [GoogleController::class, 'googleMap'])->name('google_map_route_name');
