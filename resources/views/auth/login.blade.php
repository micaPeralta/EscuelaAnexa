@extends('../template/template') 

@section('contenedor')   
                <div  class="formWrapper ">
                <fieldset> 
                <legend> Iniciar sesi&oacute;n</legend>

                @include('alerts.errors')
                     
                    <form class="form-horizontal" role="form" id="signIn" name="signIn"  method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                          
                          <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Usuario" >
                            
                             @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        
                                <input type="password" class="form-control" name="password" placeholder="Contraseña" >
                                

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        
                        </div>


                        <div class="form-group">
                           
                                <button type="submit" class="btn btn-block" name="signInBtn" >
                                    Login
                                </button>

                             
                        </div>
                    </form>

                 </fieldset>
                </div>
@endsection

@section('mail')<strong>Correo Electr&oacute;nico:</strong> {{$mail_contacto}} <br> @endsection