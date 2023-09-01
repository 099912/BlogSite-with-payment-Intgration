<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionValidation extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'job_type' => ['required','string'],
            'category' => ['required'],

        ];
    }
    public function messages(){
        return[

                    'title.required' =>'Name is required',
                    'job_type.required' =>'Job type is required',
                    'category.required' =>'category is required',

                ];
            }
}
