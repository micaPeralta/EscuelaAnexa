@extends('template.template')

 @section ('links')
	@parent
 	{!! Html::style('assets/css/errors.css') !!}
 @show

@section('header')
@endSection
@section('contenedor')<br>
	<div class="alert alert-danger">
		
		<strong>Acceso denegado! </strong>  No tiene permiso para entrar a esta secci&oacute;n
		<br>

		<a href="{{url('home')}}">Volver al backend </a>
	</div>

	<img src={{url("/assets/img/401.png")}} alt="error de acceso" id='imagenError'>
	<br>

</div>
	
@endSection
@section('footer')
@endsection


	
