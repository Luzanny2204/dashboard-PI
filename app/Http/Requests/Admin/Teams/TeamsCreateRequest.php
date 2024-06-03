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
            'user_id' => 'nullable',
            'users' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'state_id' => 'Estado',
            'user_id' => 'Entrenador Técnico',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da equipe é obrigatório',
            'state_id.required' => 'O estado da equipe é obrigatório',
            'user_id.nullable' => 'O treinador técnico da equipe não é obrigatório',
        ];
    }
    
}
