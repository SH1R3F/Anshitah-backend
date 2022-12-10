<?php

use App\Http\Controllers\AchievementController;
use Illuminate\Support\Facades\Route;

Route::prefix('achievements')->group(function(){
    Route::get('/all',[AchievementController::class,'index'])
    // ->middleware(['permission:عرض كل الخطط'])
    ->name('achievements');


    Route::post('/delete/{id}',[AchievementController::class,'destroy'])
    // ->middleware(['permission:حذف خطة'])
    ->name('achievements.delete');



    Route::get('/create',[AchievementController::class,'create'])
    // ->middleware(['permission:إنشاء خطة'])
    ->name('achievements.create');

    Route::post('/store',[AchievementController::class,'store'])
    // ->middleware(['permission:إنشاء خطة'])
    ->name('achievements.store');

    Route::get('/edit/{id}',[AchievementController::class,'edit'])
    // ->middleware(['permission:تعديل خطة'])
    ->name('achievements.edit');

    Route::post('/update/{id}',[AchievementController::class,'update'])
    // ->middleware(['permission:تعديل خطة'])
    ->name('achievements.update');

});
