<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|min:2|max:64|unique:products',
            'description' => 'string',
            'price' => 'integer',
            'new' => 'boolean',
            'bestseller' => 'boolean',
            'category_id' => 'integer|exists:categories,id',
        ];
    }
}
