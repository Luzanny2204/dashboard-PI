<?php

namespace App\Http\Requests\Admin\MenstrualCalendars;

use Illuminate\Foundation\Http\FormRequest;

class MenstrualcalendarsCreateRequest extends FormRequest
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
            'last_period' => 'required',
            'duration' => 'required',
            'symptoms' => 'required',
            'cervical_flux' => 'required',
            'sexual_activity' => 'required',
            'user_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'last_period' => 'Último periodo',
            'duration' => 'Duración',
            'symptoms' => 'Sintomas',
            'cervical_flux' => 'Flujo cervical',
            'sexual_activity' => 'Actividad sexual',
            'user_id' => 'Usuario',
        ];
    }

    public function messages()
    {
        return [
            'last_period' => 'El campo de Último periodo es obligatorio',
            'duration' => 'El campo de Duración es obligatorio',
            'symptoms' => 'El campo de Sintomas es obligatorio',
            'cervical_flux' => 'El campo de Flujo cervical es obligatorio',
            'sexual_activity' => 'El campo de Actividad sexual es obligatorio',
            'user_id' => 'El campo de Usuario es obligatorio',
        ];
    }
}
