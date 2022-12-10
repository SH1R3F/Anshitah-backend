<?php

/**
 * توزيع الطلاب على المجالات
 */

use App\Http\Controllers\StudentFieldController;
use Illuminate\Support\Facades\Route;

Route::prefix('student-fields')->group(function () {
    Route::get('/all', [StudentFieldController::class, 'index'])
        // ->middleware(['permission:عرض كل الخطط'])
        ->name('studentfields');


    Route::post('/delete/{id}', [StudentFieldController::class, 'destroy'])
        // ->middleware(['permission:حذف خطة'])
        ->name('studentfields.delete');



    Route::get('/create', [StudentFieldController::class, 'create'])
        // ->middleware(['permission:إنشاء خطة'])
        ->name('studentfields.create');

    Route::post('/store', [StudentFieldController::class, 'store'])
        // ->middleware(['permission:إنشاء خطة'])
        ->name('studentfields.store');

    Route::get('/edit/{id}', [StudentFieldController::class, 'edit'])
        // ->middleware(['permission:تعديل خطة'])
        ->name('studentfields.edit');

    Route::post('/update/{id}', [StudentFieldController::class, 'update'])
        // ->middleware(['permission:تعديل خطة'])
        ->name('studentfields.update');

    Route::get('/print/{id}', [StudentFieldController::class, 'print'])
        // ->middleware(['permission:طباعة خطة'])
        ->name('studentfields.print');
});
