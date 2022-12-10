<?php
    /**
     * المحتوى الإلكتروني
     */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

Route::get('/online-content', [ContentController::class, 'index'])->middleware(['permission:عرض المحتوى الإلكتروني'])->name('onlinecontent');
Route::post('/online-content/create', [ContentController::class, 'create'])->middleware(['permission:إضافة مادة'])->name('create.onlinecontent');
Route::post('/online-content/update', [ContentController::class, 'update'])->middleware(['permission:تعديل مادة'])->name('update.onlinecontent');
Route::post('/online-content/delete/{id}', [ContentController::class, 'destroy'])->middleware(['permission:حذف مادة'])->name('delete.onlinecontent');


/**
 * For users
 */

Route::get('/users-online-content', [ContentController::class, 'users_index'])->middleware(['permission:إستعمال المحتوى الإلكتروني'])->name('onlinecontent-users');
