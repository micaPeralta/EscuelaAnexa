@extends('template.template')

@section('main') 
@endsection



@section('aside')  

          <span class="subTitMen">SESI&Oacute;N</span>
          <ul>
              <li><i class="fa fa-user"></i> <a href="{{ url('/logout') }}">{{Auth::user()->username}} (Salir)</a> </li> 
          </ul>

@endsection
@section('mail')<strong>Correo Electr&oacute;nico: </strong>{{$mail_contacto}} <br> @endsection