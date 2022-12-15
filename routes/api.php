<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\YearController;
use App\Http\Controllers\Api\InquiryController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\DonationController;
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

    /* Manage years */
    Route::resource('years', YearController::class)->except(['edit', 'create'])->middleware(['permission:عرض المستخدمين']);

    /* Technical Support Routes */
    Route::prefix('support')->middleware(['permission:إدارة الدعم الفني'])->group(function () {
        Route::get('/', [SupportController::class, 'index']);
        Route::get('/{ticket}', [SupportController::class, 'ticket']);
        Route::post('/{ticket}/close', [SupportController::class, 'close']);
        Route::delete('/{ticket}', [SupportController::class, 'delete']);
        Route::post('/{ticket}/messages', [SupportController::class, 'message']);
    });

    /* Inquires support Routes */
    Route::prefix('inquiry')->middleware(['permission:إدارة الإستفسارات'])->group(function () {
        Route::get('/', [InquiryController::class, 'index']);
        Route::get('/{ticket}', [InquiryController::class, 'ticket']);
        Route::post('/{ticket}/close', [InquiryController::class, 'close']);
        Route::delete('/{ticket}', [InquiryController::class, 'delete']);
        Route::post('/{ticket}/messages', [InquiryController::class, 'message']);
    });

    /* Donate shares Routes */
    Route::prefix('donates')->group(function () {
        // Teachers donations
        Route::get('/teachers', [DonationController::class, 'teachers']);

        // Students donations
        Route::get('/students', [DonationController::class, 'students']);
        Route::delete('/students/{donate}', [DonationController::class, 'delete']);
        Route::put('/students/{donate}', [DonationController::class, 'toggle']);
    });
});
