@extends('template.backend_admin')

@section('main')  
		  <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Configuracion del Sistema</li>
          </ol>
			@include('alerts.errors')
					@include('alerts.success')
        <script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
         <script>
  tinymce.init({
    selector: '#descripcion'
  });
  </script>
		<div class="panel">
		<div class="header-panel">Configuracion </div>

				<div class="body-panel"> 
		  {!! Form::open(["action"=>['FrontController@actualizarConf'],'method'=>'PUT'])!!}
				{!! csrf_field() !!}

				<div class="grupo_form">

				 	{!! Form::label('frontend','Habilitar Frontend *');!!}<br>
				 	{!! Form::select('frontend',['si'=>'Si','no'=>'No'],$frontend,['placeholder'=> 'Seleccione..','class'=>'form-control','required']);!!}

				</div>
				
				<div class="grupo_form">
					{!! Form::label('paginacion','Paginacion *');!!}<br>
			 		{!! Form::number('paginacion',$paginacion,['id'=>'paginacion','class'=>'form-control', 'min'=>1],'required');!!}
				</div>

				<legend> Frontend </legend>

				<div class="grupo_form">
				{!! Form::label('titulo','Titulo');!!}*<br>
				{!! Form::text('titulo',$titulo,['id'=> 'titulo','class'=>'form-control','required']);!!} 
				</div>
				

				<div class="grupo_form">
				{!! Form::label('descripcion','Descripcion');!!}*<br>
				{!! Form::textarea('descripcion',$descripcion,array('id'=>'descripcion','class'=>'form-control','rows'=>"10", 'cols'=>"100",'required')) !!}
				
				</div>

				<div class="grupo_form">
				{!! Form::label('mail_contacto','Mail *');!!}<br>
				 {!! Form::email('mail_contacto',$mail_contacto,['placeholder'=>'example@maili','id'=>'mail_contacto' ,'class'=>'form-control','required']);!!}
				</div>

				<div class="grupo_form">
				{!! Form::label('mensaje_inhab','Mensaje de deshabilitacion');!!}*<br>
				{!! Form::textarea('mensaje_inhab',$mensaje_inhab,array('id'=>'mensaje_inhab','class'=>'form-control','rows'=>"10", 'cols'=>"100",'required'))!!}
				
				</div>


				</div>
				
		<div class="footer-panel"> 
			<input type="submit" class="btn btn-primary" value="Guardar Cambios">
		
		</div>		
		
	 {!! Form::close() !!}
				
		</div>



@endsection

@section('mail')  <strong>Correo electronico: </strong>{{ $mail_contacto}}@endsection