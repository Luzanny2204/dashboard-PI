<?php

namespace App\Http\Requests\Admin\States;

use Illuminate\Foundation\Http\FormRequest;

class StatesCreateRequest extends FormRequest
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
            'name' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do estado é obrigatorio',
        ];
    }
}
