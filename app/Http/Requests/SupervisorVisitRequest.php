<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupervisorVisitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'school' => 'required',
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'q1' => 'nullable',
            'q2' => 'nullable',
            'q3' => 'nullable',
            'q4' => 'nullable',
            'q5' => 'nullable',
            'q6' => 'nullable',
            'q7' => 'nullable',
            'q8' => 'nullable',
            'q9' => 'nullable',
            'q10' => 'nullable',
            'q11' => 'nullable',
            'q12' => 'nullable',
            'q13' => 'nullable',
        ];
    }
}
