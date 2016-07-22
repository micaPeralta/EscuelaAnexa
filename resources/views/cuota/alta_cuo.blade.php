@extends('template.backend_admin')

 @section('main')

   
   <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Agregar cuota </li>
   </ol>

   <section  class="formulario">
	  <h2> Nueva Cuota </h2>
	  @include('alerts.errors')
 	  @include('alerts.success')
	  
	  {!! Form::open(['action'=> ['CuotaController@agregar'],'method'=>'POST'])!!}
	  
         <div class="panel">
			 <div class="header-panel">Datos Cuota</div>
			 <div class="body-panel">
	   			<div class="grupo_form">
	   				{!! Form::label('anio','Año');!!}*<br>
	   				{!! Form::number('anio',null,['placeholder'=>'año','id'=>'anio','min'=>1950,'max'=>2050,'class'=>'form-control', 'required'=>true]);!!}<br>
	   				
	   			</div>
                
	   			<div class="grupo_form">
	   				{!! Form::label('mes','Mes');!!}*<br>
	   				{!! Form::number('mes',null,['placeholder'=>'mes','id'=>'mes','min'=>1,'max'=>12,'class'=>'form-control',
	   				'required'=>true]);!!}<br>
	   				
	   			</div>

	   			<div class="grupo_form">
	   				{!! Form::label('numero','Numero');!!}*<br>
	   				{!! Form::number('numero',null,['placeholder'=>'numero','id'=>'numero','min'=>1,'class'=>'form-control',
	   				'required'=>true]);!!}<br>
	   				
	   			</div>
	   			
	   			<div class="grupo_form">
	   				
	   				{!! Form::label('monto','Monto');!!}*<br>
	   				{!! Form::number('monto',null,['placeholder'=>'monto','id'=>'monto','min'=>0,'class'=>'form-control',
	   				'required'=>true]);!!}<br>
	   				
	   			</div>
	   			<div class="grupo_form">
	   				{!! Form::label('tipo','Tipo');!!}*<br>
		   		    {!! Form::select('tipo',['Mensual'=>'Mensual','Matricula'=>'Matricula'],null,['placeholder'=> 'Seleccione..','class'=>'form-control','required'=>true]);!!} <br>	
		   	
	   		    </div>

               <div class="grupo_form">
	   				{!! Form::label('comisionCobrador','Comision cobrador');!!}*<br>
	   				{!! Form::number('comisionCobrador',null,['placeholder'=>'comision','id'=>'comisionCobrador','min'=>0,'max'=>100,'class'=>'form-control','required'=>true]);!!}<br>
	   				
	   		   </div>
	   			</div>
	   			{{ Form::token() }}
	   	        
	   			<div class="footer-panel">
					<a href="{{url('home')}}" class="btn btn-danger">Cancelar</a>
				 	{!! Form::submit('Enviar',['class'=>' btn  btn-primary'])!!}   

				</div> 


	  </div>
	  {!! Form::close() !!}
	  </section>

@endsection 