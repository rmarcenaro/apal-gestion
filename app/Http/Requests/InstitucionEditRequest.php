<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InstitucionEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {

            case 'GET':
            case 'DELETE':
                return [];

            case 'POST':
                return [
                    'nombre' => ['required', 'min:3', 'max:100'],
                    'estado_id' => [
                        'required',
                        'numeric',
                        Rule::in(\App\Institucion::ESTADOS),
                    ]
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'nombre' => ['required', 'min:3', 'max:100'],
                    'estado_id' => [
                        'required',
                        'numeric',
                        Rule::in(\App\Institucion::ESTADOS),
                    ]
                ];

            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la Institución es requerido.',
            'nombre.min' => 'El nombre de la Institución debe contener al menos 3 caracteres.',
            'nombre.max' => 'El nombre de la Institución es más largo de lo esperado (máximo 100 caracteres).',
        ];
    }
}
