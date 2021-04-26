<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class guardarVacunatoriosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //permitir insert en la tabla

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'centro_id' => [
                    'required',
                    'integer',
                ],
                'medico' => [
                    'required',
                    'string',
                ],
                'horario' => [
                    'required',
                    'string',
                ],
                'telefono' => [
                    'required',
                    'integer',
                ]
        ];
    }
}
