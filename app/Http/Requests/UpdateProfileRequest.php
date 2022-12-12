<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'avatar'          => 'present',
            'milaf_howiya'    => 'present',
            'milaf_wadifi'    => 'present',
            'name'            => 'required',
            'email'           => 'required|email|unique:users,email,' . Auth::user()->id,
            'rakm_howiya'     => 'required|numeric|unique:users,rakm_howiya,' . Auth::user()->id,
            'mobile'          => 'required',
            'address'         => 'required',
            'university'      => 'required',
            'takhasos'        => 'required',
            'date_graduation' => 'required|date|date_format:Y-m-d',
            'date_job'        => 'required|date|date_format:Y-m-d',
            'current_job'     => 'required',
            'rakm_wadifi'     => 'required|numeric',
            'date_birth'      => 'required|date|date_format:Y-m-d',
            'password'        => 'nullable|min:6',
        ];
    }
}
