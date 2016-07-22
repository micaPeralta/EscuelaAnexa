<?php

namespace proyecto_2015\Http\Requests;

use proyecto_2015\Http\Requests\Request;

class AlumnoRequest extends Request
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
             'nombre'=> 'required|',
             'apellido'=> 'required|',
             'direccion' => 'required',
             'telefono'=> 'required|numeric',
             'fechaNacimiento'=> 'required', 
             'sexo'=> 'required|in:Femenino,Masculino', 
             'mail'=> 'required|email',
             'nroDocumento'=> 'required|digits:8|numeric',
             'fechaIngreso'=> 'required',
             'fechaAlta'=> 'required'
             
             
        ];
    }
}
