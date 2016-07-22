<?php

namespace proyecto_2015;

use Illuminate\Database\Eloquent\Model;


class Rol extends Model
{
		/*tabla relacionada con este modelo  */
	    protected $table = 'roles';
	    /*atributos a los que el usuario podrá acceder*/
	    protected $fillable = ['descripcion'];
	   
    public function usuarios (){
    	$this->hasMany('proyecto_2015\User');
    }
}
