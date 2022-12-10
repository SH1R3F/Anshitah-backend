<?php
    /**
     * التدريب والتطوير
     */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;

Route::get('/trainings', [TrainingController::class, 'index'])->middleware(['permission:عرض خطط التدريب'])->name('trainings');
Route::post('/trainings/create', [TrainingController::class, 'create'])->middleware(['permission:إضافة خطة تدريب'])->name('create.trainingplan');
Route::post('/trainings/update', [TrainingController::class, 'update'])->middleware(['permission:تعديل خطة تدريب'])->name('update.trainingplan');
Route::post('/trainings/delete/{id}', [TrainingController::class, 'destroy'])->middleware(['permission:حذف خطة تدريب'])->name('delete.trainingplan');
