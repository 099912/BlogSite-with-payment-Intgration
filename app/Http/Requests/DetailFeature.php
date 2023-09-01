<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailFeature extends FormRequest
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
            'discription' => ['required','string'],
            'image' => ['required', 'image','mimes:jpeg,png,jpg,gif,svg'],

        ];
    }
    public function messages(){
        return[

                    'title.required' =>'title is required',
                    'discription.required' =>'Discription is required',
                    'image.required' =>'Image is required',
                    'image.image' =>'Image must be image',
                    'image.mimes' =>'Image must be image',

                ];
            }
}
