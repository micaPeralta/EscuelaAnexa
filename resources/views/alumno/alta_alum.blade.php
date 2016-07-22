@extends('template.backend_admin')

 @section('main')
	   		<ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Agregar alumno </li>
              </ol>
			 	<section  class="formulario">
			 	 <h2> Nuevo Alumno </h2> 
 				
 				@include('alerts.errors')
 				@include('alerts.operacion_response')


 					

			
				{!! Form::open(['action'=> ['AlumnoController@agregar'],'method'=>'POST'])!!}
					{!! csrf_field() !!}

				  <div class="panel">
			 	
			 	<div class="grupo_form">
			 		
			 		 <strong>Datos alumno</strong><br><hr>

			 		
					
					
					{!! Form::label('apellido','Apellido');!!}*<br>
					{!! Form::text('apellido',null,['id'=> 'apellido','placeholder'=>'Apellido','class'=>'form-control','required'=>true]);!!} <br>	
				 
			 	
			 		
			 		{!! Form::label('nombre','Nombre');!!}*<br>
				 	{!! Form::text('nombre',null,['id'=> 'nombre','placeholder'=>'Nombre' ,'class'=>'form-control','required'=>true]);!!} <br>	
				 	
			 		
				 	

				 	{!! Form::label('sexo','Sexo *');!!}<br>
				 	{!! Form::select('sexo',['Femenino'=>'Femenino','Masculino'=>'Masculino'],null,['placeholder'=> 'Seleccione..','class'=>'form-control','required'=>true]);!!} <br>	
			
				 	

			 		{!! Form::label('nroDocumento','Dni *');!!}<br>
			 		{!! Form::number('nroDocumento',null,['placeholder'=>'Dni','id'=>'nroDocumento','class'=>'form-control', 'min'=>0,'max'=>'99999999','required'=>true]);!!}<br>
			 	
			 		
			 		{!! Form::label('fechaNacimiento','Fecha Nacimiento *');!!}<br>
			 		{!! Form::text('fechaNacimiento',null,['id'=> 'fechaNacimiento','pattern'=> "(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" , 'placeholder'=>"dd/mm/aaaa"  ,'class'=>'form-control','required'=>true]);!!}<br>
			 		

			 	</div>
			 	<div class="grupo_form">		
	 		 		<strong>Informaci&oacute;n de contacto del alumno</strong><br>
				 		<hr>
				 		{!! Form::label('mail','Mail *');!!}<br>
				 		{!! Form::email('mail',null,['placeholder'=>'example@maili','id'=>'mail' ,'class'=>'form-control','required'=>true]);!!}<br>
				 		
				 		
				 			{!! Form::label('telefono','Tel&eacute;fono*');!!}<br>
				 			{!! Form::number('telefono',null,['placeholder'=>'Telefono','id'=>'telefono','min'=>0,'class'=>'form-control','required'=>true]);!!}<br>
				 			

				 			 		
				 		
				 		{!! Form::label('direccion','Direccion');!!}*<br>
				 		{!! Form::text('direccion',null,['id'=> 'direccion','placeholder'=>'Direccion','class'=>'form-control','required'=>true]);!!} <br>	
				 			

				 			
				 			<br>{!! Form::label('fechaIngreso','Fecha de ingreso');!!}*<br>
							{!! Form::text('fechaIngreso',null,['id'=> 'fechaIngreso','pattern'=> "(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" , 'placeholder'=>"dd-mm-aaaa" ,'class'=>'form-control','required'=>true ]);!!}<br>
							
							<br>{!! Form::label('fechaEgreso','Fecha de egreso');!!}<br>
							{!! Form::text('fechaEgreso',null,['id'=> 'fechaEgreso','pattern'=> "(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" , 'placeholder'=>"dd-mm-aaaa" ,'class'=>'form-control' ]);!!}<br>	
	
												
				 		
				 			<br>{!! Form::label('idResponsable','Asignar responsable *');!!}<br>
				 			{!! Form::select('idResponsable',$responsables,null,['placeholder'=> 'Seleccione..','class'=>'form-control chosen-select','required'=>true]);!!} <br>	
							
				 		
				</div>
			
			 		<div class="footer-panel">
					
				 		{!! Form::submit('Enviar',['class'=>' btn  btn-primary'])!!}
					</div>
			</div>
			    {!! Form::close() !!}
			    
						<br><br><br><br><br>
			 	</section>
 <script>$(".chosen-select").chosen({no_results_text: "Oops, no hay resultados!"});</script>
@endsection