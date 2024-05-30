<?php

namespace App\Http\Requests\Admin\Nutritionists;

use Illuminate\Foundation\Http\FormRequest;

class NutritionistsCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'nullable',
            'user_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'description' => 'Descripcion',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'description.nullable' => 'La descripcion es obligatoria',
        ];
    }
}
