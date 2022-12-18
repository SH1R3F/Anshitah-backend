<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'avatar'            => 'nullable',
            'milaf_howiya'      => 'nullable',
            'milaf_wadifi'      => 'nullable',
            'al_jadwal_dirassi' => 'nullable',
            'name'              => 'required',
            'email'             => [
                'required',
                'email',
                Rule::when(request()->isMethod('PUT'), Rule::unique('users')->ignore($this->user)),
                Rule::when(request()->isMethod('POST'), Rule::unique('users')),
            ],
            'rakm_howiya'       => [
                'required',
                'numeric',
                Rule::when(request()->isMethod('PUT'), Rule::unique('users')->ignore($this->user)),
                Rule::when(request()->isMethod('POST'), Rule::unique('users')),
            ],
            'mobile'          => 'filled',
            'address'         => 'filled',
            'university'      => 'filled',
            'takhasos'        => 'filled',
            'date_graduation' => 'filled|date|date_format:Y-m-d',
            'date_job'        => 'filled|date|date_format:Y-m-d',
            'current_job'     => 'filled',
            'rakm_wadifi'     => 'filled|numeric',
            'date_birth'      => 'filled|date|date_format:Y-m-d',
            'password'        => 'nullable|min:6',
            'role'            => 'required|exists:roles,name',
            'field'           => 'nullable',
            'school'          => 'nullable',
            'classes'         => 'filled'
        ];
    }

    public function validated()
    {
        $request = $this->validator->validated();

        if ($this->classes) {
            $request['classes'] = json_encode(is_array($this->classes) ? $this->classes : explode(',', $this->classes));
        }

        return $request;
    }
}
