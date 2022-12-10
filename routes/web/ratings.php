<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RatingController;

Route::prefix('/ratings')->group(function () {
    Route::get('/all', [RatingController::class, 'all'])
        ->middleware(['permission:عرض كل الزيارات'])
        ->name('ratings');

    Route::get('/my', [RatingController::class, 'my'])
        ->middleware(['permission:عرض الزيارات الخاصة بي'])
        ->name('ratings.my');

    Route::get('/create', [RatingController::class, 'create'])
        ->middleware(['permission:إنشاء زيارة'])
        ->name('ratings.create');

    Route::post('/store', [RatingController::class, 'store'])
        ->middleware(['permission:إنشاء زيارة'])
        ->name('ratings.store');

    Route::get('/edit/{id}', [RatingController::class, 'edit'])
        ->middleware(['permission:تعديل زيارة'])
        ->name('ratings.edit');

    Route::post('/update/{id}', [RatingController::class, 'update'])
        ->middleware(['permission:تعديل زيارة'])
        ->name('ratings.update');

    Route::post('/delete/{id}', [RatingController::class, 'delete'])
        ->middleware(['permission:حذف زيارة'])
        ->name('ratings.delete');

    Route::post('/status/{id}', [RatingController::class, 'status'])
        ->middleware(['permission:إخفاء أو عرض الزيارة'])
        ->name('ratings.status');

    Route::get('/show/{id}', [RatingController::class, 'show'])
        ->middleware(['permission:عرض زيارة للمدير'])
        ->name('ratings.show');

    Route::get('/teacher', [RatingController::class, 'ratingsTeacher'])
        ->middleware(['permission:عرض زيارات المعلم'])
        ->name('all.ratings.teacher');

    Route::get('/show/{id}/teacher', [RatingController::class, 'showTeacher'])
        ->middleware(['permission:عرض زيارة للمعلم'])
        ->name('ratings.show.teacher');
});
