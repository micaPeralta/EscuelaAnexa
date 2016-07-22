<?php

namespace proyecto_2015\Http\Requests;

use proyecto_2015\Http\Requests\Request;

class CuotaRequest extends Request
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
             'anio'=> 'required|numeric',
             'mes'=> 'required|numeric',
             'numero' => 'required|numeric',
             
             'monto'=> 'required|numeric',
             
             'tipo'=> 'required|in:Mensual,Matricula', 
             
             'comisionCobrador'=> 'required|numeric',
             
             
             
        ];
    }


}