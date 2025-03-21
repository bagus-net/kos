<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Models\BoardingHouse;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/city{slug}', [CityController::class, 'show'])->name('city.show');

Route::get('/kos{slug}', [BoardingHouseController::class, 'show'])->name('kos.show');
Route::get('/kos{slug}/rooms', [BoardingHouseController::class, 'rooms'])->name('kos.rooms');

Route::get('/find-kos', [BoardingHouseController::class, 'find'])->name('find-kos');
Route::get('/find-results', [BoardingHouseController::class, 'findResults'])->name('find-kos.results');
Route::get('/find-results', [BoardingHouseController::class, 'findResults'])->name('find-kos.results');

Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');

