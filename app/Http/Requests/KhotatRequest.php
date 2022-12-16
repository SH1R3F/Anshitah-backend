<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KhotatRequest extends FormRequest
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
            'name'    => 'required',
            'file'    => [
                'required',
                Rule::when(request()->isMethod('POST'), 'file'),
            ],
            'schools' => 'required|array'
        ];
    }

    protected function prepareForValidation()
    {
        if (!is_array($this->schools)) {
            $this->merge([
                'schools' => explode(',', $this->schools),
            ]);
        }
    }
}
