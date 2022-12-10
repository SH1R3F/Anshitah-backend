<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quiz extends Model
{
    use HasFactory;

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public static function quizdone($quiz){
        $quizdone = QuizStudent::where('user_id' , Auth::user()->id)
                                ->where('quiz_id' , $quiz->id)
                                ->first();
        if($quizdone == null) return false;
        return $quizdone->file;
    }
}
