<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'roleData.name' => [
                'filled',
                Rule::when(request()->isMethod('PUT'), Rule::unique('roles', 'name')->ignore($this->role))
            ],
            'name' => [
                'filled',
                Rule::when(request()->isMethod('POST'), Rule::unique('roles'))
            ],
            'groups' => [
                Rule::when(request()->isMethod('PUT'), [
                    'required', 'array'
                ])
            ],
        ];
    }

    public function attributes()
    {
        return [
            'roleData.name' => 'اسم المجموعة',
            'groups'        => 'مجموعات الصلاحيات',
        ];
    }
}
