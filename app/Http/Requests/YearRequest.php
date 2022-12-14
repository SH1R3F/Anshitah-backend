<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class YearRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::when(request()->isMethod('PUT'), Rule::unique('years')->ignore($this->year)),
                Rule::when(request()->isMethod('POST'), Rule::unique('years'))
            ],
            'number' => [
                'required',
                'numeric'
            ],
            'classes' => [
                'required',
                'array'
            ],
        ];
    }

    public function validated()
    {
        $request = $this->validator->validated();

        $request['classes'] = json_encode($this->classes);

        return $request;
    }
}
