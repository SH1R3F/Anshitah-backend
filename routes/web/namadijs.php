<?php
    /**
     * التدريب والتطوير
     */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NamadijController;

Route::get('/namadijs', [NamadijController::class, 'index'])->name('namadijs');
Route::post('/namadijs/create', [NamadijController::class, 'create'])->name('create.namadijs');
Route::post('/namadijs/update', [NamadijController::class, 'update'])->name('update.namadijs');
Route::post('/namadijs/delete/{id}', [NamadijController::class, 'destroy'])->name('delete.namadijs');
