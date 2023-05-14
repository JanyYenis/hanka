<?php

namespace App\Http\Requests;

use App\Classes\FormRequest\FormRequest;

class UsuarioRequest extends FormRequest
{
    protected array $customs = [
        'after' => [
            'dates' => ['fecha_nacimiento']
        ]
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array 
     */
    public function rules()
    {
        if ($this->has('nombre')) {
            $reglas = [
                "nombre" => [
                    "required",
                    "string"
                ],
                "apellido" => [
                    "required",
                    "string"
                ],
                "tipo_documento" => [
                    "required"
                ],
                "documento" => [
                    "required",
                    "numeric"
                ],
                "genero" => [
                    "required",
                    "numeric"
                ],
                "fecha_nacimiento" => [
                    "required",
                    "date_format:{$this->formatoFechas}"
                ],
                "direccion" => [
                    "required",
                    "string"
                ],
                "pais" => [
                    "required",
                    "numeric"
                ],
                "id_ciudad" => [
                    "required",
                    "numeric"
                ],
            ];
        }

        if ($this->has('password')) {
            $reglas = [
                'password' => [
                    'required',
                    'min:8'
                ]
            ];
        }

        if ($this->has('email')) {
            $reglas['email'] = [
                "required",
                "email"
            ];
        }

        return $reglas;
    }
}

