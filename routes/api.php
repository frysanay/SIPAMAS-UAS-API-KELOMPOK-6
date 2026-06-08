<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MyReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

// ── Public Routes ──────────────────────────────────────────
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// ── Protected Routes (JWT) ─────────────────────────────────
Route::middleware('auth:api')->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);

    // Profile
    Route::get('/profile',  [ProfileController::class, 'show']);
    Route::put('/profile',  [ProfileController::class, 'update']);

    // Laporan
    Route::post('/reports',      [ReportController::class, 'store']);
    Route::get('/reports',       [ReportController::class, 'index']);
    Route::get('/reports/{id}',  [ReportController::class, 'show']);
    Route::delete('/reports/{id}', [ReportController::class, 'destroy']);

    // Status laporan (harus sebelum /reports/{id} yang generic agar tidak bentrok)
    Route::get('/reports/{id}/status', [StatusController::class, 'reportStatus']);

    // Histori laporan saya
    Route::get('/my-reports',      [MyReportController::class, 'index']);
    Route::get('/my-reports/{id}', [MyReportController::class, 'show']);

    // Kategori
    Route::get('/categories', [CategoryController::class, 'index']);

    // Status
    Route::get('/statuses', [StatusController::class, 'index']);
});
