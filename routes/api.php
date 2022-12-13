<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\Auth\AuthController;

Route::prefix('/auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [AuthController::class, 'user']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});


Route::middleware('auth:sanctum')->group(function () {
    /* Manage My Profile */
    Route::get('/my-profile', [ProfileController::class, 'show'])->middleware(['permission:قسم بياناتي']);
    Route::put('/my-profile', [ProfileController::class, 'update'])->middleware(['permission:تعديل البيانات']);

    /* Manage user roles */
    Route::resource('roles', RoleController::class)->except(['edit', 'create'])->middleware(['permission:إعطاء الصلاحيات']);


    /* Manage users */
    Route::get('/users/stats', [UserController::class, 'stats'])->middleware(['permission:عرض المستخدمين']);
    Route::post('/users/import/{type}', [UserController::class, 'import'])->where('type', 'students')->middleware(['permission:عرض المستخدمين']);
    Route::resource('users', UserController::class)->except(['edit', 'create'])->middleware(['permission:عرض المستخدمين']);
});
