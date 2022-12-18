<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QiasAdaaRequest extends FormRequest
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
            'points' => 'required|integer',
            'cause' => 'required'
        ];
    }
}
