<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\YearController;
use App\Models\Classe;
use App\Models\Donate;
use App\Models\DonateTeacher;
use App\Models\Exam;
use App\Models\ExamStep;
use App\Models\File;
use App\Models\FileShared;
use App\Models\Groupe;
use App\Models\GroupePermission;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizStudent;
use App\Models\Shared;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
// use PDF;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // Old
    // if(Auth::user()->hasRole('طالب')){
    //     return view('students-app.index' , [
    //         'title' => 'الرئيسية',
    //         'quizzes' => Quiz::all(),
    //     ]);
    // }

    return view('index', [
        'title' => 'لوحة التحكم'
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// قسم بياناتي
require __DIR__ . '/web/profile.php';
require __DIR__ . '/web/folders.php';

// قسم الحجوزات
require __DIR__ . '/web/reservations.php';

// قسم الزيارات
require __DIR__ . '/web/ratings.php';

// قسم الخطة الإستراتيجية و التشغيلية
require __DIR__ . '/web/plans.php';

// قسم الأجندة
require __DIR__ . '/web/agendas.php';

// قسم المراكز و المنجزات
require __DIR__ . '/web/achievements.php';

// قسم المراكز و المنجزات
require __DIR__ . '/web/teacher-nashats.php';

// قسم المراكز و المنجزات
require __DIR__ . '/web/school-nashats.php';

// قسم المراكز و المنجزات
require __DIR__ . '/web/tolab-nashats.php';

// قسم المراكز و المنجزات
require __DIR__ . '/web/qias-adaas.php';

// قسم المراكز و المنجزات
require __DIR__ . '/web/student-fields.php';

// قسم العناصر البشرية
require __DIR__ . '/web/users.php';

// قسم إدارة المجموعات
require __DIR__ . '/web/roles.php';

// قسم التقارير
require __DIR__ . '/web/reports.php';

// قسم الإختبارات
require __DIR__ . '/students/quizzes.php';

// التدريب والتطوير
require __DIR__ . '/web/trainings.php';

// الخطط و النماذج
require __DIR__ . '/web/khotats.php';
require __DIR__ . '/web/namadijs.php';

// المحتوى الإلكتروني
require __DIR__ . '/web/online-content.php';

// المادة الدراسية
require __DIR__ . '/web/subjects.php';


require __DIR__ . '/web/ziyaras.php';
require __DIR__ . '/web/ziyarat-mochrif.php';

// الإستبيانات
require __DIR__ . '/web/questionnaires.php';

// قياس الأداء
require __DIR__ . '/web/performance.php';

// قياس الأداء
require __DIR__ . '/web/support.php';

// قسم الإختبارات
require __DIR__ . '/students/questions.php';





// Route::get('/import/students',function(){
//     Excel::import(new StudentsImport,__DIR__ . './../public/assets/students.xlsx');
// });
Route::get('/import/users', [ImportController::class, 'importUsers'])->name('import.users');
Route::post('/import/students', [ImportController::class, 'importStudents'])->name('import.students');



// Years and classes
Route::get('/years', [YearController::class, 'index'])->name('years');
Route::post('/years/store', [YearController::class, 'store'])->name('create.year');
Route::post('/years/update', [YearController::class, 'update'])->name('update.year');
Route::post('/years/delete/{id}', [YearController::class, 'destroy'])->name('delete.year');


// Old
// Route::get('/students',function(){
//     return view('students.index-old',[
//         'title' => 'إدارة الطلاب',
//         'classes' => Classe::all(),
//         'groupes' => Groupe::all(),
//         // 'students' => Student::search($_GET['q'] ?? '')
//         'students' => User::role('طالب')->get()
//     ]);
// })->name('students');

Route::get('/roadalnashat', function () {

    $years = [];
    foreach (Year::all('id', 'number') as $year) {
        $years[strval($year->id)] = strval($year->number);
    }

    return view('roadalnashat.index', [
        'title' => 'رواد النشاط',
        'users' => User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'رائد نشاط');
        })->get(),
        'years' => $years
    ]);
})->name('roadalnashat');

Route::get('/students', function () {

    $years = [];
    foreach (Year::all('id', 'number') as $year) {
        $years[strval($year->id)] = strval($year->number);
    }

    return view('students.index', [
        'title' => 'الطلاب',
        'users' => User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'طالب');
        })->get(),
        'years' => $years
    ]);
})->name('students');


Route::get('/student/info', function () {

    return view('students-app.info', [
        'title' => 'معلوماتي الشخصية'
    ]);
})->name('student.info');


Route::get('/check/{permission}', function ($p) {
    $permission = 'رفع ملف ' . $p;
    if (Auth::user()->can($permission)) return true;
    return false;
});


Route::get('/quiz/{id}', function ($id) {
    $quiz = Quiz::findOrFail($id);
    $questions1 = Question::where('quiz_id', $quiz->id)
        ->where('topic', 'الاستدلال اللغوى وفهم المقروء')->get();
    $questions2 = Question::where('quiz_id', $quiz->id)
        ->where('topic', 'الاستدلال الرياضي والمكاني')->get();
    $questions3 = Question::where('quiz_id', $quiz->id)
        ->where('topic', 'الاستدلال العلمي والميكانيكي')->get();
    $questions4 = Question::where('quiz_id', $quiz->id)
        ->where('topic', 'المرونة العقليه')->get();
    return view('students-app.quizzes.quiz', [
        'title' => 'بدأ الإختبار',
        'questions1' => $questions1,
        'questions2' => $questions2,
        'questions3' => $questions3,
        'questions4' => $questions4,
        'quiz' => $quiz
    ]);
})->name('quiz');
Route::post('/quiz/{id}', function ($id, Request $req) {
    foreach ($req->q as $q) {
        if ($q['answer'] == 'null') {
            return back()->with('delete', 'لم تدخل كل الأجوبة');
        }
    }
    $quiz = Quiz::findOrFail($id);
    $marks = 0;
    $pdfQuestions = [];
    $pdfAnswers = [];
    $pdfMarks = [];
    foreach ($req->q as $q) {
        $question = Question::findOrFail($q['question']);
        $pdfQuestions[] = $question;
        if ($q['answer'] == $question->answer) {
            $marks += $question->mark;
            $pdfAnswers[] = $q['answer'];
            $pdfMarks[] = $question->mark;
        } else {
            $pdfAnswers[] = $q['answer'];
            $pdfMarks[] = 0;
        }
    }
    // make pdf
    $quizdone = new QuizStudent();
    $quizdone->user_id = Auth::user()->id;
    $quizdone->quiz_id = $quiz->id;
    $filename = env('STORAGE_PATH') . 'quizzes/' . time() . '-quiz.pdf';
    // send sms
    $data = [
        'quiz' => $quiz,
        'path' => public_path('assets/media/pdf-print/logo.png'),
        'questions' => $pdfQuestions,
        'answers' => $pdfAnswers,
        'marks' => $pdfMarks,
        'total' => $marks
    ];
    $pdf = PDF::loadView('quizzes.print', $data, [], [
        'format' => 'A3-L',
    ]);
    $pdf->save(public_path($filename));
    $quizdone->file = $filename;
    $quizdone->save();


    return redirect()->to('/')->with('update', 'ثم إرسال الإختبار يمكنك الإطلاع على النتيجة');
})->name('quiz.store');


/**
 * نقل الملفات من مجلد لمجلد
 */
Route::get('/shared/files/{id}', function ($id) {
    return response()->json(Shared::sharedFiles($id));
});
Route::post('/transfer', function (Request $req) {
    $shared = Shared::findOrFail($req->shared);
    /**
     * Deal with shared files
     */
    if ($req->items) {
        foreach ($req->items as $file) {
            $shared_file = FileShared::findOrFail($file);
            $shared_file->shared_id = $shared->id;
            $shared_file->save();
        }
    }
    return back()->with('update', 'تم نقل الملفات بنجاح');
})->name('transfer.shared.file');

/**
 * وقت التطوع للمدرسين
 */
// Submit donate form
Route::get('/donate/teacher', function () {
    $schools = [
        'ابتدائية الأندلس',
        'ابتدائية الإمام عاصم لتحفيظ القرآن',
        'ابتدائية الجزيرة',
        'ابتدائية الحويلات',
        'ابتدائية الدانة',
        'ابتدائية الدفي',
        'ابتدائية الرياض',
        'ابتدائية الفناتير',
        'ابتدائية الفيحاء',
        'ابتدائية المرجان',
        'ابتدائية المطرفية',
        'ابتدائية الواحة',
        'ابتدائية جلمودة',
        'ابتدائية حراء',
        'ابتدائية نجد',
        'ابتدائية هجر',
        'ثانوية أم القرى - مقررات',
        'ثانوية الأحساء - مقررات',
        'ثانوية الدفي - مقررات',
        'ثانوية الرواد',
        'ثانوية العلا',
        'ثانوية نجد - مقررات',
        'متوسطة أم القرى',
        'متوسطة الإمام عاصم لتحفيظ القرآن الكريم',
        'متوسطة الخليج',
        'متوسطة الصديق',
        'متوسطة الفاروق',
        'متوسطة المروج',
        'متوسطة نجد'
    ];
    $sofof1 = [
        'الأول ابتدائي',
        'الثاني ابتدائي',
        'الثالث ابتدائي',
        'الرابع ابتدائي',
        'الخامس ابتدائي',
        'السادس ابتدائي'
    ];
    $sofof2 = [
        'الأول متوسط',
        'الثاني متوسط',
        'الثالث متوسط'
    ];
    $sofof3 = [
        'الأول ثانوي',
        'الثاني ثانوي',
        'الثالث ثانوي'
    ];
    $fosol = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    return view('donate-teacher.student', [
        'schools' => $schools,
        'sofof1' => $sofof1,
        'sofof2' => $sofof2,
        'sofof3' => $sofof3,
        'fosol' => $fosol,
    ]);
})->middleware(['auth', 'permission:مشاركات المعلمين']);

// Submit donate request
Route::post('/donate-post/teacher', function (Request $req) {
    $req->validate([
        'name' => 'required',
        'school' => 'required',
        'file' => 'required_if:path,null',
        'path' => 'required_if:file,null',
    ]);
    $donate = new DonateTeacher();
    $donate->name   = $req->name;
    $donate->school = $req->school;
    // file
    if ($req->hasFile('file')) {
        $donate->file = $req->file->store('donates-teachers');
    }
    // path
    if ($req->path)
        $donate->path = $req->path;
    $donate->save();
    return back()->with('success', 'تم ارسال المشاركة');
})->name('donate-teacher-post');

// List donates
Route::get('/donate/teacher/active', function () {
    $schools = [
        'ابتدائية الأندلس',
        'ابتدائية الإمام عاصم لتحفيظ القرآن',
        'ابتدائية الجزيرة',
        'ابتدائية الحويلات',
        'ابتدائية الدانة',
        'ابتدائية الدفي',
        'ابتدائية الرياض',
        'ابتدائية الفناتير',
        'ابتدائية الفيحاء',
        'ابتدائية المرجان',
        'ابتدائية المطرفية',
        'ابتدائية الواحة',
        'ابتدائية جلمودة',
        'ابتدائية حراء',
        'ابتدائية نجد',
        'ابتدائية هجر',
        'ثانوية أم القرى - مقررات',
        'ثانوية الأحساء - مقررات',
        'ثانوية الدفي - مقررات',
        'ثانوية الرواد',
        'ثانوية العلا',
        'ثانوية نجد - مقررات',
        'متوسطة أم القرى',
        'متوسطة الإمام عاصم لتحفيظ القرآن الكريم',
        'متوسطة الخليج',
        'متوسطة الصديق',
        'متوسطة الفاروق',
        'متوسطة المروج',
        'متوسطة نجد'
    ];
    $sofof = [
        'الصف الاول',
        'الصف الثاني',
        'الصف الثالث',
        'الصف الرابع',
        'الصف الخامس',
        'الصف السادس',
    ];
    $fosol = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    $donates = DonateTeacher::all();
    if (isset($_GET['name']) || isset($_GET['school'])) {
        $name   = $_GET['name'] ?? '';
        $school = $_GET['school'] ?? '';
        $donates = DonateTeacher
            ::where(
                [
                    ['name', 'like', "%$name%"],
                    ['school', 'like', "%$school%"]
                ]
            )
            // ->orWhere('school' , 'like' , "%$school%")
            // ->orWhere('saf' , 'like' , "%$saf%")
            // ->orWhere('fasle' , 'like' , "%$fasle%")
            // ->paginate(7);
            ->get();
    }
    return view('donate-teacher.active', [
        'title' => 'المشاركات الموافق عليها',
        'donates' => $donates,
        'schools' => $schools,
        'sofof' => $sofof,
        'fosol' => $fosol,
    ]);
})
    ->middleware(['permission:المشاركات الموافق عليها'])
    ->name('donate.teacher.active');

/**
 * وقت التطوع
 */
// Submit form
Route::get('/donate', function () {
    $schools = [
        'ابتدائية الأندلس',
        'ابتدائية الإمام عاصم لتحفيظ القرآن',
        'ابتدائية الجزيرة',
        'ابتدائية الحويلات',
        'ابتدائية الدانة',
        'ابتدائية الدفي',
        'ابتدائية الرياض',
        'ابتدائية الفناتير',
        'ابتدائية الفيحاء',
        'ابتدائية المرجان',
        'ابتدائية المطرفية',
        'ابتدائية الواحة',
        'ابتدائية جلمودة',
        'ابتدائية حراء',
        'ابتدائية نجد',
        'ابتدائية هجر',
        'ثانوية أم القرى - مقررات',
        'ثانوية الأحساء - مقررات',
        'ثانوية الدفي - مقررات',
        'ثانوية الرواد',
        'ثانوية العلا',
        'ثانوية نجد - مقررات',
        'متوسطة أم القرى',
        'متوسطة الإمام عاصم لتحفيظ القرآن الكريم',
        'متوسطة الخليج',
        'متوسطة الصديق',
        'متوسطة الفاروق',
        'متوسطة المروج',
        'متوسطة نجد'
    ];
    $sofof1 = [
        'الأول ابتدائي',
        'الثاني ابتدائي',
        'الثالث ابتدائي',
        'الرابع ابتدائي',
        'الخامس ابتدائي',
        'السادس ابتدائي'
    ];
    $sofof2 = [
        'الأول متوسط',
        'الثاني متوسط',
        'الثالث متوسط'
    ];
    $sofof3 = [
        'الأول ثانوي',
        'الثاني ثانوي',
        'الثالث ثانوي'
    ];
    $fosol = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    return view('donate.student', [
        'schools' => $schools,
        'sofof1' => $sofof1,
        'sofof2' => $sofof2,
        'sofof3' => $sofof3,
        'fosol' => $fosol,
    ]);
});
// Post submit
Route::post('/donate-post', function (Request $req) {
    $req->validate([
        'name' => 'required',
        'school' => 'required',
        'saf' => 'required',
        'fasle' => 'required',
        'file' => 'required_if:path,null',
        'path' => 'required_if:file,null',
    ]);
    $donate = new Donate();
    $donate->name   = $req->name;
    $donate->school = $req->school;
    $donate->saf    = $req->saf;
    $donate->fasle  = $req->fasle;
    // file
    if ($req->hasFile('file')) {
        $donate->file = $req->file->store('donates');
    }
    // path
    if ($req->path)
        $donate->path = $req->path;
    $donate->save();
    return back()->with('success', 'تم ارسال المشاركة');
})->name('donate-post');


Route::group(['middleware' => 'auth'], function () {
    // المشاركات الموافق عليها
    Route::get('/donate/active', function () {
        $schools = [
            'ابتدائية الأندلس',
            'ابتدائية الإمام عاصم لتحفيظ القرآن',
            'ابتدائية الجزيرة',
            'ابتدائية الحويلات',
            'ابتدائية الدانة',
            'ابتدائية الدفي',
            'ابتدائية الرياض',
            'ابتدائية الفناتير',
            'ابتدائية الفيحاء',
            'ابتدائية المرجان',
            'ابتدائية المطرفية',
            'ابتدائية الواحة',
            'ابتدائية جلمودة',
            'ابتدائية حراء',
            'ابتدائية نجد',
            'ابتدائية هجر',
            'ثانوية أم القرى - مقررات',
            'ثانوية الأحساء - مقررات',
            'ثانوية الدفي - مقررات',
            'ثانوية الرواد',
            'ثانوية العلا',
            'ثانوية نجد - مقررات',
            'متوسطة أم القرى',
            'متوسطة الإمام عاصم لتحفيظ القرآن الكريم',
            'متوسطة الخليج',
            'متوسطة الصديق',
            'متوسطة الفاروق',
            'متوسطة المروج',
            'متوسطة نجد'
        ];
        $sofof = [
            'الصف الاول',
            'الصف الثاني',
            'الصف الثالث',
            'الصف الرابع',
            'الصف الخامس',
            'الصف السادس',
        ];
        $fosol = [1, 2, 3, 4, 5, 6, 7, 8, 9];

        $donates = Donate::where('active', true)->where('school', Auth::user()->school)->get();

        if (Auth::user()->hasRole('مدير'))

            $donates = Donate::where('active', true)->get();
        if (isset($_GET['name']) || isset($_GET['school']) || isset($_GET['saf']) || isset($_GET['fasle'])) {
            $name   = $_GET['name'] ?? '';
            $school = $_GET['school'] ?? '';
            $saf    = $_GET['saf'] ?? '';
            $fasle  = $_GET['fasle'] ?? '';
            $donates = Donate::where('active', true)
                ->where('school', Auth::user()->school)
                ->where(
                    [
                        ['name', 'like', "%$name%"],
                        ['school', 'like', "%$school%"],
                        ['saf', 'like', "%$saf%"],
                        ['fasle', 'like', "%$fasle%"],
                    ]
                )
                // ->orWhere('school' , 'like' , "%$school%")
                // ->orWhere('saf' , 'like' , "%$saf%")
                // ->orWhere('fasle' , 'like' , "%$fasle%")
                // ->paginate(7);
                ->get();
        }
        return view('donate.active', [
            'title' => 'المشاركات الموافق عليها',
            'donates' => $donates,
            'schools' => $schools,
            'sofof' => $sofof,
            'fosol' => $fosol,
        ]);
    })
        ->middleware(['permission:المشاركات الموافق عليها'])
        ->name('donate.active');

    // المشاركات غير الموافق عليها
    Route::get('/donate/noactive', function () {
        $school = Auth::user()->school;
        if (Auth::user()->hasRole('مدير')) {
            $donates = Donate::all();
        } else {
            $donates = Donate::where('school', $school)->get();
        }
        return view('donate.nonactive', [
            'title' => 'المشاركات غير الموافق عليها',
            'donates' => $donates
        ]);
    })
        ->middleware(['permission:المشاركات غير الموافق عليها'])
        ->name('donate.noactive');
    // الموافقة أو إلغاء الموافقة
    Route::post('/donate/status/{id}', function ($id) {
        $donate = Donate::findOrFail($id);
        $donate->active = !$donate->active;
        $donate->save();
        return back()->with('status', 'تمت العملية بنجاح');
    })
        ->middleware(['permission:قسم المشاركات'])
        ->name('donate.status');
    // حذف
    Route::post('/donate/delete/{id}', function ($id) {
        $donate = Donate::findOrFail($id);
        $donate->delete();
        return back()->with('delete', 'تمت عملية الحذف بنجاح');
    })
        ->middleware(['permission:قسم المشاركات'])
        ->name('donate.delete');
});
