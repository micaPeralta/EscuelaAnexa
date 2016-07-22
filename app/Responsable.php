<?php

namespace proyecto_2015;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Model;
use DB;

class Responsable extends Model
{   
    use SoftDeletes;
     protected $fillable = ['nombre',
      						'apellido',
      						'direccion',
      						'telefono',
      						'fechaNacimiento', 
      						'sexo', 
      						'mail',
      						'tipo'];


      protected $dates = ['deleted_at','fechaNacimiento']; 

    public function alumnos (){
    	return $this->belongsToMany('proyecto_2015\Alumno');
    }

    public function usuario (){
      return $this>belongsToMany('proyecto_2015\User');
    }


}
