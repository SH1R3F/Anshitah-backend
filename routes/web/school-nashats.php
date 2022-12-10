<?php

/**
 * توزيع الطلاب على المجالات
 */

use App\Http\Controllers\SchoolNashatController;
use Illuminate\Support\Facades\Route;

Route::prefix('school-nashats')->group(function () {
    Route::get('/all', [SchoolNashatController::class, 'index'])
        // ->middleware(['permission:عرض كل الخطط'])
        ->name('schoolnashats');


    Route::post('/delete/{id}', [SchoolNashatController::class, 'destroy'])
        // ->middleware(['permission:حذف خطة'])
        ->name('schoolnashats.delete');



    Route::get('/create', [SchoolNashatController::class, 'create'])
        // ->middleware(['permission:إنشاء خطة'])
        ->name('schoolnashats.create');

    Route::post('/store', [SchoolNashatController::class, 'store'])
        // ->middleware(['permission:إنشاء خطة'])
        ->name('schoolnashats.store');

    Route::get('/edit/{id}', [SchoolNashatController::class, 'edit'])
        // ->middleware(['permission:تعديل خطة'])
        ->name('schoolnashats.edit');

    Route::post('/update/{id}', [SchoolNashatController::class, 'update'])
        // ->middleware(['permission:تعديل خطة'])
        ->name('schoolnashats.update');

    Route::get('/print', [SchoolNashatController::class, 'print'])
        // ->middleware(['permission:طباعة خطة'])
        ->name('schoolnashats.print');
    // Route::get('/print/{id}', [SchoolNashatController::class, 'print'])
    //     // ->middleware(['permission:طباعة خطة'])
    //     ->name('schoolnashats.print');
});
