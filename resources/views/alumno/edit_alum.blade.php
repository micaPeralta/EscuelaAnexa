@extends('template.backend_admin')

@section('main')
	   		<ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li><a href="{{url('alumnos')}}">Listado alumnos</a></li>
                <li class="active">Editar alumno</li>
              </ol>

			 <section  class="formulario">
			 	 <h2> Editar Alumno </h2> 
					@include('alerts.errors')
 					@include('alerts.success')
 					@include('alerts.operacion_response')
 					
			 	  {!! Form::model($alumno,["action"=>['AlumnoController@actualizar',$alumno->id],'method'=>'PUT'])!!}
				  
				  {!! csrf_field() !!}
				  <div class="panel">
			 	
			 	<div class="grupo_form">
			 		
			 		 <strong>Datos alumno</strong><br><hr>

			 		
					
					
					{!! Form::label('apellido','Apellido');!!}<br>
					{!! Form::text('apellido',null,['id'=> 'apellido','placeholder'=>'Apellido','required','class'=>'form-control']);!!} <br>	
				 	
			 	
			 		
			 		{!! Form::label('nombre','Nombre');!!}<br>
				 	{!! Form::text('nombre',null,['id'=> 'nombre','placeholder'=>'Nombre','required','class'=>'form-control']);!!} <br>	
				 	
			 		
				 	

				 	{!! Form::label('sexo','Sexo *');!!}<br>
				 	{!! Form::select('sexo',['Femenino'=>'Femenino','Masculino'=>'Masculino'],null,['placeholder'=> 'Seleccione..','required','class'=>'form-control']);!!} <br>	
			
				 	

			 		{!! Form::label('nroDocumento','Dni *');!!}<br>
			 		{!! Form::number('nroDocumento',null,['placeholder'=>'Dni','id'=>'nroDocumento','required','class'=>'form-control']);!!}<br>
			 	
			 		
			 		{!! Form::label('fechaNacimiento','Fecha Nacimiento *');!!}<br>
			 		{!! Form::text('fechaNacimiento',$alumno->fechaNacimiento->format('d-m-Y'),['id'=> 'fechaNacimiento','pattern'=> "(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" , 'placeholder'=>"dd/mm/aaaa" ,'required','class'=>'form-control' ]);!!}<br>
			 		

			 	</div>
			 	<div class="grupo_form">		
	 		 		<strong>Informaci&oacute;n de contacto del alumno</strong><br>
				 		<hr>
				 		{!! Form::label('mail','Mail *');!!}<br>
				 		{!! Form::email('mail',null,['placeholder'=>'example@maili','id'=>'mail','required','class'=>'form-control']);!!}<br>
				 		
				 		
				 			{!! Form::label('telefono','Tel&eacute;fono*');!!}<br>
				 			{!! Form::number('telefono',null,['placeholder'=>'Telefono','id'=>'telefono','required','min'=>0,'class'=>'form-control']);!!}<br>
				 			

				 			 		
				 		
				 		{!! Form::label('direccion','Direccion');!!}*<br>
				 		{!! Form::text('direccion',null,['id'=> 'direccion','placeholder'=>'Direccion','class'=>'form-control']);!!} <br>	
				 			

				 			
				 			<br>{!! Form::label('fechaIngreso','Fecha de ingreso');!!}*<br>
							{!! Form::text('fechaIngreso',$alumno->fechaIngreso->format('d-m-Y'),['id'=> 'fechaIngreso','pattern'=> "(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" , 'placeholder'=>"dd-mm-aaaa" ,'required','class'=>'form-control' ]);!!}<br>
							
							<br>{!! Form::label('fechaEgreso','Fecha de egreso');!!}*<br>
							{!! Form::text('fechaEgreso',$alumno->fechaEgreso->format('d-m-Y'),['id'=> 'fechaEgreso','pattern'=> "(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" , 'placeholder'=>"dd-mm-aaaa" ,'required','class'=>'form-control' ]);!!}<br>		

							<br>{!! Form::label('fechaAlta','Fecha de alta');!!}*<br>
							{!! Form::text('fechaAlta',$alumno->fechaAlta->format('d-m-Y'),['id'=> 'fechaAlta','pattern'=> "(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" , 'placeholder'=>"dd-mm-aaaa" ,'required','class'=>'form-control' ]);!!}<br>		
												
						
				 		
				</div>
			 
			 		<div class="footer-panel">
			 			<a href={{url('home')}} class="btn btn-danger"> Cancelar</a>
				 		{!! Form::submit('Enviar',['class'=>' btn  btn-primary'])!!}
					</div>
			</div>


		     	  {!! Form::close() !!}
			    
			 </section>

 @endsection