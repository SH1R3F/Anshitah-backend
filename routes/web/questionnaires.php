<?php
    /**
     * الإستبيانات
     */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnaireController;

Route::get('/questionnaires', [QuestionnaireController::class, 'index'])->middleware(['permission:عرض الإستبيانات'])->name('questionnaires');
Route::post('/questionnaires/create', [QuestionnaireController::class, 'create'])->middleware(['permission:إضافة إستبيان'])->name('create.questionnaires');
Route::post('/questionnaires/update', [QuestionnaireController::class, 'update'])->middleware(['permission:تعديل إستبيان'])->name('update.questionnaires');
Route::post('/questionnaires/delete/{id}', [QuestionnaireController::class, 'destroy'])->middleware(['permission:حذف إستبيان'])->name('delete.questionnaires');

