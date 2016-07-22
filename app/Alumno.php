<?php

namespace proyecto_2015;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Alumno extends Model
{      use SoftDeletes;
      protected $fillable = ['nombre',
      						'apellido',
      						'direccion',
      						'telefono',
      						'fechaNacimiento', 
      						'sexo', 
      						'mail',
                                          'nroDocumento',
      						'fechaIngreso',
      						'fechaEgreso',
      						'fechaAlta'];

      protected $dates = ['fechaNacimiento','fechaIngreso','fechaEgreso','fechaAlta','deleted_at']; 


public function responsables(){
	return $this->belongsToMany('proyecto_2015\Responsable');
}
public function pagos(){
      return $this->hasMany('app/Pago');
    }
}
