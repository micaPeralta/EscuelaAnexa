@extends('template.backend_admin')

 @section('main') 
	 <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li><a href="{{url('responsables')}}">Listado Responsables</a></li>
                <li class="active">Editar Responsable</li>
      </ol>

 	<div class="formulario">

			 	@include('alerts.errors')
 					@include('alerts.success')
 					@include('alerts.operacion_response')
 					
		  {!! Form::model($responsable,["action"=>['ResponsableController@actualizar',$responsable->id],'method'=>'PUT'])!!}
		  		{!! csrf_field() !!}
			   
			 <div class="panel">
			 	<div class="header-panel">Datos Responsable</div>
				<div class="body-panel">
	   				<div class="grupo_form">
			 		{!! Form::label('nombre','Nombre');!!}<br>
				 	{!! Form::text('nombre',null,['id'=> 'nombre','placeholder'=>'Nombre','required','class'=>'form-control']);!!} <br>	
				 	</div>

					<div class="grupo_form">
		   			{!! Form::label('apellido','Apellido');!!}<br>
						{!! Form::text('apellido',null,['id'=> 'apellido','placeholder'=>'Apellido','required','class'=>'form-control']);!!} <br>
					</div>
	   			
	   			<div class="grupo_form">
		   			{!! Form::label('tipo','Parentesco *');!!}<br>
					 	{!! Form::select('tipo',['Padre'=>'Padre','Madre'=>'Madre','Tutor'=>'Tutor'],null,['placeholder'=> 'Seleccione..','required','class'=>'form-control']);!!} <br>
		   		</div>	

		   		<div class="grupo_form">
			  		 {!! Form::label('sexo','Sexo *');!!}<br>
					 	{!! Form::select('sexo',['Femenino'=>'Femenino','Masculino'=>'Masculino'],null,['placeholder'=> 'Seleccione..','required','class'=>'form-control']);!!} <br>
		   		</div>
		   		
		   		
	   			<div class="grupo_form">
	   				{!! Form::label('direccion','Direccion');!!}*<br>
				 	{!! Form::text('direccion',null,['id'=> 'direccion','placeholder'=>'Direccion','class'=>'form-control']);!!} <br>	
	   			</div>


	   			<div class="grupo_form">
	   				{!! Form::label('fechaNacimiento','Fecha Nacimiento *');!!}<br>
			 		{!! Form::text('fechaNacimiento',$responsable->fechaNacimiento->format('d-m-Y'),['id'=> 'fechaNacimiento','pattern'=> "(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" , 'placeholder'=>"dd/mm/aaaa" ,'required','class'=>'form-control' ]);!!}
	   			</div>
		   		

	   			<div class="grupo_form">
	   				{!! Form::label('mail','Mail *');!!}<br>
				 	{!! Form::email('mail',null,['placeholder'=>'example@maili','id'=>'mail','required','class'=>'form-control']);!!}<br>
	   			</div>


	   			<div class="grupo_form">
	   				{!! Form::label('telefono','Tel&eacute;fono*');!!}<br>
				 			{!! Form::number('telefono',null,['placeholder'=>'Telefono','id'=>'telefono','required','min'=>0,'class'=>'form-control']);!!}
	   			</div>

	   			</div>
	   			
	   			<div class="footer-panel">
	   				<a href={{url('home')}} class="btn btn-danger"> Cancelar</a>
					<input class="btn btn-primary" type="submit" value="Editar" >

				</div> 

				{!!Form::close();!!}
			

</div>

@endsection