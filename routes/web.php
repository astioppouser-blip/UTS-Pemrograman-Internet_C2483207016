<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RecommendationController;

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/ruangan', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/ruangan/{id}', [RoomController::class, 'show'])->whereNumber('id')->name('rooms.show');
Route::get('/kebutuhan', [RecommendationController::class, 'form'])->name('recommendations.form');
Route::get('/rekomendasi/hasil', [RecommendationController::class, 'result'])->name('recommendations.result');
Route::get('/analisis', [DashboardController::class, 'analysis'])->name('analysis');
Route::get('/jadwal', [RoomController::class, 'schedules'])->name('schedules');
Route::get('/tentang', [DashboardController::class, 'about'])->name('about');
