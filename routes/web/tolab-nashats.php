<?php

/**
 * توزيع الطلاب على المجالات
 */

use App\Http\Controllers\TolabNashatController;
use Illuminate\Support\Facades\Route;

Route::prefix('tolab-nashats')->group(function () {
    Route::get('/all', [TolabNashatController::class, 'index'])
        // ->middleware(['permission:عرض كل الخطط'])
        ->name('tolabnashats');


    Route::post('/delete/{id}', [TolabNashatController::class, 'destroy'])
        // ->middleware(['permission:حذف خطة'])
        ->name('tolabnashats.delete');



    Route::get('/create', [TolabNashatController::class, 'create'])
        // ->middleware(['permission:إنشاء خطة'])
        ->name('tolabnashats.create');

    Route::post('/store', [TolabNashatController::class, 'store'])
        // ->middleware(['permission:إنشاء خطة'])
        ->name('tolabnashats.store');

    Route::get('/edit/{id}', [TolabNashatController::class, 'edit'])
        // ->middleware(['permission:تعديل خطة'])
        ->name('tolabnashats.edit');

    Route::post('/update/{id}', [TolabNashatController::class, 'update'])
        // ->middleware(['permission:تعديل خطة'])
        ->name('tolabnashats.update');

    Route::get('/print', [TolabNashatController::class, 'print'])
        // ->middleware(['permission:طباعة خطة'])
        ->name('tolabnashats.print');
    // Route::get('/print/{id}', [TolabNashatController::class, 'print'])
    //     // ->middleware(['permission:طباعة خطة'])
    //     ->name('tolabnashats.print');
});
