<?php

namespace proyecto_2015\Http\Requests;

use proyecto_2015\Http\Requests\Request;

class UsuarioRequest extends Request
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
        return [ 'username'=>'required|min:4|unique:usuarios',
                'habilitado'=>'required|digits:1',
                'rol_id' =>'required|digits:1',
                'password'=>'required|min:5'
                 
        ];
    }
}
