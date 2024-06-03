<?php

namespace App\Http\Requests\Admin\DataBiologies;

use Illuminate\Foundation\Http\FormRequest;

class DatabiologiesCreateRequest extends FormRequest
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
            'waist' => 'required',
            'quadril' => 'required',
            'bust' => 'required',
            'endurance' => 'required',
            'speed' => 'required',
            'flexibility' => 'required',
            'temperature' => 'required',
            'imc' => 'required',
            'user_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'waist' => 'Cintura',
            'quadril' => 'Quadril',
            'bust' => 'Busto',
            'endurance' => 'Resistencia',
            'speed' => 'Velocidad',
            'flexibility' => 'Flexibilidad',
            'temperature' => 'Temperatura',
            'imc' => 'IMC',
            'user_id' => 'Usuario',
        ];
    }

    public function messages()
        {
            return [
                'waist.required' => 'O campo de Cintura é obrigatório',
                'quadril.required' => 'O campo de Quadril é obrigatório',
                'bust.required' => 'O campo de Busto é obrigatório',
                'endurance.required' => 'O campo de Resistência é obrigatório',
                'speed.required' => 'O campo de Velocidade é obrigatório',
                'flexibility.required' => 'O campo de Flexibilidade é obrigatório',
                'temperature.required' => 'O campo de Temperatura é obrigatório',
                'imc.required' => 'O campo de IMC é obrigatório',
                'user_id.required' => 'O campo de Usuário é obrigatório',
            ];
        }

}
