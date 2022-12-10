<?php
    /**
     * الدعم الفني والإستفسارات
     */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;

Route::get('/support', [SupportController::class, 'index'])->middleware(['permission:إدارة الدعم الفني'])->name('support');
Route::get('/support/{id}', [SupportController::class, 'show'])->middleware(['permission:إدارة الدعم الفني'])->name('show.ticket');
Route::post('/support/delete/{id}', [SupportController::class, 'destroy'])->middleware(['permission:إدارة الدعم الفني'])->name('delete.ticket');
Route::post('/support/close/{id}', [SupportController::class, 'toggle'])->middleware(['permission:إدارة الدعم الفني'])->name('toggle.ticket');


// Support chat
Route::post('/support/{id}', [SupportController::class, 'message'])->middleware(['permission:إدارة الدعم الفني'])->name('message.ticket');


// Users version
Route::get('/technical-support', [SupportController::class, 'users_index'])->middleware(['permission:محادثة الدعم الفني'])->name('technical-support');
Route::get('/technical-support/{id}', [SupportController::class, 'users_chat'])->middleware(['permission:محادثة الدعم الفني'])->name('technical-support.show');
Route::post('/technical-support/{id}', [SupportController::class, 'users_message'])->middleware(['permission:محادثة الدعم الفني'])->name('technical-support.message');


// Inquires
Route::get('/inquires', [SupportController::class, 'index_inquires'])->middleware(['permission:إدارة الإستفسارات'])->name('inquires');
Route::get('/inquires/{id}', [SupportController::class, 'show_inquires'])->middleware(['permission:إدارة الإستفسارات'])->name('show.ticket.inquires');
Route::post('/inquires/delete/{id}', [SupportController::class, 'destroy_inquires'])->middleware(['permission:إدارة الإستفسارات'])->name('delete.ticket.inquires');
Route::post('/inquires/close/{id}', [SupportController::class, 'toggle_inquires'])->middleware(['permission:إدارة الإستفسارات'])->name('toggle.ticket.inquires');


// Support chat
Route::post('/inquires/{id}', [SupportController::class, 'message_inquires'])->middleware(['permission:إدارة الإستفسارات'])->name('message.ticket.inquires');


// Users version
Route::get('/inquires-support', [SupportController::class, 'users_index_inquires'])->middleware(['permission:إستعمال الإستفسارات'])->name('inquires-support');
Route::get('/inquires-support/{id}', [SupportController::class, 'users_chat_inquires'])->middleware(['permission:إستعمال الإستفسارات'])->name('inquires-support.show');
Route::post('/inquires-support/{id}', [SupportController::class, 'users_message_inquires'])->middleware(['permission:إستعمال الإستفسارات'])->name('inquires-support.message');
