<?php
    /**
     * قياس الأداء
     */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerformanceController;

Route::get('/performance', [PerformanceController::class, 'index'])->middleware(['permission:عرض قياس الأداء'])->name('performance');
