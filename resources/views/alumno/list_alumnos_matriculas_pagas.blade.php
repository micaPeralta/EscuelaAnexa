@extends('template.backend_admin')

@section('main')  


              <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Listado alumnos con matricula paga</li>
              </ol>
   
        <div class="panel">
        <div class="header-panel">Alumnos con matricula paga</div>     
        <div class="unseen body-panel" id="alumnos_matriculas">  
         @if($alumnos->isEmpty())
            <div class="alert alert-warning"> No existen alumnos con al menos una matricula paga</div>
         @else
                <TABLE class="table table-striped" summary="Tabla listado de alumnos con matricula paga" >
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>                    
                    <th>Fecha Nac</th>
                    <th>Matriculas</th>
                    
                   </tr>

                </thead>
                <tbody>
                 
                   @foreach( $alumnos as $alumno ) 
                     <tr>
                        <td class=""> {{ $alumno->nombre}} </td>
                        <td class=""> {{ $alumno->apellido}}</td>
                        <td class=""> {{ $alumno->nroDocumento}} </td>
                        <td class=""> {{ DateConvert::formatDate($alumno->fechaNacimiento) }} </td>
                        <td class=""> <a href="alumno/{{ $alumno->id}}/matriculas" onclick="javascript:guardarIdAlumno({{$alumno->id}});">Info Matriculas</a></td>

                      </tr>
                   
                  @endforeach


                </tbody>
                   
                     
          </TABLE>
              {!! $alumnos->links() !!}
           </div>
          @endif
        </div>    
      
          
      

@endsection