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
            'waist.required' => 'El campo de Cintura es obligaorio',
            'quadril.required' => 'El campo de Quadril es obligaorio',
            'bust.required' => 'El campo de Busto es obligaorio',
            'endurance.required' => 'El campo de Resistencia es obligaorio',
            'speed.required' => 'El campo de Velocidad es obligaorio',
            'flexibility.required' => 'El campo de Flexibilidad es obligaorio',
            'temperature.required' => 'El campo de Temperatura es obligaorio',
            'imc.required' => 'El campo de IMC es obligaorio',
            'user_id.required' => 'El campo de Usuario es obligaorio',
        ];
    }
}
