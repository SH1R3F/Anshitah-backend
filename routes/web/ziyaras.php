<?php

use App\Http\Controllers\ZiyaraController;
use Illuminate\Support\Facades\Route;

Route::prefix('/ziyaras')->group(function () {
    Route::get('/', [ZiyaraController::class, 'ziyaras'])
        ->middleware(['permission:عرض الأسابيع'])
        ->name('ziyaras');

    Route::get('/print', [ZiyaraController::class, 'ziyaraPrint'])
        ->middleware(['permission:عرض الأسابيع'])
        ->name('ziyara.print');

    Route::post('/ziyara/status/{id}', [ZiyaraController::class, 'ziyaraStatus'])
        ->middleware(['permission:إظهار و إخفاء الأسابيع'])
        ->name('ziyara.status');

    Route::post('/ziyara/delete/{id}', [ZiyaraController::class, 'ziyaraDelete'])
        ->middleware(['permission:حذف الأسابيع'])
        ->name('ziyara.delete');

    Route::get('/ziyara/edit/{id}', [ZiyaraController::class, 'ziyaraEdit'])
        ->middleware(['permission:تعديل الأسابيع'])
        ->name('ziyara.edit');

    Route::post('/ziyara/update/{id}', [ZiyaraController::class, 'ziyaraUpdate'])
        ->middleware(['permission:تعديل الأسابيع'])
        ->name('ziyara.update');

    Route::get('/ziyara/create', [ZiyaraController::class, 'ziyaraCreate'])
        ->middleware(['permission:إضافة الأسابيع'])
        ->name('ziyara.create');

    Route::post('/ziyara/store', [ZiyaraController::class, 'ziyaraStore'])
        ->middleware(['permission:إضافة الأسابيع'])
        ->name('ziyara.store');

    Route::get('/chachat/almodir', [ZiyaraController::class, 'chachatAlModir'])
        ->middleware(['permission:عرض شاشة المدير'])
        ->name('chachat.almodir');

    Route::get('/chachat/almodir/{id}', [ZiyaraController::class, 'chachatAlModirTable'])
        ->middleware(['permission:عرض شاشة المدير'])
        ->name('chachat.almodir.table');

    Route::post('/chachat/almodir/seance/status/{id}', [ZiyaraController::class, 'status'])
        ->middleware(['permission:إتاحة و عدم إتاحة حصة'])
        ->name('chachat.almodir.status');

    Route::post('/chachat/almodir/seance/accept/{id}', [ZiyaraController::class, 'accept'])
        ->middleware(['permission:قبول حجز المعلمين'])
        ->name('chachat.almodir.accept');

    Route::post('/chachat/almodir/seance/deny/{id}', [ZiyaraController::class, 'deny'])
        ->middleware(['permission:رفض حجز المعلمين'])
        ->name('chachat.almodir.deny');

    Route::post('/chachat/almodir/seance/end/{id}', [ZiyaraController::class, 'end'])
        ->middleware(['permission:إلغاء حجز المعلمين'])
        ->name('chachat.almodir.end');

    Route::post('/chachat/almodir/seance/hajz/{id}', [ZiyaraController::class, 'hajz'])
        ->middleware(['permission:حجز حصة للمعلمين'])
        ->name('chachat.almodir.hajz');

    Route::get('/hajz/hodor', [ZiyaraController::class, 'hajzHodor'])
        ->middleware(['permission:عرض شاشة حجز حضور'])
        ->name('hajz.hodor');

    Route::get('/hajz/hodor/{id}', [ZiyaraController::class, 'hajzHodorTable'])
        ->middleware(['permission:عرض شاشة حجز حضور'])
        ->name('hajz.hodor.table');

    Route::post('/hajz/hodor/request/{id}', [ZiyaraController::class, 'hajzHodorRequest'])
        ->middleware(['permission:حجز حضور'])
        ->name('hajz.hodor.request');
});
