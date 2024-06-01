<?php

namespace App\Http\Requests\Admin\Physiotherapists;

use Illuminate\Foundation\Http\FormRequest;

class PhysiotherapistsCreateRequest extends FormRequest
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
            'consultation_date' => 'required',
            'description' => 'required',
            'user_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'consultation_date' => 'Fecha de la consulta',
            'description' => 'Descripción',
            'user_id' => 'Jugador',
        ];
    }

    public function messages()
    {
        return [
            'consultation_date.required' => 'El Fecha de la consulta de la fisioterapia es obligatorio',
            'description.required' => 'La descripción de la fisioterapia es obligatorio',
            'user_id.required' => 'El jugador es obligatorio',
        ];
    }
}
