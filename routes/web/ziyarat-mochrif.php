<?php

use App\Http\Controllers\ZiyaratMochrifController;
use Illuminate\Support\Facades\Route;

Route::prefix('/ziyaratmochrif')->group(function () {
    Route::get('/', [ZiyaratMochrifController::class, 'index'])
        // ->middleware(['permission:عرض الأسابيع'])
        ->name('ziyaratmochrif');

    Route::get('/print/{ziyaratMochrif}', [ZiyaratMochrifController::class, 'print'])
        // ->middleware(['permission:عرض الأسابيع'])
        ->name('ziyaratmochrif.print');

    // Route::post('/ziyara/status/{id}', [ZiyaratMochrifController::class, 'ziyaraStatus'])
    //     ->middleware(['permission:إظهار و إخفاء الأسابيع'])
    //     ->name('ziyara.status');

    Route::post('/ziyara/delete/{ziyaratMochrif}', [ZiyaratMochrifController::class, 'destroy'])
        // ->middleware(['permission:حذف الأسابيع'])
        ->name('ziyaratmochrif.delete');

    Route::get('/ziyara/edit/{ziyaratMochrif}', [ZiyaratMochrifController::class, 'edit'])
        // ->middleware(['permission:تعديل الأسابيع'])
        ->name('ziyaratmochrif.edit');

    Route::post('/ziyara/update/{ziyaratMochrif}', [ZiyaratMochrifController::class, 'update'])
        // ->middleware(['permission:تعديل الأسابيع'])
        ->name('ziyaratmochrif.update');

    Route::get('/ziyara/create', [ZiyaratMochrifController::class, 'create'])
        // ->middleware(['permission:إضافة الأسابيع'])
        ->name('ziyaratmochrif.create');

    Route::post('/ziyara/store', [ZiyaratMochrifController::class, 'store'])
        // ->middleware(['permission:إضافة الأسابيع'])
        ->name('ziyaratmochrif.store');
});
