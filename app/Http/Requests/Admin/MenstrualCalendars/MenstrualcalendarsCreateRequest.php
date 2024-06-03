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
            'last_period.required' => 'O campo de Último período é obrigatório',
            'duration.required' => 'O campo de Duração é obrigatório',
            'symptoms.required' => 'O campo de Sintomas é obrigatório',
            'cervical_flux.required' => 'O campo de Fluxo cervical é obrigatório',
            'sexual_activity.required' => 'O campo de Atividade sexual é obrigatório',
            'user_id.required' => 'O campo de Usuário é obrigatório',
        ];
    }
    
}
