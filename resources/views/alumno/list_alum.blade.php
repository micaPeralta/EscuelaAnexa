@extends('template.backend_admin')

@section('main')  
      
              <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Listado alumnos</li>
              </ol>

             @include('alerts.operacion_response')
            @if( $alumnos->isEmpty() )
                 <div class="alert alert-warning"> No existen alumnos registrados </div>
            @else

            <div class="unseen" id="alumnos">
                <TABLE class="table table-striped" summary="Tabla listado de alumnos" >
                <thead>
                  <tr>
                    <th>Apellido</th>
                    <th>Nombre</th>                    
                    <th>DNI</th>                    
                    <th>Fecha Ingreso</th>
                    <th>Opciones</th>
                    
                   </tr>

                </thead>
                <tbody>

                 <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                  @foreach( $alumnos as $alumno ) 
                    
                    <tr id="eliminar_{{$alumno->id}}">
                        <td class=""> {{ $alumno->apellido }}</td>
                        <td class=""> {{ $alumno->nombre }} </td>                      
                        <td class=""> {{ $alumno->nroDocumento }} </td>
                        <td class=""> {{ $alumno->fechaIngreso->format('d/m/Y') }} </td>
                        <td class="opciones"> 


                             <a href="alumno/{{$alumno->id}}" ><img src='assets/img/vermas.png' alt="ver mas info"> </a>
                            <a href="alumno/{{$alumno->id}}/editar" ><img src="assets/img/editar.png" alt="editar alumno"> </a>
                             <a href="javascript:confirmarBorradoAlum({{$alumno->id}});" ><img src="assets/img/borrar.png" alt="borrar alumno"> </a>
                             <a href="alumno/{{$alumno->id}}/responsables" ><img src="assets/img/resp.png" alt="responsables alumno"> </a>
                             
                        </td>
                      </tr>             
                   @endforeach

                </tbody>
                    
          </TABLE>
          {!! $alumnos->links() !!}  
        @endif  
          </div>
                


@endsection