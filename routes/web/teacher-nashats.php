<?php

use App\Http\Controllers\TeacherNashatController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher-nashats')->group(function(){
    Route::get('/all',[TeacherNashatController::class,'index'])
    // ->middleware(['permission:عرض كل الخطط'])
    ->name('teachernashats');


    Route::post('/delete/{id}',[TeacherNashatController::class,'destroy'])
    // ->middleware(['permission:حذف خطة'])
    ->name('teachernashats.delete');



    Route::get('/create',[TeacherNashatController::class,'create'])
    // ->middleware(['permission:إنشاء خطة'])
    ->name('teachernashats.create');

    Route::post('/store',[TeacherNashatController::class,'store'])
    // ->middleware(['permission:إنشاء خطة'])
    ->name('teachernashats.store');

    Route::get('/edit/{id}',[TeacherNashatController::class,'edit'])
    // ->middleware(['permission:تعديل خطة'])
    ->name('teachernashats.edit');

    Route::post('/update/{id}',[TeacherNashatController::class,'update'])
    // ->middleware(['permission:تعديل خطة'])
    ->name('teachernashats.update');

    Route::get('/print/{id}',[TeacherNashatController::class,'print'])
    // ->middleware(['permission:طباعة خطة'])
    ->name('teachernashats.print');

});
