<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
               
            ],

            'name' => [
                'required',

            ],

            "slug" => [
                'required',
                'string',
                'max:255'
            ],
            "brand" => [
                'required',
                'string',
                'max:255'
            ],

            "small_description" => [
                'required',
                'string'
            ],

            "description" => [
                'required',
                'string'
            ],

            'original_price' => [
                'required',
             

            ],
            'selling_price' => [
                "required",

            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'discount' => [
                'nullable',
                'integer'
            ],
            'trending' => [
                'nullable',

            ],
            'featured' => [
                'nullable',

            ],

            'status' => [
                'nullable',

            ],
            'badge' => [
                'nullable',
                'string',

            ],
            'meta_title' => [
                'required',
                'string',
                'max:255'
            ],
            'meta_keyword' => [
                'required',
                'string'
            ],
            'meta_description' => [
                'required',
                'string'
            ],
            'image' => [
                'nullable',
                //ge mines:jpeg,png.jpg'
            ],

        ];
    }
}
