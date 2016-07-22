<?php

namespace proyecto_2015\Http\Controllers;

use Illuminate\Http\Request;
use proyecto_2015\User;
use proyecto_2015\Responsable;
use proyecto_2015\Configuracion;
use proyecto_2015\Http\Requests;
use proyecto_2015\Http\Requests\UsuarioRequest;
use proyecto_2015\Http\Requests\UsuarioEditarRequest;
use proyecto_2015\Http\Requests\UsuarioCambiarClaveRequest;
use proyecto_2015\Http\Controllers\Controller;
use DB;

class UsuarioController extends Controller
{
    
    function listar(){
    	$mail_contacto=Configuracion::where('clave','mail_contacto')->first();

    	$pag=Configuracion::where('clave','paginacion')->first()->valor_numerico;
    	$usuarios=User::select("*",DB::raw("CASE habilitado
            WHEN 1 THEN 'Si'
            WHEN 0 THEN 'No'
          END  as habilitado"))->paginate($pag);
    
    	return view('usuario.list_us',[
    		'usuarios'=>$usuarios,
    		'mail_contacto'=> $mail_contacto->valor_textual
    		]);
    }

    public function eliminar(Request $request, $id){
		$usuario=User::find($id)->delete();
		if ($request->ajax()){
			return response()->json('eliminado correctamente');
		}
		
	}


    public function editar($id){
        $mail_contacto=Configuracion::where('clave','mail_contacto')->first();
        $usuario=User::find($id);


        $responsable=$usuario->responsable;
        /*Si tiene un responsable */
        if ($responsable != false){
            /*guardo todos los responsables menos el que tiene asigado*/
            $responsables=DB::table('responsables')
                        ->where('deleted_at','=',null)
                        ->whereNotIn('id', [$responsable->id])
                        ->orderBy('nombre')
                        ->get();
        }
        else {
            $responsables=Responsable::all();
        }
          
        return view('usuario.edit_us', ['usuario'=> $usuario,
                                        'responsable'=> $responsable,
                                        'responsables'=> $responsables,
                                         'mail_contacto'=> $mail_contacto->valor_textual,
                                         ]);
   }

   public function actualizar($id,UsuarioEditarRequest $request){
        $usuario=User::find($id);

        $usuario->rol_id=$request['rol_id'];
        $usuario->habilitado=$request['habilitado'];
      
        

        $usuario->save();
        return redirect('usuario/'.$usuario->id.'/editar')->with('success','Se ha modificado los datos correctamente');
    }

    public function actualizarClave($id,UsuarioCambiarClaveRequest $request){
        $usuario=User::find($id);
        $usuario->password= bcrypt($request['password']);        
        $usuario->save();
        return redirect('usuario/'.$usuario->id.'/editar')->with('success','Se ha modificado los datos correctamente');
    }

    public function crear(){
        $mail_contacto=Configuracion::where('clave','mail_contacto')->first();

        return view('usuario.alta_us',[ 'mail_contacto'=> $mail_contacto->valor_textual]);
    }

    public function agregar(UsuarioRequest $request){
       
        $usuario=User::create([
            'username'=>$request['username'],
            'password'=>bcrypt($request['password']),
            'habilitado'=>$request['habilitado'],
            'rol_id'=>$request['rol_id'],
              ]);
       
        
    return redirect('usuario/crear')->with('success','Se ha agregado un usuario correctamente');
    }
    


}
