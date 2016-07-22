<?php

namespace proyecto_2015\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use proyecto_2015\Configuracion;
use proyecto_2015\Http\Requests;
use Session;
use proyecto_2015\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function Login(LoginRequest $request){
    	if (Auth::attempt(['username'=> $request['username'],
    		'password'=>$request['password'],
    		'habilitado'=> 1]))
    	{
			return Redirect('home');
 		
    	}
    	else {Session::flash('error-auth','Datos invalidos');	}
    		
    	return Redirect('login');


    }

  public function showLogin(){
    
    if (! Auth::check()){
    	$habilitado= Configuracion::where('clave','frontend')->first()->valor_textual;
    	 /* Controlo la habilitacion del frontend*/
    	if($habilitado== 'si'){

    	   	return view('auth/login',['mail_contacto'=> Configuracion::where('clave','mail_contacto')->first()->valor_textual]);
  	  }	
  	  else{
  	    	$msj= Configuracion::where('clave','mensaje_inhab')->first()->valor_textual;
  	    	return view('mensaje_des',['mensaje'=> $msj]);
  	    }
    }
    else{
      return redirect('home');
    } 
	}

	public function logout(){
		Auth::logout();
		return redirect('/');
	}
}
