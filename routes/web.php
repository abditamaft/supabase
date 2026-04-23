<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\DashboardController; // <-- Tambahkan baris ini
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\SubjectController;

// 1. Arahkan halaman utama ('/') langsung ke Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// 2. Fitur CRUD Mahasiswa tetap dipertahankan
Route::resource('biodatas', BiodataController::class);
Route::resource('class_rooms', ClassRoomController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('schedules', ScheduleController::class);