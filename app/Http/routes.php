<?php

Route::get('/','FrontController@index');



 /*Grupo de rutas de acceso solo para usuarios autentificados*/    
 /*Cualquier ruta no colocados dentro de la web del grupo de middleware no tendrán acceso a las sesiones y la protección CSRF*/	


Route::group(['middleware' => 'web'], function () {
  Route::get('/','FrontController@index');
  Route::get('login','LoginController@showlogin');
  Route::post('login','LoginController@login');
  Route::resource('logout','LoginController@logout');
   
   Route::get('home','FrontController@home')->middleware('auth');

		Route::group(['middleware' =>['auth' ,'administrador']], function(){
				   
			  	/*-------------------------------alumnos------------------*/
				Route::get('alumno/crear','AlumnoController@crear')->name('crearAlumno');
				Route::post('alumno/agregar','AlumnoController@agregar');
                
                Route::get('cuota/crear','CuotaController@crear');
				Route::post('cuota/agregar','CuotaController@agregar');
		
				Route::get('alumno/{id}','AlumnoController@mostrar');
				Route::get('alumnos','AlumnoController@listar');
				Route::get('cuota/{id}','CuotaController@mostrar');

				Route::put('alumno/actualizar/{id}','AlumnoController@actualizar');
				Route::get('alumno/{id}/editar','AlumnoController@editar')->name('editarAlumno');

				Route::put('alumno/{id}','AlumnoController@eliminar');

				/*--------------------configuracion------------------------*/

				Route::get('configuracion','FrontController@configuracion');
				Route::put('configuracion/editar','FrontController@actualizarConf');

				/*-------------------responsables------------------------*/
				
				Route::get('responsables','ResponsableController@listarTodo');
				Route::get('responsable/{id}/editar','ResponsableController@editar');
				Route::get('alumno/{id}/responsables','ResponsableController@responsablesDeAlumno');
			

				Route::get('responsable/crear','ResponsableController@crear')->name('crearResp');
				Route::post('responsable/asignar','ResponsableController@asignarResponsables');
				Route::put('responsable/{id}','ResponsableController@eliminar');
				Route::put('responsable/actualizar/{id}','ResponsableController@actualizar');
				Route::get('responsable/{id}','ResponsableController@mostrar');
				Route::delete('alumno/{idA}/responsable/{idR}','ResponsableController@eliminarResponsableAlumno');			
				Route::delete('usuario/{idU}/responsable/{idR}','ResponsableController@eliminarResponsableUsuario');
				Route::post('responsable/agregar','ResponsableController@agregar');


				/*---------------------usuarios---------------------------*/
				Route::get('usuario/crear','UsuarioController@crear');
				Route::post('usuario/agregar','UsuarioController@agregar');
				Route::get('usuarios','UsuarioController@listar');
				Route::put('usuario/{id}','UsuarioController@eliminar');
				Route::get('usuario/{id}/editar','UsuarioController@editar');
				Route::put('usuario/{id}/actualizar','UsuarioController@actualizar');
				Route::put('usuario/{id}/actualizarClave','UsuarioController@actualizarClave');
				Route::post('usuario/{id}/responsable','ResponsableController@asignarResponsableUsuario');
	       
	            
		 });	



   		Route::group(['middleware' =>['auth','gestion']], function(){
				
				Route::get('cuotas','CuotaController@listar');
				
				Route::get('cuota/crear','CuotaController@crear');
				Route::post('cuota/agregar','CuotaController@agregar');

				Route::get('cuota/{id}/editar','CuotaController@editar')->name('editarCuota');
				Route::put('cuota/actualizar/{id}','CuotaController@actualizar');

                Route::get('cuota/{id}','CuotaController@mostrar');


                Route::put('cuota/{id}','CuotaController@eliminar');             	       
                Route::get('alumnos_y_cuotas','AlumnoController@alumnos_y_cuotas');
		        Route::post('pagarCuotas','CuotaController@pagarCuotas');
		         //Route::get('alumno/{idAlumno}/borrarPago/{idCuota}','CuotaController@eliminarPago');
		        Route::get('alumno/{id}/cuotas_impagas_y_pagas','CuotaController@cuotas_impagas_y_pagas_admin');
		        Route::delete('alumno/{idA}/cuota/{idC}','CuotaController@eliminarPago');
		});	  



   		Route::group(['middleware' =>['auth','consulta']], function(){
   				
		       Route::get('alumno/{id}/matriculas','CuotaController@matriculas');		
   			   Route::get('cuotas_impagas_vencidas','ListadosController@cuotas_impagas_vencidas');
			   Route::get('cuotas_pagadas_o_becadas','ListadosController@cuotas_pagadas_o_becadas');
			   Route::get('alumnos_matriculas_pagas','ListadosController@alumnos_matriculas_pagas');
			
			

		});	

      

});



