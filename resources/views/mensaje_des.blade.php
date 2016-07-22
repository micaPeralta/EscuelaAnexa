@extends('template.template')

@section('header')  
@endsection 

@section('contenedor') 
    <br>

    <h1> Frontend inhabilitado</h1>
    <div class="alert alert-warning">
    {{$mensaje}}
    </div>
    <div  class="formWrapper ">
                <fieldset> 
                <legend> Iniciar sesi&oacute;n</legend>
                        @include('alerts.errors')

                        <form id="signIn" action="{{ url('/login') }}" name="signIn" method="post">
                            {{ csrf_field() }}

                           <input class="form-control" name="username" type="text" placeholder="Usuario" required >
                           <br>
                         
                            <input class="form-control" name="password" type="password" placeholder="Contraseña" required >
                            <br>

                            <input class="btn btn-block"  name="signInBtn" type="submit" value="Entrar" >

                        </form>

                       
                          
                       
            </fieldset>
      </div>

@endsection

@section('footer')

@endsection