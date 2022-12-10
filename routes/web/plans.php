<?php

use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('plans')->group(function(){
    Route::get('/all',[PlanController::class,'index'])
    ->middleware(['permission:عرض كل الخطط'])
    ->name('plans');

    Route::get('/show/{id}',[PlanController::class,'show'])
    ->middleware(['permission:عرض خطة'])
    ->name('plans.show');

    Route::post('/delete/{id}',[PlanController::class,'destroy'])
    ->middleware(['permission:حذف خطة'])
    ->name('plans.delete');

    Route::get('/print/{id}',[PlanController::class,'print'])
    ->middleware(['permission:طباعة خطة'])
    ->name('plans.print');

    Route::get('/create',[PlanController::class,'create'])
    ->middleware(['permission:إنشاء خطة'])
    ->name('plans.create');

    Route::post('/store',[PlanController::class,'store'])
    ->middleware(['permission:إنشاء خطة'])
    ->name('plans.store');

    Route::get('/edit/{id}',[PlanController::class,'edit'])
    ->middleware(['permission:تعديل خطة'])
    ->name('plans.edit');

    Route::post('/update/{id}',[PlanController::class,'update'])
    ->middleware(['permission:تعديل خطة'])
    ->name('plans.update');

    Route::get('/ijraat/{id}',[PlanController::class,'ijraat'])
    ->middleware(['permission:تعديل خطة'])
    ->name('plans.ijraat');

    Route::post('/ijraa/update' , [PlanController::class , 'update_ijraa'])
    ->name('update.ijraa');

    Route::post('/ijraa/create' , [PlanController::class , 'create_ijraa'])
    ->name('create.ijraa');

    Route::post('/ijraa/delete/{plan}/{id}' , [PlanController::class , 'delete_ijraa'])
    ->name('delete.ijraa');
});
