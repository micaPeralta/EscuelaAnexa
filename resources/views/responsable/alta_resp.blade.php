@extends('template.backend_admin')

 @section('main')


	   		 <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Agregar responsable</li>
              </ol>

               <h2> Nuevo Responsable </h2> 
			<div class="formulario">
		@include('alerts.errors')
		@include('alerts.success')
	

				{!! Form::open(['action'=> ['ResponsableController@agregar'],'method'=>'POST'])!!}
					{!! csrf_field() !!}
			   
			 <div class="panel">
			 <div class="header-panel">Datos Responsable</div>
			 	<div class="grupo_form">
	   				{!! Form::label('nombre','Nombre');!!}*<br>
				 	{!! Form::text('nombre',null,['id'=> 'nombre','placeholder'=>'Nombre' ,'class'=>'form-control','required']);!!} 
				</div>
	   			<div class="grupo_form">
	   				{!! Form::label('apellido','Apellido');!!}*<br>
					{!! Form::text('apellido',null,['id'=> 'apellido','placeholder'=>'Apellido','class'=>'form-control','required']);!!}
	   			</div>
	   			
	   			<div class="grupo_form">
	   				{!! Form::label('tipo','Parentesco *');!!}<br>
				 	{!! Form::select('tipo',['Padre'=> 'Padre','Madre'=>'Madre','Tutor'=> 'Tutor'],null,['class'=>'form-control','required']);!!}
		   		
		   		</div>	
		   		<div class="grupo_form">
		   			{!! Form::label('sexo','Sexo *');!!}<br>
				 	{!! Form::select('sexo',['Femenino'=> 'Femenino','Masculino'=>'Masculino'],null,['placeholder'=> 'Seleccione..','class'=>'form-control','required']);!!}
		   			
		   		</div>	
		   		
		   		
	   			<div class="grupo_form">
	   					{!! Form::label('direccion','Direccion');!!}*<br>
				 		{!! Form::text('direccion',null,['id'=> 'direccion','placeholder'=>'Direccion','class'=>'form-control','required']);!!}
	   			</div>


	   			<div class="grupo_form">
	   				{!! Form::label('fechaNacimiento','Fecha Nacimiento *');!!}<br>
			 		{!! Form::text('fechaNacimiento',null,['id'=> 'fechaNacimiento','pattern'=> "(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" , 'placeholder'=>"dd-mm-aaaa"  ,'class'=>'form-control' ,'required']);!!}
	   			</div>
		   		

	   			<div class="grupo_form">
	   				{!! Form::label('mail','Mail *');!!}<br>
				 	{!! Form::email('mail',null,['placeholder'=>'example@mail','id'=>'mail' ,'class'=>'form-control' ,'required']);!!}
	   			</div>


	   			<div class="grupo_form">
	   				{!! Form::label('telefono','Tel&eacute;fono*');!!}<br>
				 	{!! Form::number('telefono',null,['placeholder'=>'Telefono','id'=>'telefono','min'=>0,'class'=>'form-control' ,'required']);!!}
	   			</div>

	   			</div>
	   			
	   			<div class="footer-panel">
					<input class="btn btn-primary" type="submit" value="Editar" >

				</div> <br>
				</form>
			</div>

@endsection