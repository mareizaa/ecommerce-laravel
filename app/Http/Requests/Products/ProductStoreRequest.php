<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): Bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): Array
    {
        return [
            'name' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'min:10', 'max:250'],
            'price' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:0'],
            'images' => ['required'],
            'images.*' => [
                'image',
                'max:200',
                Rule::dimensions()->maxWidth(500)->maxHeight(250),
            ],
        ];
    }
}
