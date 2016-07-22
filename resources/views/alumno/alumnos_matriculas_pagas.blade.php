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
                 
                   @forelse( $alumnos as $alumno  ) 
                     <tr>
                        <td class=""> {{ $alumno->nombre}} </td>
                        <td class=""> {{ $alumno->apellido}}</td>
                        <td class=""> {{ $alumno->nroDocumento}} </td>
                        <td class=""> {{ $alumno->fechaNacimiento }} </td>
                        <td class=""> <a href="/alumno/{{$alumno->id}}/matriculas" onclick="javascript:guardarIdAlumno({{$alumno->id}});">Info Matriculas</a></td>

                      </tr>
                      
                  @empty
                    <div class="alert alert-danger"> No existen alumnos con al menos una matricula paga</div>
                  @endforelse


                </tbody>
                  
                   
          </TABLE>
          {!! $alumnos->links() !!}   
          