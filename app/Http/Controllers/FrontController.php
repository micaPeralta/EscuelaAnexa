<?php

namespace proyecto_2015\Http\Controllers;

use proyecto_2015\Configuracion;
use Illuminate\Http\Request;
use proyecto_2015\Http\Requests;
use Auth;
use proyecto_2015\Http\Controllers\Controller;
use proyecto_2015\Http\Requests\ConfiguracionRequest;

class FrontController extends Controller
{
    function index(){

    /*si el usuario está logueado*/
    if (! Auth::check()){

        $habilitado= Configuracion::where('clave','frontend')->first()->valor_textual;
        /* Controlo la habilitacion del frontend*/
         if($habilitado== 'si'){

              return view('frontend',[
                                'titulo'=>Configuracion::where('clave','titulo')->first()->valor_textual,
                                'descripcion'=>Configuracion::where('clave','descripcion')->first()->valor_textual,
                                'mail_contacto'=>Configuracion::where('clave','mail_contacto')->first()->valor_textual                        ]);
           }
         else {
             $mensaje=Configuracion::where('clave','mensaje_inhab')->first()->valor_textual;
             return view('mensaje_des',['mensaje'=> $mensaje]);
         }
   }
    else {
      return redirect('home');
    }
    	
    	
    }


    public function home()
    {   $mail_contacto=Configuracion::where('clave','mail_contacto')->first()->valor_textual ;
        switch (auth()->user()->rol->descripcion) {
             case 'admin':
                 return view('template/backend_admin',['mail_contacto'=>$mail_contacto]);
                 break;
            case 'gestion':
                 return view('template/backend_gestion',['mail_contacto'=>$mail_contacto]);
                 break;
             case 'consulta':
                 return view('template/backend_consulta',['mail_contacto'=>$mail_contacto]);
                  break;
             default:
                 # code...
                 break;
        }
        
    }


    public function configuracion(){


        return view('config',[
            'frontend'=> Configuracion::where('clave','frontend')->first()->valor_textual,
            'mensaje_inhab'=>Configuracion::where('clave','mensaje_inhab')->first()->valor_textual,
            'mail_contacto'=>Configuracion::where('clave','mail_contacto')->first()->valor_textual,
            'paginacion'=>Configuracion::where('clave','paginacion')->first()->valor_numerico,
            'descripcion'=>Configuracion::where('clave','descripcion')->first()->valor_textual,
            'titulo'=>Configuracion::where('clave','titulo')->first()->valor_textual,

            ]
        );
    }

    public function actualizarConf(ConfiguracionRequest $Request){
        

        $mensaje_inhab=Configuracion::where('clave','mensaje_inhab')->first();
        $mensaje_inhab->valor_textual=$Request['mensaje_inhab'];
        $mensaje_inhab->save();

        $mail_contacto=Configuracion::where('clave','mail_contacto')->first();
        $mail_contacto->valor_textual=$Request['mail_contacto'];
        $mail_contacto->save();

        $paginacion=Configuracion::where('clave','paginacion')->first();
         $paginacion->valor_numerico=$Request['paginacion'];
        $paginacion->save();

        $descripcion=Configuracion::where('clave','descripcion')->first();
        $descripcion->valor_textual=$Request['descripcion'];
        $descripcion->save();

        $titulo=Configuracion::where('clave','titulo')->first();
        $titulo->valor_textual=$Request['titulo'];
        $titulo->save();

        $frontend=Configuracion::where('clave','frontend')->first();
        $frontend->valor_textual=$Request['frontend'];
        $frontend->save();

        return redirect('configuracion')->with('success','Se modificaron los datos correctamente');

    }

}
