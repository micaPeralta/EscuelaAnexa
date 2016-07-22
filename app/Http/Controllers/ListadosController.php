<?php

namespace proyecto_2015\Http\Controllers;

use Illuminate\Http\Request;
use proyecto_2015\Configuracion;
use proyecto_2015\Http\Requests;
use proyecto_2015\Pago;
use proyecto_2015\Cuota;
use DB;
use Auth;
class ListadosController extends Controller
{
     
    public function cuotas_pagadas_o_becadas(Request $request){
    	$mail_contacto=Configuracion::where('clave','mail_contacto')->first();
        $nroPag=Configuracion::where('clave','paginacion')->first()->valor_numerico;
    	if(auth()->user()->rol->descripcion != "consulta"){
        $cuotas=DB::table('cuotas as c')->
    	            selectRaw("c.anio,c.mes,c.numero,c.tipo,c.monto,
    	        	   p.created_at, CASE becado
            WHEN 1 THEN 'Si'
            WHEN 0 THEN 'No'
          END  as beca ,
    	        	   a.nombre,a.apellido,a.nroDocumento")->
    	             join('pagos as p','p.cuota_id','=','c.id')->
    	             join('alumnos as a','p.alumno_id','=','a.id')->
                     where('c.deleted_at','=',null)->
                     where('a.deleted_at','=',null)->
                    orderByRaw('c.anio DESC ,c.mes DESC')->
                    paginate($nroPag);
      }
      else{
          if(auth()->user()->getResponsable() != null){
            $id=auth()->user()->getResponsable()->id;
           }
           else{
            $id=-1;
          }
             $cuotas=DB::table('cuotas as c')->
                  selectRaw("c.anio,c.mes,c.numero,c.tipo,c.monto,
                   p.created_at, CASE becado
            WHEN 1 THEN 'Si'
            WHEN 0 THEN 'No'
          END  as beca ,
                   a.nombre,a.apellido,a.nroDocumento")->
                   distinct()->
                   join('pagos as p','p.cuota_id','=','c.id')->
                   join('alumnos as a','p.alumno_id','=','a.id')->
                   join('alumno_responsable as a_r','a.id','=','a_r.alumno_id')->
                     where('a_r.responsable_id','=',$id)->
                     where('c.deleted_at','=',null)->
                     where('a.deleted_at','=',null)->
                    orderByRaw('c.anio DESC ,c.mes DESC')->
                    paginate($nroPag);
                    
                    
          
      }
      if ($request->ajax()){
             return response()->json(view('cuota.cuotas_pagadas',['cuotas'=> $cuotas ])->render());
      }
    	return view('cuota.list_cuo_pagas', 
							   	[	'cuotas'=>$cuotas,
							   		'mail_contacto'=> $mail_contacto->valor_textual
							   	]);
    }
    

    public function cuotas_impagas_vencidas(Request $request){
        $mail_contacto=Configuracion::where('clave','mail_contacto')->first();
        $nroPag=Configuracion::where('clave','paginacion')->first()->valor_numerico;
     if(auth()->user()->rol->descripcion != "consulta"){
        $cuotas=DB::table('cuotas as c')->
           join('alumnos as a',"a.id","=","a.id")->
           where('c.mes','>=',DB::raw('MONTH(a.fechaingreso)'))->
           where('c.anio','=',DB::raw('YEAR(a.fechaingreso)'))->
          orWhere('c.anio','>',DB::raw('YEAR(a.fechaingreso)'))->
          where('c.mes','<',DB::raw('MONTH(NOW())'))->
           where('c.anio','=',DB::raw('YEAR(NOW())'))->
          orWhere('c.anio','<',DB::raw('YEAR(NOW())'))->
          whereNotExists(function($query){
               $query->selectRaw(' * from pagos p where(p.cuota_id = c.id AND p.alumno_id = a.id )');
          })->where('c.deleted_at','=',null)->where('a.deleted_at','=',null)->paginate($nroPag);
     }
     else{
         if(auth()->user()->getResponsable() != null){
             $id=auth()->user()->getResponsable()->id;
          }
          else{
            $id=-1;
          }
           $cuotas=DB::table('cuotas as c')->select('c.mes','c.anio','c.numero','c.monto','c.tipo','a.nombre', 'a.apellido','a.nroDocumento')->
             distinct()->
           join('alumnos as a',"a.id","=","a.id")->
           join('alumno_responsable as a_r','a.id','=','a_r.alumno_id')->
             join('responsable_usuario as r_u','r_u.responsable_id','=','a_r.responsable_id')->
           where('a_r.responsable_id','=',$id)->
            where('r_u.usuario_id','=',auth()->user()->id)->
           where('c.mes','>=',DB::raw('MONTH(a.fechaingreso)'))->
           where('c.anio','=',DB::raw('YEAR(a.fechaingreso)'))->
          orWhere('c.anio','>',DB::raw('YEAR(a.fechaingreso)'))->
          where('c.mes','<',DB::raw('MONTH(NOW())'))->
           where('c.anio','=',DB::raw('YEAR(NOW())'))->
          orWhere('c.anio','<',DB::raw('YEAR(NOW())'))->
          whereNotExists(function($query){
               $query->selectRaw(" * from pagos p where(p.cuota_id = c.id AND p.alumno_id = a_r.alumno_id )");
          })->where('c.deleted_at','=',null)->where('a.deleted_at','=',null)->orderBy('c.anio' ,' dess')
          ->orderBy('c.mes' ,' dess')->paginate($nroPag);
         
     }
          if ($request->ajax()){
             return response()->json(view('cuota.cuotas_impagas',['cuotas'=> $cuotas ])->render());
          }
        return view('cuota.list_cuo_impagas', 
                                [   'cuotas'=>$cuotas,
                                    'mail_contacto'=> $mail_contacto->valor_textual
                                ]);

    }
    public function alumnos_matriculas_pagas(Request $request){
        $mail_contacto=Configuracion::where('clave','mail_contacto')->first();
        $nroPag=Configuracion::where('clave','paginacion')->first()->valor_numerico; 
      if(auth()->user()->rol->descripcion != "consulta"){
        $alumnos=DB::table('alumnos as a')->select('a.*')->distinct()->groupBy('a.id')->
          join('pagos as p','p.alumno_id','=','a.id')->
          join('cuotas as c','p.cuota_id','=','c.id')->
          where('c.tipo', '=','Matricula')->
          where('c.deleted_at','=',null)->
          where('a.deleted_at','=',null)->paginate($nroPag);
      }else{
          if(auth()->user()->getResponsable() != null){
            $id=auth()->user()->getResponsable()->id;
           }
          else{
            $id=-1;
          }
             
             $alumnos=DB::table('alumnos as a')->select('a.*')->distinct()->groupBy('a.id')->
             join('pagos as p','p.alumno_id','=','a.id')->
             join('cuotas as c','p.cuota_id','=','c.id')->
             join('alumno_responsable as a_r','a.id','=','a_r.alumno_id')->
              where('a_r.responsable_id','=',$id)->
             where('c.tipo', '=','Matricula')->
             where('c.deleted_at','=',null)->
             where('a.deleted_at','=',null)->paginate($nroPag);
        
      }
        if ($request->ajax()){
             return response()->json(view('alumno.alumnos_matriculas_pagas',['alumnos'=> $alumnos ])->render());
        }
        return view('alumno.list_alumnos_matriculas_pagas', 
                                [   'alumnos'=>$alumnos,
                                    'mail_contacto'=> $mail_contacto->valor_textual
                                ]);
    }
}