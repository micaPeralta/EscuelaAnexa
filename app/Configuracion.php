<?php

namespace proyecto_2015;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
 		 /*tabla relacionada con este modelo  */
	    protected $table = 'configuraciones';
	    /*atributos a los que el usuario podrá acceder*/
	    protected $fillable = ['clave','valor_numerico','valor_textual'];

	    protected $primaryKey='clave';
}
