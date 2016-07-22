<?php

namespace proyecto_2015;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
	use SoftDeletes;
   
    protected $fillable = ['anio',
      						'mes',
      						'numero',
      						'monto', 
      						'tipo', 
                  'created_at',
      						'comisionCobrador'
      					  ];
     protected $dates = ['deleted_at','created_at','updated_at'];
    public function pagos(){
    	return $this->hasMany('app/Pago');
    }
}
