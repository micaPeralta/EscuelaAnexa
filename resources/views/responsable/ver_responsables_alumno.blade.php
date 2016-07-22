@extends('template.backend_admin')

@section('main')

	<ol class="breadcrumb">
                <li><a href="{{url('home')}}" >Backend</a></li>
                <li><a href="{{url('alumnos')}}">Listado alumnos</a></li>
                <li class="active">Responsables de un alumno</li>
    </ol>

@include('alerts.errors')
@include('alerts.success')
<div class="panel panel-default" style="text-align:left">
  <div class="panel-body">
    <i class="fa fa-info-circle" aria-hidden="true"></i>
    <strong>Alumno:</strong> {{$alumno->nombre}} {{$alumno->apellido}}
  </div>
</div>

   <div class="panel">
		<div class="header-panel"> Asignar responsable</div>
		<div class="body-panel">
			 {!! Form::open(['action'=> ['ResponsableController@asignarResponsables'],'method'=>'POST'])!!}
			 <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			 <select name="idResponsable" class="form-control chosen-select" id="idResponsable">
				@forelse ( $responsables_todos as $resp )
				<option value="{{$resp->id}}"> {{$resp->nombre}} {{$resp->apellido}}| {{$resp->tipo}}</option>
				@empty 
				<br>
				<div class="alert alert-warning ">
					Este alumno no tiene responsables asignados
				</div>
				@endforelse
			 </select>	
				<input type="hidden" name="idAlumno" id="idAlumno" value="{{$alumno->id}}">
		</div>
		<div class="footer-panel"> <input class="btn btn-primary"  type="submit"  value="Asignar"></div>
			 {!! Form::close() !!}
	</div><br>
	
	<div class="panel">
		<div id="wait" style="display: none;"></div>

		@include('alerts.operacion_response')
		<div class="header-panel">Responsables </div>	


		<div id="carga">
		@forelse ( $alumno->responsables as $responsable )
		<div id="eliminar_{{$responsable->id}}">
				
			
				<div class="body-panel">

				
					<div>
					<strong>Nombre:</strong>
					{{$responsable->nombre}}
					</div>

					<div>
					<strong>Apellido:</strong>
					{{$responsable->apellido}}
					</div>

					<div>
					<strong>Direccion:</strong>
					{{$responsable->direccion}}
					</div>

					<div>
					<strong>Sexo:</strong>
					{{$responsable->sexo}}
					</div>

					<div>
					<strong>Fecha Nacimiento:</strong>
					{{$responsable->fechaNacimiento->format('d/m/Y')}}
					</div>

					<div>
					<strong>Telefono:</strong>
					{{$responsable->telefono}}
					</div>

					<div>
					<strong>Mail:</strong>
					{{$responsable->mail}}
					</div>

					<div>
					<strong>Parentesco:</strong>
							{{$responsable->tipo}}
					</div>

				</div>
		        
				
				<div class="footer-panel">
				 {!! Form::open(['action'=> ['ResponsableController@eliminarResponsableAlumno',
											 $alumno->id,$responsable->id], 'method'=>'DELETE','name'=>'formElimRA'])!!}
					<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">				
					<input type="submit"  class="btn btn-danger btn-sm" onclick="confirmarBorradoRespAlum()" value="Eliminar" />
		      	 {!!Form::close()!!}
				</div>
 		</div>
		
		@empty
		<br>
		<div class="alert alert-warning "> 
			Este alumno no tiene responsables asignados
		</div>
		@endforelse
		</div>
	</div>
<script>$(".chosen-select").chosen({no_results_text: "Oops, No hay resultados!"});</script>
@endsection