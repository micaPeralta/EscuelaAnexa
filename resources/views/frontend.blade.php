@extends('template.template')

@section('main')
   <article id="contenido" class="texto">
        <h3>{{$titulo}}</h3>
        {!!$descripcion!!}
                    
   </article>
@endsection
@section('mail')<strong>Correo Electr&oacute;nico: {{$mail_contacto}}</strong> <br> @endsection