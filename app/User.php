<?php

namespace proyecto_2015;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{	use SoftDeletes;

    protected $table = 'usuarios';
    protected $fillable = ['username','habilitado', 'rol_id', 'password','remember_token'];
    protected $dates = ['deleted_at']; 

    public function rol (){
    	return $this->belongsTo('proyecto_2015\Rol');
    }

    public function responsable (){
    	return $this->belongsToMany('proyecto_2015\Responsable','responsable_usuario',
            'usuario_id','responsable_id');
    }

     public function getResponsableAttribute($value)
    {   
       /* si no tiene responsable asignado*/
        if ($this->responsable()->first() != null)
          return  $this->responsable()->first();
        else return false;
    }
    public function getResponsable()
    {   
       /* si no tiene responsable asignado*/
        if ($this->responsable()->first() != null)
          return  $this->responsable()->first();
        else 
            return null;
    }
    public function admin(){

    	return $this->rol->descripcion === 'admin';
    }


    public function gestion(){
    	
    	return $this->rol->descripcion === 'gestion';
    }

    public function consulta(){
    	
    	return $this->rol->descripcion === 'consulta';
    }
    public function pagos(){
        return $this->hasMany('app/Pago');
    }
    




}
