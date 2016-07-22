@extends('template.backend_admin')
@section('main')
	<ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li><a href="{{url('responsables')}}">Listado responsables</a></li>
                <li class="active">Ver responsable</li>
              </ol>
	
<div class="panel">
	<div class="header-panel">   Informaci&oacute;n del responsable</div>
	<table class="table table-striped" id="info">
				<tr>
					<td class="titulo-t">Apellido</td>
					<td>{{$responsable->apellido}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Nombre</td>
					<td>{{$responsable->nombre}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Sexo</td>
					<td>{{$responsable->sexo}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Direcci&oacute;n</td>
					<td>{{$responsable->direccion}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Fecha Nacimiento</td>
					<td>{{$responsable->fechaNacimiento->format('d/m/Y')}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Tel&eacute;fono</td>
					<td>{{$responsable->telefono}}</td>
				</tr>
				<tr>
					<td class="titulo-t">Mail</td>
					<td>{{$responsable->mail}}</td>
				</tr>
				<tr>
					<td class="titulo-t"> Parentesco</td>
					<td>{{$responsable->tipo}}</td>
				</tr>
			</table>	

</div>
		


				
 @endsection