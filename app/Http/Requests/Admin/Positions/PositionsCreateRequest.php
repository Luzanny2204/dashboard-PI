<?php

namespace App\Http\Requests\Admin\Positions;

use Illuminate\Foundation\Http\FormRequest;

class PositionsCreateRequest extends FormRequest
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
            'name.required' => 'El nombre de la posición es obligatorio',
            'state_id.required' => 'El estado es obligatorio',
        ];
    }
}
