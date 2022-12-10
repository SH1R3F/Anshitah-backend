<?php

use App\Http\Controllers\QiasAdaaController;
use Illuminate\Support\Facades\Route;

Route::prefix('qias-adaas')->group(function(){
    Route::get('/all',[QiasAdaaController::class,'index'])
    // ->middleware(['permission:عرض كل الخطط'])
    ->name('qiasadaas');


    Route::post('/delete/{id}',[QiasAdaaController::class,'destroy'])
    // ->middleware(['permission:حذف خطة'])
    ->name('qiasadaas.delete');



    Route::get('/create',[QiasAdaaController::class,'create'])
    // ->middleware(['permission:إنشاء خطة'])
    ->name('qiasadaas.create');

    Route::post('/store',[QiasAdaaController::class,'store'])
    // ->middleware(['permission:إنشاء خطة'])
    ->name('qiasadaas.store');

    Route::get('/edit/{id}',[QiasAdaaController::class,'edit'])
    // ->middleware(['permission:تعديل خطة'])
    ->name('qiasadaas.edit');

    Route::post('/update/{id}',[QiasAdaaController::class,'update'])
    // ->middleware(['permission:تعديل خطة'])
    ->name('qiasadaas.update');

    Route::get('/print/{id}',[QiasAdaaController::class,'print'])
    // ->middleware(['permission:طباعة خطة'])
    ->name('qiasadaas.print');

});
