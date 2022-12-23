<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\YearController;
use App\Http\Controllers\Api\PointController;
use App\Http\Controllers\Api\VisitController;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\KhotatController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\InquiryController;
use App\Http\Controllers\Api\NamadijController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\QiasAdaaController;
use App\Http\Controllers\Api\TrainingController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\AchievementController;
use App\Http\Controllers\Api\MedicalController;
use App\Http\Controllers\Api\MonthlyReportController;
use App\Http\Controllers\Api\QuestionnaireController;
use App\Http\Controllers\Api\ScholarActivityController;
use App\Http\Controllers\Api\StudentActivityController;
use App\Http\Controllers\Api\StudentalActivityController;
use App\Http\Controllers\Api\SupervisorVisitController;
use App\Http\Controllers\Api\TeacherActivityController;

Route::get('/', function () {
    return 'Api';
});

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

    /* Questionnaires management */
    Route::resource('questionnaires', QuestionnaireController::class)->except(['edit', 'create'])->middleware(['permission:عرض الإستبيانات']);

    /* Training plans management */
    Route::resource('trainings', TrainingController::class)->except(['edit', 'create'])->middleware(['permission:عرض خطط التدريب']);

    /* Achievements management */
    Route::resource('achievements', AchievementController::class)->except(['edit', 'create'])->middleware(['permission:قسم المراكز و المنجزات']);

    /* Visits management */
    Route::get('visits/print', [VisitController::class, 'print'])->middleware(['permission:قسم الحجوزات']);
    Route::resource('visits', VisitController::class)->except(['edit', 'create'])->middleware(['permission:قسم الحجوزات']);
    // Supervisor visits
    Route::get('supervisor-visits/{supervisor_visit}/print', [SupervisorVisitController::class, 'print'])->middleware(['permission:قسم الزيارات']);
    Route::resource('supervisor-visits', SupervisorVisitController::class)->except(['edit', 'create'])->middleware(['permission:قسم الزيارات']);

    /* Reports management */
    Route::middleware(['permission:عرض التقارير'])->group(function () {
        // Reports
        Route::get('reports/{report}/evaluation', [ReportController::class, 'evaluation']);
        Route::put('reports/{report}/evaluation', [ReportController::class, 'evaluate']);
        Route::get('reports/{report}/evaluation/print', [ReportController::class, 'printEvaluation']);
        Route::get('reports/{report}/print', [ReportController::class, 'print']);
        Route::resource('reports', ReportController::class)->except(['edit', 'create']);

        // Monthly reports
        Route::get('monthly-reports/{monthly_report}/print', [MonthlyReportController::class, 'print']);
        Route::resource('monthly-reports', MonthlyReportController::class)->except(['edit', 'create']);
    });

    /* Quizzes management */
    Route::resource('quizzes', QuizController::class)->except(['edit', 'create'])->middleware(['permission:عرض الإختبارات']);

    /* Activities management */
    Route::prefix('activities')->middleware(['permission:قسم النشاط'])->group(function () {

        // Students activity majles
        Route::get('teacher-nashats/{teacher_nashat}/print', [TeacherActivityController::class, 'print']);
        Route::resource('teacher-nashats', TeacherActivityController::class)->except(['edit', 'create']);

        // Students activities
        Route::resource('student-fields', StudentActivityController::class)->except(['edit', 'create']);

        // Scholar activities
        Route::get('school-nashats/print', [ScholarActivityController::class, 'print']);
        Route::resource('school-nashats', ScholarActivityController::class)->except(['edit', 'create']);

        // Students activity majles
        Route::get('tolab-nashats/print', [StudentalActivityController::class, 'print']);
        Route::resource('tolab-nashats', StudentalActivityController::class)->except(['edit', 'create']);
    });


    /* Medical supervising management */
    Route::resource('medicals', MedicalController::class)->middleware(['permission:الإشراف الطبي']);
});
