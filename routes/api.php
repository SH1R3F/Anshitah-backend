<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\RoleController;

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
    Route::get('/roles', [RoleController::class, 'index'])->middleware(['permission:إعطاء الصلاحيات']);
    Route::post('/roles', [RoleController::class, 'store'])->middleware(['permission:إعطاء الصلاحيات']);
    Route::get('/roles/{role}', [RoleController::class, 'show'])->middleware(['permission:إعطاء الصلاحيات']);
    Route::put('/roles/{role}', [RoleController::class, 'update'])->middleware(['permission:إعطاء الصلاحيات']);
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->middleware(['permission:إعطاء الصلاحيات']);
});
