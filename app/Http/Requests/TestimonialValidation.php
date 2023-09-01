<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialValidation extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'profession' => ['required','string'],
            'discription' => ['required','string'],
            'image' => ['required', 'image','mimes:jpeg,png,jpg,gif,svg'],

        ];
    }
    public function messages(){
        return[

                    'name.required' =>'Name is required',
                    'profession.required' =>'Profession is required',
                    'discription.required' =>'Discription is required',
                    'image.required' =>'Image is required',
                    'image.image' =>'Image must be image',
                    'image.mimes' =>'Image must be image',

                ];
            }
}
