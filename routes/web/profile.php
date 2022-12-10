<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::prefix('/profile')->group(function(){
    Route::get('/', [ProfileController::class, 'index'])->middleware(['permission:قسم بياناتي'])->name('profile');
    Route::get('/edit', [ProfileController::class, 'edit'])->middleware(['permission:تعديل البيانات'])->name('profile.edit');
    Route::post('/update', [ProfileController::class, 'update'])->middleware(['permission:تعديل البيانات'])->name('profile.update');
});
