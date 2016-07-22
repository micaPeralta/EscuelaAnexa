<?php
namespace proyecto_2015\Http\Controllers;
use Illuminate\Http\Request;
use proyecto_2015\Configuracion;
use proyecto_2015\Cuota;
use proyecto_2015\Http\Requests\CuotaRequest;
use proyecto_2015\Http\Controllers\Controller;
use proyecto_2015\User;
use proyecto_2015\Pago;
use DB;

use Carbon\Carbon;

class CuotaController extends Controller
{
     public function listar(Request $request)
    {
    	//$cuotas=Cuota::all();
        $nroPag=Configuracion::where('clave','paginacion')->first()->valor_numerico;

    	$cuotas=Cuota::orderBy('anio','DESC')->orderBy('mes','DESC')->paginate($nroPag);
 	    $mail_contacto=Configuracion::where('clave','mail_contacto')->first();
		
		if ($request->ajax()){
   	           return response()->json(view('cuota.cuotas',['cuotas'=> $cuotas ])->render());
        }

 
		return view('cuota.list_cuo',
							   	[	'cuotas'=>$cuotas,
							   		'mail_contacto'=> $mail_contacto->valor_textual
							   	]);

    }
    public function mostrar($id){
	   $cuota=Cuota::find($id);
	   $mail_contacto=Configuracion::where('clave','mail_contacto')->first();
	   return view('cuota.ver_cuo',['cuota'=>$cuota,
							'mail_contacto'=> $mail_contacto->valor_textual]);
   }

    public function crear(){
    	 $mail_contacto=Configuracion::where('clave','mail_contacto')->first();
	
      
	     return view('cuota.alta_cuo',['cuota'=>array(),
									'mail_contacto'=> $mail_contacto->valor_textual
								]);
    }
  public function agregar(CuotaRequest $request){    	

    	$cuota=Cuota::create([
    		'anio'=>$request['anio'],
    		'mes'=> $request['mes'],
    		'numero'=>$request['numero'],
    		'monto'=>$request['monto'],
    		'tipo'=>$request['tipo'],
    		'comisionCobrador'=>$request['comisionCobrador']
    		,'borrado'=>0
    	

    		]);
    	
    	return redirect('cuota/crear')->with('success','Se ha agregado una cuota correctamente');
    }

  public function editar($id){
	      $mail_contacto=Configuracion::where('clave','mail_contacto')->first();
	       $cuota=Cuota::find($id);
	


          return view('cuota.edit_cuo', ['cuota'=> $cuota,
    								 'mail_contacto'=> $mail_contacto->valor_textual
    							  ]);
   }
  public function actualizar($id,CuotaRequest $request){
     $cuota=Cuota::find($id);
  	 $cuota->anio=$request['anio'];
  	 $cuota->mes=$request['mes'];
  	 $cuota->numero=$request['numero'];
  	 $cuota->monto=$request['monto'];
  	 $cuota->tipo=$request['tipo'];
  	 $cuota->comisionCobrador=$request['comisionCobrador'];
	
	   $cuota->save();
	   return redirect('cuota/'.$cuota->id.'/editar')->with('success','Se ha modificado los datos correctamente');
   }

   public function eliminar(Request $request, $id){
	   $cuota=Cuota::find($id)->delete();
	   
	   if ($request->ajax()){
		  return response()->json('La cuota ha sido eliminada correctamente');
	 }
	   
	  
	
   }
   public function matriculas(Request $request,$id){
      $nroPag=Configuracion::where('clave','paginacion')->first()->valor_numerico;
      $mail_contacto=Configuracion::where('clave','mail_contacto')->first();
		  if(auth()->user()->rol->descripcion == "consulta"){
        if(auth()->user()->getResponsable() != null){
           $idResp=auth()->user()->getResponsable()->id;
           $query=DB::table('alumno_responsable as a_r')->where('a_r.alumno_id','=',$id)->where('a_r.responsable_id','=',$idResp)->first();
           if($query == null)
              return view('errors.401'); 
         }
         else{
            return view('errors.401');
         }
      }
		  $matriculas=DB::table('cuotas as c')->
		              join('pagos as p','p.cuota_id','=','c.id')->
		              where('p.alumno_id','=',$id)->
		              where('c.tipo','=','Matricula')->
                  where('c.deleted_at','=',null)->paginate($nroPag);
         if ($request->ajax()){
             return response()->json(view('cuota.matriculas_alumno',['matriculas'=> $matriculas ])->render());
         }
         return view('cuota.list_matriculas_alumno', 
                                [   'matriculas'=>$matriculas,
                                    'mail_contacto'=> $mail_contacto->valor_textual
                                ]);
      
   }

   public function cuotas_impagas_y_pagas_admin($id,Request $request){
         $nroPag=Configuracion::where('clave','paginacion')->first()->valor_numerico;
         $mail_contacto=Configuracion::where('clave','mail_contacto')->first();

         
        
        
         $cuotas_impagas=DB::table('cuotas as c')->select('c.*')->
                  groupBy('c.id')->
                  join('alumnos as a',function($join)use($id){
                       $join->on('a.id','=',DB::raw($id))->
                       on('c.mes', '>=', DB::raw('MONTH(a.fechaingreso)'))->
                       on('c.anio','=',DB::raw('YEAR(a.fechaingreso)'))->
                       orOn('c.anio','>' ,DB::raw('YEAR(a.fechaingreso)'));
                     })->
                        whereNotExists(function($query)use($id){
                        $query->select('*')->
                        from('pagos')->where('pagos.cuota_id','=',DB::raw('c.id'))->
                        where('pagos.alumno_id', '=',DB::raw($id));
                        })
                      -> 
                      where('c.deleted_at','=',null)->
                      where('a.deleted_at','=',null)->
                    orderBy('c.anio','desc')->
                    orderBy('c.mes','desc')->paginate($nroPag,['*'],'pag_cuo_imp');
        
                   

         $cuotas_pagas=DB::table('cuotas as c')->select('c.*','p.created_at',DB::raw("
          CASE becado
            WHEN 1 THEN 'Si'
            WHEN 0 THEN 'No'
          END  as beca"))->join('pagos as p','p.cuota_id','=','c.id')->
            join('alumnos as a','p.alumno_id','=','a.id')->
            where('a.id','=',DB::raw($id))->
             where('c.deleted_at','=',null)->
             where('a.deleted_at','=',null)->
            orderBy('c.anio','desc')->
            orderBy('c.mes','desc')->paginate($nroPag,['*'],'pag_cuo_pag');

         $i=0;
        
       
         return view('cuota.list_cuo_pagas_e_impagas_admin', 
                                [   'cuotas_pagas'=>$cuotas_pagas,
                                     'cuotas_impagas'=>$cuotas_impagas,
                                    'mail_contacto'=> $mail_contacto->valor_textual,
                                    'i'=>0,
                                    'idAlumno'=>$id
                                ]);

         
   }
   public function pagarCuotas(Request $request){
          $cuotas_a_pagar=$request['cuotasAPagar'];
          $id_alumno=$request['idAlumno'];
         
          
          for ($i=0; $i < count($cuotas_a_pagar) ; $i++) { 
               $unaCuota=explode(" ", $cuotas_a_pagar[$i]);
               $becado=$unaCuota[0];
               $idCuota=$unaCuota[1];
               if($becado == "beca")
                    $becado=1;
               else
                    $becado=0;

               $cuota=Pago::create([
                       'becado'=>$becado,
                       'alumno_id'=>$id_alumno,
                       'cuota_id'=>$idCuota
                ]);
               
              
          }
          return redirect('alumno/'.$id_alumno.'/cuotas_impagas_y_pagas')->with('success','Se ha realizados los pagos exitosamente');
   }

   /*public function eliminarPago(Request $request,$idAlumno,$idCuota){
      Pago::where('cuota_id',$idCuota)->where('alumno_id',$idAlumno)->first()->delete();
       return redirect('alumno/'.$idAlumno.'/cuotas_impagas_y_pagas')->with('success','Se ha borrado exitosamente el pago de la cuota');
   }*/




   public function eliminarPago($idAlumno,$idCuota,Request $request){
    $pago=Pago::where('alumno_id',$idAlumno)->where('cuota_id',$idCuota)->first();
    Pago::find($pago->id)->delete();
     if ($request->ajax()){
      return response()->json('La cuota ha sido eliminada correctamente');
    }

   }
}

