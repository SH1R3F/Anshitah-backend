<?php

use App\Http\Controllers\Api\AgendaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\YearController;
use App\Http\Controllers\Api\KhotatController;
use App\Http\Controllers\Api\InquiryController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\NamadijController;
use App\Http\Controllers\Api\PointController;
use App\Http\Controllers\Api\QiasAdaaController;
use App\Http\Controllers\Api\QuestionnaireController;

Route::prefix('/auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [AuthController::class, 'user']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});


Route::middleware('auth:sanctum')->group(function () {
    /* Manage My Profile */
    Route::get('/my-profile', [ProfileController::class, 'show'])->middleware(['permission:قسم بياناتي']);
    Route::put('/my-profile', [ProfileController::class, 'update'])->middleware(['permission:تعديل البيانات']);

    /* Manage user roles */
    Route::resource('roles', RoleController::class)->except(['edit', 'create'])->middleware(['permission:إعطاء الصلاحيات']);


    /* Manage users */
    Route::get('/users/stats', [UserController::class, 'stats'])->middleware(['permission:عرض المستخدمين']);
    Route::post('/users/import/{type}', [UserController::class, 'import'])->where('type', 'students')->middleware(['permission:عرض المستخدمين']);
    Route::resource('users', UserController::class)->except(['edit', 'create'])->middleware(['permission:عرض المستخدمين']);

    /* Manage years */
    Route::resource('years', YearController::class)->except(['edit', 'create'])->middleware(['permission:عرض المستخدمين']);

    /* Technical Support Routes */
    Route::prefix('support')->middleware(['permission:إدارة الدعم الفني'])->group(function () {
        Route::get('/', [SupportController::class, 'index']);
        Route::get('/{ticket}', [SupportController::class, 'ticket']);
        Route::post('/{ticket}/close', [SupportController::class, 'close']);
        Route::delete('/{ticket}', [SupportController::class, 'delete']);
        Route::post('/{ticket}/messages', [SupportController::class, 'message']);
    });

    /* Inquires support Routes */
    Route::prefix('inquiry')->middleware(['permission:إدارة الإستفسارات'])->group(function () {
        Route::get('/', [InquiryController::class, 'index']);
        Route::get('/{ticket}', [InquiryController::class, 'ticket']);
        Route::post('/{ticket}/close', [InquiryController::class, 'close']);
        Route::delete('/{ticket}', [InquiryController::class, 'delete']);
        Route::post('/{ticket}/messages', [InquiryController::class, 'message']);
    });

    /* Donate shares Routes */
    Route::prefix('donates')->middleware(['permission:قسم المشاركات'])->group(function () {
        // Teachers donations
        Route::get('/teachers', [DonationController::class, 'teachers']);

        // Students donations
        Route::get('/students', [DonationController::class, 'students']);
        Route::delete('/students/{donate}', [DonationController::class, 'delete']);
        Route::put('/students/{donate}', [DonationController::class, 'toggle']);
    });


    /* Manage khotat & Namadij */
    Route::middleware(['permission:قسم الخطط و النماذج'])->group(function () {
        // I know you're thinking why not plans?
        // I received the project having two different types of "plans" pages. One of them was already named Khotat. So i'll keep on it.
        Route::resource('khotat', KhotatController::class)->except(['edit', 'create']);
        Route::resource('namadij', NamadijController::class)->except(['edit', 'create']);
    });

    /* Technical support; users side */
    Route::prefix('/technical-support')->middleware(['permission:محادثة الدعم الفني'])->group(function () {
        Route::get('/', [SupportController::class, 'userTickets']);
        Route::post('/', [SupportController::class, 'newTicket']);
        Route::get('/{ticket}', [SupportController::class, 'userTicket']);
        Route::delete('/{ticket}', [SupportController::class, 'deleteTicket']);
        Route::post('/{ticket}/messages', [SupportController::class, 'newMessage']);
        Route::post('/{ticket}/toggle', [SupportController::class, 'toggle']);
    });

    /* Inquiries support; users side */
    Route::prefix('/inquiries')->middleware(['permission:محادثة الدعم الفني'])->group(function () {
        Route::get('/', [InquiryController::class, 'userTickets']);
        Route::post('/', [InquiryController::class, 'newTicket']);
        Route::get('/{ticket}', [InquiryController::class, 'userTicket']);
        Route::delete('/{ticket}', [InquiryController::class, 'deleteTicket']);
        Route::post('/{ticket}/messages', [InquiryController::class, 'newMessage']);
        Route::post('/{ticket}/toggle', [InquiryController::class, 'toggle']);
    });

    /* My points section */
    Route::prefix('/points')->middleware(['permission:برنامج نقاطي'])->group(function () {
        Route::get('/', [PointController::class, 'index']);
        Route::post('/{user}', [PointController::class, 'point']);
    });
    Route::get('my-points', [PointController::class, 'myPoints'])->middleware(['permission:نقاطي للطلاب']);

    /* Agendas management */
    Route::resource('agendas', AgendaController::class)->except(['edit', 'create'])->middleware(['permission:قسم أجندة']);

    /* Qias-adaa management */
    Route::resource('qias-adaa', QiasAdaaController::class)->except(['edit', 'create'])->middleware(['permission:عرض قياس الأداء']);

    /* Online content management */
    Route::resource('contents', ContentController::class)->except(['edit', 'create'])->middleware(['permission:عرض المحتوى الإلكتروني']);

    /* Online content management */
    Route::resource('questionnaires', QuestionnaireController::class)->except(['edit', 'create'])->middleware(['permission:عرض الإستبيانات']);
});
