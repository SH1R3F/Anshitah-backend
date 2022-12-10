<?php

use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Route;

Route::prefix('agendas')->group(function(){
    Route::get('/all',[AgendaController::class,'index'])
    // ->middleware(['permission:عرض كل الخطط'])
    ->name('agendas');


    Route::post('/delete/{id}',[AgendaController::class,'destroy'])
    // ->middleware(['permission:حذف خطة'])
    ->name('agendas.delete');



    Route::get('/create',[AgendaController::class,'create'])
    // ->middleware(['permission:إنشاء خطة'])
    ->name('agendas.create');

    Route::post('/store',[AgendaController::class,'store'])
    // ->middleware(['permission:إنشاء خطة'])
    ->name('agendas.store');

    Route::get('/edit/{id}',[AgendaController::class,'edit'])
    // ->middleware(['permission:تعديل خطة'])
    ->name('agendas.edit');

    Route::post('/update/{id}',[AgendaController::class,'update'])
    // ->middleware(['permission:تعديل خطة'])
    ->name('agendas.update');

});
