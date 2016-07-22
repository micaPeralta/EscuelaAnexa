<?php

namespace proyecto_2015\Http\Controllers;
use proyecto_2015\Alumno;
use proyecto_2015\Responsable;
use proyecto_2015\Configuracion;
use proyecto_2015\Http\Requests\AlumnoRequest;
use Carbon\Carbon;
use \App\Helpers\DateConvert;
use Illuminate\Http\Request;
use DB;


class AlumnoController extends Controller
{	 


public function listar(Request $request){

   $nroPag=Configuracion::where('clave','paginacion')->first()->valor_numerico;
   $alumnos=Alumno::orderBy('apellido')->paginate($nroPag);
   $mail_contacto=Configuracion::where('clave','mail_contacto')->first();

   if ($request->ajax()){
   	 return response()->json(view('alumno.alumnos',['alumnos'=> $alumnos ])->render());
   }

   	  
   return view('alumno.list_alum', 
							   	[	'alumnos'=>$alumnos,
							   		'mail_contacto'=> $mail_contacto->valor_textual
							   	]);
}
public function editar($id){
	$mail_contacto=Configuracion::where('clave','mail_contacto')->first();
	$alumno=Alumno::find($id);

	$responsables= Responsable::lists('nombre', 'id');
    return view('alumno.edit_alum', ['alumno'=> $alumno,
    								 'mail_contacto'=> $mail_contacto->valor_textual,
   									 'responsables'=> $responsables,
   									 'responsable'=>$alumno->responsables]);
   }

public function crear(){
	$mail_contacto=Configuracion::where('clave','mail_contacto')->first();
	$responsables= Responsable::lists('nombre', 'id');

	return view('alumno.alta_alum',['alumno'=>array(),
									'mail_contacto'=> $mail_contacto->valor_textual,
									'responsables'=> $responsables]);
}

public function agregar(AlumnoRequest $request){

	$fechaNacimiento= DateConvert::convertToDate($request['fechaNacimiento']);	
	$fechaIngreso=DateConvert::convertToDate($request['fechaIngreso']);	
	$fechaEgreso=DateConvert::convertToDate($request['fechaEgreso']);	



	$alumno=Alumno::create([
		'nombre'=>$request['nombre'],
		'apellido'=> $request['apellido'],
		'telefono'=>$request['telefono'],
		'direccion'=>$request['direccion'],
		'mail'=>$request['mail'],
		'nroDocumento'=>$request['nroDocumento'],
		'sexo'=>$request['sexo'],
		'fechaNacimiento'=>$fechaNacimiento,
		'fechaIngreso'=>$fechaIngreso,
		'fechaEgreso'=>$fechaEgreso,
		'fechaAlta'=> Carbon::now()

		]);
		/*agrego una tupla en reposnsable_alumno*/
		$alumno->responsables()->attach($request['idResponsable']);
	
	return redirect('alumno/crear')->with('success','Se ha agregado un alumno correctamente');
}



public function mostrar($id){
	$alumno=Alumno::find($id);
	$mail_contacto=Configuracion::where('clave','mail_contacto')->first();
	return view('alumno.ver_alum',['alumno'=>$alumno,
							'mail_contacto'=> $mail_contacto->valor_textual]);
}


public function actualizar($id,AlumnoRequest $request){
	$alumno=Alumno::find($id);
	

	$fechaNacimiento= DateConvert::convertToDate($request['fechaNacimiento']);	
	$fechaIngreso=DateConvert::convertToDate($request['fechaIngreso']);	
	$fechaEgreso=DateConvert::convertToDate($request['fechaEgreso']);
	$fechaAlta=DateConvert::convertToDate($request['fechaAlta']);

	$alumno->nombre=$request['nombre'];
	$alumno->apellido=$request['apellido'];
	$alumno->direccion=$request['direccion'];
	$alumno->telefono=$request['telefono'];
	$alumno->mail=$request['mail'];
	$alumno->nroDocumento=$request['nroDocumento'];
	$alumno->sexo=$request['sexo'];
	$alumno->fechaEgreso=$fechaEgreso;
	$alumno->fechaIngreso=$fechaIngreso;
	$alumno->fechaNacimiento=$fechaNacimiento;
	$alumno->fechaAlta=$fechaAlta;

	$alumno->save();

	return redirect('alumno/'.$alumno->id.'/editar')->with('success','Se ha modificado los datos correctamente');
}

public function eliminar(Request $request, $id){
	$alumno=Alumno::find($id)->delete();

	if ($request->ajax()){
		return response()->json('eliminado correctamente');
	}
	
}
public function alumnos_y_cuotas(Request $request){
    
   $nroPag=Configuracion::where('clave','paginacion')->first()->valor_numerico;
   $alumnos=Alumno::orderBy('apellido')->paginate($nroPag);
   $mail_contacto=Configuracion::where('clave','mail_contacto')->first();

   if ($request->ajax()){
   	 return response()->json(view('alumno.alumnos_pagos',['alumnos'=> $alumnos ])->render());
   }

   	  
   return view('alumno.list_alumnos_pagos', 
							   	[	'alumnos'=>$alumnos,
							   		'mail_contacto'=> $mail_contacto->valor_textual
							   	]);
}

}