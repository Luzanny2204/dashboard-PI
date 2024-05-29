<?php

namespace App\Http\Requests\Admin\Teams;

use Illuminate\Foundation\Http\FormRequest;

class TeamsCreateRequest extends FormRequest
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
            'state_id' => 'required',
            'users' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'state_id' => 'Estado',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del equipo es obligatorio',
            'state_id.required' => 'El estado del equipo es obligatorio',
        ];
    }
}
