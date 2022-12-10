<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Quiz extends Component
{
    public $quiz;
    public $exam;

    public function render()
    {
        $fixed = DB::select('SELECT * FROM exams WHERE user_id = ? AND quiz_id = ? LIMIT 1' , [Auth::user()->id, $this->quiz->id]);
        // dd($fixed[0]);
        // dd($this->exam);
        $fixed = $fixed[0];
        $current = $fixed->step;
        $examid = $fixed->id;
        $steps  = 0;
        // dd($this->exam[0]);
        $step1 = count($this->exam[0]->questions);
        $step2 = count($this->exam[1]->questions);
        // dd($s
        $step3 = count($this->exam[2]->questions);
        $step4 = count($this->exam[3]->questions);
        $steps += $step1;
        $steps += $step2;
        $steps += $step3;
        $steps += $step4;
        return view('livewire.quiz' , compact('steps','step1','step2','step3','step4' , 'current' , 'examid' , 'fixed'));
    }
}
