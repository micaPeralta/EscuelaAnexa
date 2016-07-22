
        <div class="table-responsive">
                <TABLE class="table table-striped" summary="Tabla listado de Alumnos" >
                <thead>
                  <tr>
                   <th>Apellido</th>  
                    <th>Nombre</th>                                   
                    <th>Dni</th>
                    <th>Cuotas</th>
                  </tr>

                </thead>
                <tbody>
                  @foreach( $alumnos as $alumno  )
                    
                     <tr>
                     <td class="td"> {{ $alumno->apellido}}</td>
                        <td class="td"> {{ $alumno->nombre}} </td>
                        
                        <td class="td"> {{ $alumno->nroDocumento}} </td>
                        <td><a href="alumno/{{$alumno->id}}/cuotas_impagas_y_pagas">Ver Cuotas</a></td>
                     </tr>     
                  @endforeach 

                </tbody>
                  
                     
          </TABLE>
        </div>
        {!! $alumnos->links() !!}   