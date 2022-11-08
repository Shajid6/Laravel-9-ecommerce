<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'string',

            ],

            'name' => [
                'required',
                'string',

            ],

            "slug" => [
                'required',
                'string',
                'max:255'
            ],
            'image' =>[
                'nullable',
                'mimes:jpg,jpeg,png'
                ],
            'status' => [
                'nullable',
            ],

        ];
    }
}
