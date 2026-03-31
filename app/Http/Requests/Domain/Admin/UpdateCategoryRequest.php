<?php

namespace App\Http\Requests\Domain\Admin;

use App\Domain\Enums\CategoryStatus;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $category = $this->route('category');
        $categoryId = $category->id;

        return [
            'name'      => ['required', 'string', 'max:255'],
            'parent_id' => ['nullable', 'exists:categories,id'],
            'slug'      => ['nullable', 'string', 'max:255', 'unique:categories,slug,' . $categoryId],
            'status'    => ['required', new Enum(CategoryStatus::class)],
        ];
    }
}
