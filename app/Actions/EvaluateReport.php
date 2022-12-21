<?php

namespace App\Actions;

use App\Models\Report;
use Illuminate\Http\Request;

class EvaluateReport
{
    public function handle(Request $request, Report $report)
    {
        $data = $request->validate([
            'idea' => 'required',
            'value' => 'required',
            'q1' => 'required|numeric',
            'q2' => 'required|numeric',
            'q3' => 'required|numeric',
            'q4' => 'required|numeric',
            'q5' => 'required|numeric',
            'q6' => 'required|numeric',
            'q7' => 'required|numeric',
            'q8' => 'required|numeric',
            'q9' => 'required|numeric',
            'q10' => 'required|numeric',
            'q11' => 'required|numeric',
            'q12' => 'required|numeric',
        ]);

        $data['total'] =
            intval($data['q1']) +
            intval($data['q2']) +
            intval($data['q3']) +
            intval($data['q4']) +
            intval($data['q5']) +
            intval($data['q6']) +
            intval($data['q7']) +
            intval($data['q8']) +
            intval($data['q9']) +
            intval($data['q10']) +
            intval($data['q11']) +
            intval($data['q12']);

        $report->evaluation()->updateOrCreate([
            'id' => $request->id
        ], $data);
    }
}
