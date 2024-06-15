<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\FileUploadController;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('profile', [UserProfileController::class, 'show'])->name('profile');
    Route::get('create-user', [UserProfileController::class, 'view_create'])->name('create-user');
    Route::get('dashboard', [FileUploadController::class, 'userExcelData'])->name('user-excel-data');
    Route::get('upload-excel', [FileUploadController::class, 'view'])->name('upload-excel');

    Route::post('upload-excel', [FileUploadController::class, 'uploadExcel'])->name('upload-excel');
    Route::post('store-excel', [FileUploadController::class, 'storeExcel'])->name('store-excel');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('update-profile', [UserProfileController::class, 'update'])->name('profile-update');

    Route::middleware('role:admin')->group(function () {
        Route::post('create-user', [UserProfileController::class, 'create'])->name('profile.create');
    });
});