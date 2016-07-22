@extends('template.backend_admin')
@section('main')
	<ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li><a href="{{url('alumnos')}}">Listado alumnos</a></li>
                <li class="active">Ver alumno</li>
              </ol>
    <div class="panel">
	<div class="header-panel">   Informaci&oacute;n del alumno</div>
	<table class="table table-striped" id="info">
				<tr>
					<td class="titulo-t">Apellido</td>
					<td>{{$alumno->apellido}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Nombre</td>
					<td>{{$alumno->nombre}}</td>
				</tr>
				<tr>
					<td class="titulo-t">N&uacute;mero documento</td>
					<td>{{$alumno->nroDocumento}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Sexo</td>
					<td>{{$alumno->sexo}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Direccion</td>
					<td>{{$alumno->direccion}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Fecha Nacimiento</td>
					<td>{{$alumno->fechaNacimiento->format('d-m-Y')}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Tel&eacute;fono</td>
					<td>{{$alumno->telefono}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Mail</td>
					<td>{{$alumno->mail}}</td>
				</tr>

				<tr >
				<td class="titulo-t">Ingreso</td>
				<td>{{$alumno->fechaIngreso->format('d-m-Y')}}</td>
				</tr>
				
				@if($alumno->fechaEgreso)
				<tr>				
				<td class="titulo-t">Egreso</td>				
				<td>	{{$alumno->fechaEgreso->format('d-m-Y')}}</td>				
				</tr>
				@endif

				<tr>
				<td class="titulo-t">Fecha de Alta</td>
				<td>	{{$alumno->fechaAlta->format('d-m-Y')}}</td>
				</tr>


			</table>	

</div>
	
 @endsection