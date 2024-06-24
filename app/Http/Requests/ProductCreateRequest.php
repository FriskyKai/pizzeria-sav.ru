<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:64|unique:products',
            'description' => 'required|string',
            'price' => 'required|integer',
            'new' => 'required|boolean',
            'bestseller' => 'required|boolean',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }
}
