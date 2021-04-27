<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FincaRequest extends FormRequest
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
        return [
            'identificacion'=>'integer|required|max:10',
            'nombre_representante'=>'string|required|max:10',
            'nombre_finca'=>'string|required|max:10',
            'municipio'=>'string|required|max:10',
            'vereda'=>'string|required|max:9',
            'celular'=>'string|required|max:255',
        ];
    }


    







    public function messages()
    {
        return[

               
               'identificacion.required'=>'Este es el campo requerido',
               'identificacion.integer'=>'el valor no es correcto',
               'identificacion.max'=>'solo se permite 10 caracteres',
                   
               'nombre_representante.required'=>'Este es el campo requerido',
               'nombre_representante.integer'=>'el valor no es correcto',
               'nombre_representante.max'=>'solo se permite 10 caracteres',


               'nombre_finca.required'=>'Este es el campo requerido',
               'nombre_finca.integer'=>'el valor no es correcto',
               'nombre_finca.max'=>'solo se permite 10 caracteres',

               
               'municipio.required'=>'Este es el campo requerido',
               'municipio.integer'=>'el valor no es correcto',
               'municipio.max'=>'solo se permite 10 caracteres',

               'vereda.required'=>'Este es el campo requerido',
               'vereda.integer'=>'el valor no es correcto',
               'vereda.max'=>'solo se permite 10 caracteres',

               
               'celular.required'=>'Este es el campo requerido',
               'celular.integer'=>'el valor no es correcto',
               'celular.max'=>'solo se permite 10 caracteres',


        ];
    }



}
