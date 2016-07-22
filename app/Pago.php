<?php

namespace proyecto_2015;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
	
   
    protected $fillable = [
                           'becado',
                           'alumno_id',
                           'cuota_id',
                           'pagador_id'

      					  ];
  
    public function cuota(){
    	 return $this->belongsTo('app/Cuota');
    }
    public function alumno(){
    	 return $this->belongsTo('app/Alumno');
    }
    public  function pagador(){
    	return $this->belongsTo('app/User');
    }

  
}
