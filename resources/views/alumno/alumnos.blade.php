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
                  @forelse( $alumnos as $alumno ) <tr id="fila_alumno_{{$alumno->id}}">
                        <td class=""> {{ $alumno->apellido }}</td>
                        <td class=""> {{ $alumno->nombre }} </td>                      
                        <td class=""> {{ $alumno->nroDocumento }} </td>
                        <td class=""> {{ $alumno->fechaIngreso->format('d/m/Y') }} </td>
                        <td class="opciones"> 


                             <a href="alumno/{{$alumno->id}}" ><img src='assets/img/vermas.png' alt="ver mas info"> </a>
                            <a href="alumno/{{$alumno->id}}/editar" ><img src="assets/img/editar.png" alt="editar alumno"> </a>
                             <a href="javascript:confirmarBorradoAlum({{$alumno->id}});" ><img src="assets/img/borrar.png" alt="borrar alumno"> </a>
                             <a href="{{$alumno->id}}" ><img src="assets/img/resp.png" alt="responsables alumno"> </a>
                             
                        </td>

                      </tr>
                @empty
                      <div class="alert alert-danger"> No existen alumnos registrados </div>
                 @endforelse

                </tbody>
                  

             
                     
          </TABLE>
          {!! $alumnos->links() !!}  