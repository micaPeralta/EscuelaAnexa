@extends('template.backend_admin')

@section('main')
      
      <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li><a href="{{url('cuotas')}}">Listado cuotas</a></li>
                <li class="active">Editar cuota</li>
              </ol>

      <section  class="formulario">
      	
      	     <h2> Editar Cuota </h2> 
					@include('alerts.errors')
 					@include('alerts.success')
 					@include('alerts.operacion_response')
       {!! Form::model($cuota,["action"=>['CuotaController@actualizar',$cuota->id],'method'=>'PUT'])!!}
				  
		    {!! csrf_field() !!}
	  
         <div class="panel">
			 <div class="header-panel">Datos Cuota</div>
	   			<div class="grupo_form">
	   				{!! Form::label('anio','Año');!!}<br>
	   				{!! Form::number('anio',null,['placeholder'=>'año','id'=>'anio','min'=>1950,'max'=>2050,'class'=>'form-control','required']);!!}<br>
	   			</div>
                
	   			<div class="grupo_form">
	   				{!! Form::label('mes','Mes');!!}<br>
	   				{!! Form::number('mes',null,['placeholder'=>'mes','id'=>'mes','min'=>1,'max'=>12,'class'=>'form-control','required']);!!}<br>
	   			</div>

	   			<div class="grupo_form">
	   				{!! Form::label('numero','Numero');!!}<br>
	   				{!! Form::number('numero',null,['placeholder'=>'numero','id'=>'numero','min'=>0,'class'=>'form-control','required']);!!}<br>
	   				
	   			</div>
	   			
	   			<div class="grupo_form">
	   			
	   				{!! Form::label('monto','Monto');!!}<br>
	   				{!! Form::number('monto',null,['placeholder'=>'monto','id'=>'monto','min'=>0,'class'=>'form-control','required']);!!}<br>
	   				
	   			</div>
	   			<div class="grupo_form">
	   				{!! Form::label('tipo','Tipo de cuota');!!}<br>
	   				{!! Form::select('tipo',[$cuota->tipo=>$cuota->tipo,'Mensual'=>'Mensual','Matricula'=>'Matricula'],null,['placeholder'=> 'Seleccione..','class'=>'form-control','required']);!!} <br>	
		   		    
		   		   
	   		    </div>

               <div class="grupo_form">
               	    {!! Form::label('comisinCobrador','comision cobrador');!!}<br>
	   			    {!! Form::number('comisionCobrador',null,['placeholder'=>'comision cobrador','id'=>'comisionCobrador','min'=>0,'max'=>100,'class'=>'form-control','required']);!!}<br>
	   				
	   			</div>
	   			
	   			<div class="footer-panel">
					
				    
                    <a href={{url('home')}} class="btn btn-danger">Cancelar</a>
				 	{!! Form::submit('Aceptar',['class'=>' btn  btn-primary'])!!}
				</div> 

	  </div>
	 {!! Form::close() !!}
	 </section>

@endsection