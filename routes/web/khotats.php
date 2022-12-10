<?php
    /**
     * التدريب والتطوير
     */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhotatController;

Route::get('/khotats', [KhotatController::class, 'index'])->name('khotats');
Route::post('/khotats/create', [KhotatController::class, 'create'])->name('create.khotats');
Route::post('/khotats/update', [KhotatController::class, 'update'])->name('update.khotats');
Route::post('/khotats/delete/{id}', [KhotatController::class, 'destroy'])->name('delete.khotats');
