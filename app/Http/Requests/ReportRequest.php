<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'name' => 'required',
            'number' => 'required|numeric',
            'school' => 'required',
            'field' => 'required',
            'value' => 'required',
            'mocharikin' => 'required|numeric',
            'monadimin' => 'required|numeric',
            'jomhor' => 'required|numeric',
            'total_mocharikin' => 'required|numeric',
            'executed' => 'present|array',
            'img1' => 'present|array',
            'img2' => 'present|array',
            'img3' => 'present|array',
            'img4' => 'present|array',
        ];
    }
}
