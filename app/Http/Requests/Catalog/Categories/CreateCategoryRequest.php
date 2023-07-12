<?php

namespace App\Http\Requests\Catalog\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'parent_id' => ['nullable', 'integer', 'exists:categories,id']
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '"Name"',
            'parent_id' => '"Parent"'
        ];
    }
}
