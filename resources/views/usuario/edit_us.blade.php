@extends('template.backend_admin')


@section('main')
		 <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li><a href="{{url('usuarios')}}">Listado usuarios</a></li>
                <li class="active">Editar usuario</li>
       </ol>
	<div class="formulario">
			@include('alerts.errors')
			@include('alerts.success')
			@include('alerts.operacion_response')
              
             
	   	 {!! Form::model($usuario,["action"=>['UsuarioController@actualizar',$usuario->id],'method'=>'PUT'])!!}
				  
				  {!! csrf_field() !!}
			 <div class="panel">
			 <div class="header-panel">Datos Usuario</div>
	   		<div class="body-panel">
	   			<div class="grupo_form">
	   				{!! Form::label('username','Username');!!}*<br>
					{!! Form::text('username',null,['id'=> 'username','class'=>'form-control','readonly'=>true]);!!} <br>	
	   				
	   			</div>
	   			

	   			<div class="grupo_form">
	   				{!! Form::label('rol_id','Rol *');!!}<br>
				 	{!! Form::select('rol_id',['3'=>'Administrador','2'=> 'Gestion','1'=>'Consulta'],null,['class'=>'form-control','required'=>true]);!!} <br>	
			
		   		</div>
		   			
		   		<div class="grupo_form">
		   			{!! Form::label('habilitado','Habilitado *');!!}<br>
				 	{!! Form::select('habilitado',['1'=>'Si','0'=>'No'],null,['class'=>'form-control','required'=>true]);!!} <br>	
			
		   	
		   		</div>	
		   	</div>	
	   		<div class="footer-panel">
					<input class="btn btn-primary" type="submit" value="Editar" >
				</form>
			</div> 
			</div>	<br>	

			<button class="btn btn-block btn-primary" id="passw"> Cambiar clave</button>

			
			 <div class="panel" style="display: none" id="modf_clave">
			 {!! Form::open(["action"=>['UsuarioController@actualizarClave',$usuario->id],'method'=>'PUT'])!!}
			 <div class="header-panel">Cambiar Password</div>
	   		<div class="body-panel">
	   			<div class="grupo_form">
	   				{!! Form::label('password','Nueva clave');!!}*<br>
			   		{!! Form::password('password', ['class'=>'form-control','required'=>true]) !!}

			   		{!! Form::label('password_confirmation','Confirme clave');!!}*<br>
			   		{!! Form::password('password_confirmation', ['class'=>'form-control','required'=>true]) !!}

	   			</div>
					

	   		</div>
			<div class="footer-panel">
				<a href={{url('home')}} class="btn btn-danger">Cancelar</a>
	   			<input class="btn btn-primary" type="submit" value="Cambiar" >
	   		</div>
			{!!Form::close()!!}
	   		</div>	<br>


			   @if( $responsable === false)	
			   <div class="alert alert-danger"> 
			   		{{$usuario->username}} no tiene un responsable asignado
			   	</div>
			<button class="btn btn-block btn-primary" id="resp"> Asignar Responsable</button><br>
			   @else
				
			 
				   <div class="panel" id="eliminar">
						<div class="header-panel"> Responsable</div>
						<div class="body-panel">
				   			<strong> Nombre:</strong> {{$responsable->nombre}}
				   			<strong> Apellido:</strong> {{$responsable->apellido}}
				   			<strong> Rol:</strong> {{$responsable->tipo}}
				   		</div>
				   		<div class="footer-panel "> 
				   	{!! Form::open(["action"=>['ResponsableController@eliminarResponsableUsuario',$usuario->id,$responsable->id],'method'=>'DELETE','name'=>'formElimRU']);!!}
							<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
							
							<input type="button"  class="btn btn-danger btn-sm" onclick="confirmarBorradoRespUsuario()" value="Eliminar" />
					   		 
						</form>
				   		</div>
				   	</div>

				   	<button class="btn btn-block btn-primary" id="resp"> Cambiar Responsable</button>
				@endif
					
		
				   	<div class="panel" style="display: none;" id="cambiar_resp">
						<div class="header-panel"> Asignar responsable</div>
						<div class="body-panel">
				   		{!! Form::open(["action"=>['ResponsableController@asignarResponsableUsuario',$usuario->id],'method'=>'POST']);!!}
							  
				   				<label for="idResponsable"> </label>
				   				<select id="idResponsable" name="idResponsable" 
				   				 class="form-control">
									@foreach($responsables as $responsable)
									<option value="{{$responsable->id}}"> {{$responsable->nombre}} {{$responsable->apellido}} | {{$responsable->tipo}}</option>
									@endforeach
								</select>								
								
						</div>
						<div class="footer-panel"> <input class="btn  btn-primary " type="submit" value="Asignar">
						</form>
					</div> 

				</div>
				
				</div>

 <script> $(".chosen-select").chosen({no_results_text: "Oops, no hay resultados!"}); </script>
 @endsection 