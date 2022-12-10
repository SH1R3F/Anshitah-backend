<?php

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/question/create/{id}' , function($id){
    $quiz = Quiz::findOrFail($id);

    return view('questions.create' , [
        'title' => 'إنشاء أسئلة الإختبار ' . $quiz->name,
        'quiz' => $quiz
    ]);
})->middleware(['permission:أسئلة الإختبار'])->name('question.create');

Route::post('/question/create/{id}' , function($id , Request $req){
    $quiz = Quiz::findOrFail($id);
    // dd($req);
    // Delete Questions And Answers
    foreach($quiz->questions as $q){
        foreach($q->answers as $a){
            $a->delete();
        }
        $q->delete();
    }

    // Insert Questions And Answers
    foreach($req->questions as $question){
        $q = new Question();
        $q->name = $question['name'];
        $q->answer = $question['answer'];
        $q->topic = $question['topic'];
        $q->mark = $question['mark'];
        if(isset($question['file'])){
            $name = $question['file']->getClientOriginalName();
            $ext  = pathinfo($name, PATHINFO_EXTENSION);
            $filename = time() . '-audio.' . $ext;
            $question['file']->move(public_path('/storage/questions/'), $filename);
            $filename = env('STORAGE_PATH') . 'questions/' . $filename;
            $q->file = $filename;
        }
        $q->quiz_id = $quiz->id;
        $q->save();

        $a = new Answer();
        $a->name = $question['answer'];
        $a->question_id = $q->id;
        $a->save();
        $a = new Answer();
        $a->name = $question['answer1'];
        $a->question_id = $q->id;
        $a->save();
        $a = new Answer();
        $a->name = $question['answer2'];
        $a->question_id = $q->id;
        $a->save();
        $a = new Answer();
        $a->name = $question['answer3'];
        $a->question_id = $q->id;
        $a->save();
    }
    return back()->with('create' , 'ثم إنشاء الأسئلة بنجاح');
})->middleware(['permission:أسئلة الإختبار'])->name('question.store');
