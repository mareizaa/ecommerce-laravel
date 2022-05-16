<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
            'reference' => ['required', Rule::unique('products')->ignore($this->product)],
            'name' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'min:10', 'max:250'],
            'price' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:0'],
            'images' => [
                'image',
                'max:200',
                Rule::dimensions()->maxWidth(300)->maxHeight(500),
            ]
        ];
    }
}
