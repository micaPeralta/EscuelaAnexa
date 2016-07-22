@extends('template.backend_admin')

 @section('main')
	   		<ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Agregar Usuario </li>
              </ol>
			 	<section  class="formulario">
			 	
				<h2> Nuevo Usuario</h2>
				@include('alerts.errors')
				@include('alerts.success')

   				 {!! Form::open(["action"=>['UsuarioController@agregar'],'method'=>'POST'])!!}
   				 <div class="panel">
				<div class="body-panel">
			 		  
				  {!! csrf_field() !!}

			 
			 		<div class="grupo_form">
	   				{!! Form::label('username','Username');!!}*<br>
					{!! Form::text('username',null,['id'=> 'username','class'=>'form-control','placeholder'=>'Username','required'=>true]);!!} <br>		   				
	   				</div>
	   			

		   			<div class="grupo_form">
		   				{!! Form::label('rol_id','Rol *');!!}<br>
					 	{!! Form::select('rol_id',['3'=>'Administrador','2'=> 'Gestion','1'=>'Consulta'],null,['placeholder'=> 'Seleccione..','class'=>'form-control','required'=>true]);!!} <br>	
				
			   		</div>
		   			
			   		<div class="grupo_form">
			   			{!! Form::label('habilitado','Habilitado *');!!}<br>
					 	{!! Form::select('habilitado',['1'=>'Si','0'=>'No'],null,['placeholder'=> 'Seleccione..','class'=>'form-control','required'=>true]);!!} <br>	
					</div>	

			 		<div class="grupo_form">
				 		<label for="password">Contraseña*</label><br>
					 	<input id="password" type="password" class="form-control" name="password"  placeholder="Contraseña" value="" required><br>
			 		</div>

				 	
			 	</div>		 
				 <div class="footer-panel">		
						<a href={{url('home')}} class="btn btn-danger">Cancelar</a>		 		
				 		<input class="btn  btn-primary" type="submit" value="Enviar" >
				</div>
			</div>



			    </form>
			 	</section>

@endsection