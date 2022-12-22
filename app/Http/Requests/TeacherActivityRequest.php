<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherActivityRequest extends FormRequest
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
            'raid' => 'required',
            'modir' => 'required',
            'nadi_3ilmi' => 'required|array',
            'nadi_taqafi' => 'required|array',
            'nadi_tafkir' => 'required|array',
            'nadi_tatawo3' => 'required|array',
            'nadi_mihani' => 'required|array',
            'nadi_sport' => 'required|array',
            'nadi_kachfi' => 'required|array',
            'nadi_ijtima3i' => 'required|array',
            'nadi_tadrib' => 'required|array'
        ];
    }
}
