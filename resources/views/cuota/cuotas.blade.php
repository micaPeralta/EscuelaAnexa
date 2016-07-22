
                <TABLE class="table table-striped" summary="Tabla listado de cuotas" >
                <thead>
                  <tr>
                    <th>Año</th>
                    <th>Mes</th>
                    <th>N&uacute;mero</th>                    
                    <th>Tipo</th>
                    <th>Opciones</th>
                   </tr>

                </thead>
                <tbody>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                 @forelse( $cuotas as $cuota )
                     <tr id="eliminar_{{ $cuota->id}}">
                        <td class="td"> {{ $cuota->anio}} </td>
                        <td class="td"> {{ $cuota->mes}}</td>
                        <td class="td"> {{ $cuota->numero}} </td>
                       
                        <td class="td"> {{ $cuota->tipo}} </td>
                        <td class=" td opciones"> 
                            <a href="cuota/{{$cuota->id}}" ><img src={{url('assets/img/vermas.png')}} alt="ver mas info"> </a>
                            <a href="cuota/{{$cuota->id}}/editar" ><img src={{url('assets/img/editar.png')}} alt="editar alumno"> </a>
                           
                            <a href="javascript:confirmarBorradoCuota({{ $cuota->id}});" ><img src={{url('assets/img/borrar.png')}} alt="borrar cuota"> </a>
                             
                        </td>
              
                      </tr>
                      
                  @empty
                      <div class="alert alert-danger"> No se registran cuotas </div>
                 @endforelse

                </tbody>
                  
                     
          </TABLE>
        {!! $cuotas->links() !!}