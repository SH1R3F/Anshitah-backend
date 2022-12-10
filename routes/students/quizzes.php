<?php
    /**
     * قسم الإختبارات
     */

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

    Route::get('/quizzes' , function() {
        return view('quizzes.index' , [
            'title' => 'قسم الإختبارات',
            'quizzes' => Quiz::all()
        ]);
    })->middleware(['permission:عرض الإختبارات'])->name('quizzes');


    Route::get('/quizzes/create' , function() {
        return view('quizzes.create' , [
            'title' => 'إختبار جديد'
        ]);
    })->middleware(['permission:إنشاء إختبار'])->name('quizzes.create');


    Route::post('/quizzes/create' , function(Request $req) {
        $quiz = new Quiz();
        $quiz->name = $req->name;
        $quiz->level = $req->level;
        $quiz->save();
        return back()->with('create' , 'ثم إنشاء الإختبار بنجاح');
    })->middleware(['permission:إنشاء إختبار'])->name('quizzes.store');

    
    Route::post('/questions/{id}', function($id , Request $req){
        ini_set('max_execution_time', 180);
        $quiz = Quiz::findOrFail($id);
        // رفع الملف
        $questions = Excel::toArray(null,$req->file('file'));
        $questions = $questions[0];
        // dd($questions);
        for($i = 1; $i < count($questions) ; $i++){
            $q = new Question();
            $q->name = $questions[$i][0];
            $q->mark = $questions[$i][1];
            $q->answer = $questions[$i][2];
            $q->topic = $questions[$i][6];
            $q->quiz_id = $quiz->id;
            $q->save();

            $a = new Answer();
            $a->name = $questions[$i][2];
            $a->question_id = $q->id;
            $a->save();
            $a = new Answer();
            $a->name = $questions[$i][3];
            $a->question_id = $q->id;
            $a->save();
            $a = new Answer();
            $a->name = $questions[$i][4];
            $a->question_id = $q->id;
            $a->save();
            $a = new Answer();
            $a->name = $questions[$i][5];
            $a->question_id = $q->id;
            $a->save();
        }
        return back()->with('create' , 'ثم رفع البيانات بنجاح');
    })->name('import.questions');


