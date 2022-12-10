<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::prefix('/reservations')->group(function () {
    Route::get('/weeks', [ReservationController::class, 'weeks'])
        ->middleware(['permission:عرض الأسابيع'])
        ->name('weeks');

    Route::post('/week/status/{id}', [ReservationController::class, 'weekStatus'])
        ->middleware(['permission:إظهار و إخفاء الأسابيع'])
        ->name('week.status');

    Route::post('/week/delete/{id}', [ReservationController::class, 'weekDelete'])
        ->middleware(['permission:حذف الأسابيع'])
        ->name('week.delete');

    Route::get('/week/edit/{id}', [ReservationController::class, 'weekEdit'])
        ->middleware(['permission:تعديل الأسابيع'])
        ->name('week.edit');

    Route::post('/week/update/{id}', [ReservationController::class, 'weekUpdate'])
        ->middleware(['permission:تعديل الأسابيع'])
        ->name('week.update');

    Route::get('/week/create', [ReservationController::class, 'weekCreate'])
        ->middleware(['permission:إضافة الأسابيع'])
        ->name('week.create');

    Route::post('/week/store', [ReservationController::class, 'weekStore'])
        ->middleware(['permission:إضافة الأسابيع'])
        ->name('week.store');

    Route::get('/chachat/almodir', [ReservationController::class, 'chachatAlModir'])
        ->middleware(['permission:عرض شاشة المدير'])
        ->name('chachat.almodir');

    Route::get('/chachat/almodir/{id}', [ReservationController::class, 'chachatAlModirTable'])
        ->middleware(['permission:عرض شاشة المدير'])
        ->name('chachat.almodir.table');

    Route::post('/chachat/almodir/seance/status/{id}', [ReservationController::class, 'status'])
        ->middleware(['permission:إتاحة و عدم إتاحة حصة'])
        ->name('chachat.almodir.status');

    Route::post('/chachat/almodir/seance/accept/{id}', [ReservationController::class, 'accept'])
        ->middleware(['permission:قبول حجز المعلمين'])
        ->name('chachat.almodir.accept');

    Route::post('/chachat/almodir/seance/deny/{id}', [ReservationController::class, 'deny'])
        ->middleware(['permission:رفض حجز المعلمين'])
        ->name('chachat.almodir.deny');

    Route::post('/chachat/almodir/seance/end/{id}', [ReservationController::class, 'end'])
        ->middleware(['permission:إلغاء حجز المعلمين'])
        ->name('chachat.almodir.end');

    Route::post('/chachat/almodir/seance/hajz/{id}', [ReservationController::class, 'hajz'])
        ->middleware(['permission:حجز حصة للمعلمين'])
        ->name('chachat.almodir.hajz');

    Route::get('/hajz/hodor', [ReservationController::class, 'hajzHodor'])
        ->middleware(['permission:عرض شاشة حجز حضور'])
        ->name('hajz.hodor');

    Route::get('/hajz/hodor/{id}', [ReservationController::class, 'hajzHodorTable'])
        ->middleware(['permission:عرض شاشة حجز حضور'])
        ->name('hajz.hodor.table');

    Route::post('/hajz/hodor/request/{id}', [ReservationController::class, 'hajzHodorRequest'])
        ->middleware(['permission:حجز حضور'])
        ->name('hajz.hodor.request');
});
