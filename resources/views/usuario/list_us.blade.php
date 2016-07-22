@extends('template.backend_admin') 

@section('main')

   
              <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Listado usuarios</li>
              </ol>
          <h2>Listado de usuarios</h2>
          @include('alerts.operacion_response')
                <TABLE class="table table-striped" summary="Tabla listdo de usuarios" >
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Rol</th>
                    <th>Habilitado</th>                    
                    <th>Opciones</th>
                    
                   </tr>

                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                  <tr id="eliminar_{{$usuario->id}}">

                 <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                        <td class="td td-usuarios "> {{$usuario->username}}</td>
                        <td class=" td td-usuarios">{{$usuario->rol->descripcion}}</td>
                        <td class="td td-usuarios ">{{$usuario->habilitado}}</td>
                      
                        <td class="td td-usuarios  opciones">
                           
                            <a href="usuario/{{$usuario->id}}/editar" ><img src="{{url('assets/img/editar.png')}}" alt="editar alumno"> </a>
                             
                             <a href="javascript:confirmarBorradoUsuario({{$usuario->id}});" ><img src="{{url('assets/img/borrar.png')}}" alt="borrar alumno"> </a>
                        </td>

                      </tr>
                      
                
                @endforeach
                

                </tbody>
                                       
              </TABLE>
              {!! $usuarios->links() !!}  
 @endsection