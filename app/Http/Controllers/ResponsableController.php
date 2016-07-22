<?php
namespace proyecto_2015\Http\Controllers;

use Illuminate\Http\Request;
use proyecto_2015\Responsable;
use proyecto_2015\Alumno;
use proyecto_2015\Configuracion;
use proyecto_2015\Http\Requests\ResponsableRequest;
use proyecto_2015\Http\Requests;
use \App\Helpers\DateConvert;
use DB;
use Session;
use proyecto_2015\User;

class ResponsableController extends Controller
{
    //
	public function responsablesDeAlumno(Request $request,$idAlumno){
		$mail_contacto=Configuracion::where('clave','mail_contacto')->first();
		$pag=Configuracion::where('clave','paginacion')->first()->valor_numerico;
		$idAlumno=intval($idAlumno);
		
		$alumno=Alumno::find($idAlumno);
		/*Responsables del alumno*/
		$resp_alum=$alumno->responsables();
		$resp_alum=$resp_alum->select('id')->get();
		
		if (! $resp_alum->isEmpty()){
			
			$ids_resp=array();
			foreach ($resp_alum as $resp) {
				array_push($ids_resp,$resp->id);
			}  
			
			$responsables_todos= DB::table('responsables')
							->where('deleted_at','=',null)
	                        ->whereNotIn('id', $ids_resp)
	                        ->orderBy('nombre')->get();
	                      
		}
	    else {
	    	$responsables_todos=Responsable::all();
	    }   
		
		if ($request->ajax()){
				return response()->json(view('responsable.responsables',[
							'alumno' => $alumno					
							])->render());
		}
		else {
			return view('responsable.ver_responsables_alumno',[
			'alumno' => $alumno,
			'responsables_todos'=>$responsables_todos,
			'mail_contacto'=>$mail_contacto->valor_textual
			]);
		}
		
	}

	public function eliminar(Request $request, $id){
		$responsable=Responsable::find($id)->delete();
	
		if ($request->ajax()){
			return response()->json('eliminado correctamente');
		}
		
	}

	public function eliminarResponsableAlumno(Request $request,$idAlumno,$idResponsable){
	
		$alumno=Alumno::find($idAlumno);
		$alumno->responsables()->detach($idResponsable);
		return redirect("alumno/$idAlumno/responsables")->with('success','Se eliminó correctamente');
	}

	public function eliminarResponsableUsuario($idUsuario,$idResponsable,Request $request){
		
		
		$usuario=User::find($idUsuario);
		$usuario->responsable()->detach($idResponsable);
	
		return redirect('usuario/'.$idUsuario.'/editar')->with('success',' Se eliminó correctamente');
	}
	

	public function asignarResponsables(Request $request){
		/*Asigna un alumno a un responsable */
		$idAlumno=$request['idAlumno'];
		$idResponsable=$request['idResponsable'];

		$ok=DB::table('alumno_responsable')->where([
			    ['alumno_id',$idAlumno],
			    ['responsable_id',$idResponsable],
			])->get();

		if (empty($ok)){
			/*si no está ya registrado ese  responsable con ese alumno*/
			$alumno=Alumno::find($idAlumno);
			$alumno->responsables()->attach($request['idResponsable']);			
		}
		else {Session::flash('error-auth','Datos invalidos');	}
		 return redirect('alumno/'.$idAlumno.'/responsables');
		
	}

	public function asignarResponsableUsuario($idUsuario,Request $request){

		$idResponsable=$request['idResponsable'];

		$ok=DB::table('responsable_usuario')->where([
			    ['usuario_id',$idUsuario],
			    ['responsable_id',$idResponsable],
			])->get();
	
		if (empty($ok)){
			/*si no está ya registrado ese  responsable con ese usuario*/
			$usuario=User::find($idUsuario);  
			$usuario->responsable()->detach(); 		
   			$usuario->responsable()->attach($request['idResponsable']);
			
			
		}
		 return redirect('usuario/'.$idUsuario.'/editar')->with('success','  La operacion se ha llevado a cabo correctamente');
	}

	public function listarTodo(Request $request){
		$mail_contacto=Configuracion::where('clave','mail_contacto')->first();
		$pag=Configuracion::where('clave','paginacion')->first()->valor_numerico;

		$responsables=Responsable::orderBy('apellido')->paginate($pag);

		 if ($request->ajax()){
		   	return response()->json(view('responsable.responsables',['responsables'=> $responsables ])->render());
		   }
		return view('responsable.listRes',[
			'responsables'=> $responsables,
			'mail_contacto' => $mail_contacto->valor_textual
			]);
	}

	public function editar($id){
		$mail_contacto=Configuracion::where('clave','mail_contacto')->first();
		$responsable=Responsable::find($id);
	
		return view('responsable.edit_resp',[	
			'responsable'=> $responsable,
			'mail_contacto'=>$mail_contacto->valor_textual
			]);
	}


	public function crear(){
		$mail_contacto=Configuracion::where('clave','mail_contacto')->first();
		$responsable=Responsable::find(1);
	
		return view('responsable.alta_resp',['mail_contacto'=> $mail_contacto->valor_textual ]);
	}

	public function mostrar($id){
		$mail_contacto=Configuracion::where('clave','mail_contacto')->first();
		$responsable=Responsable::find($id);
	
		return view('responsable.ver_resp',[
			'responsable'=> $responsable,
			'mail_contacto'=>$mail_contacto->valor_textual
			]);
	}

	public function agregar(ResponsableRequest $request){
		$fechaNacimiento= DateConvert::convertToDate($request['fechaNacimiento']);	


		$responsable=Responsable::create([
			'nombre'=>$request['nombre'],
			'apellido'=> $request['apellido'],
			'telefono'=>$request['telefono'],
			'direccion'=>$request['direccion'],
			'mail'=>$request['mail'],
			'sexo'=>$request['sexo'],
			'fechaNacimiento'=>$fechaNacimiento,
			'tipo'=> $request['tipo']
			]);

		
		return redirect('responsable/crear')->with('success','Se ha agregado un responsable correctamente');
}
	public function actualizar($id,ResponsableRequest $request){
		$responsable=Responsable::find($id);

		$fechaNacimiento= DateConvert::convertToDate($request['fechaNacimiento']);	
		
		$responsable->nombre=$request['nombre'];
		$responsable->apellido=$request['apellido'];
		$responsable->direccion=$request['direccion'];
		$responsable->telefono=$request['telefono'];
		$responsable->mail=$request['mail'];
		$responsable->sexo=$request['sexo'];
		$responsable->tipo=$request['tipo'];
		$responsable->fechaNacimiento=$fechaNacimiento;

		$responsable->save();
	return redirect('responsable/'.$responsable->id.'/editar')->with('success','Se ha modificado los datos correctamente');
}


}