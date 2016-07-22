<div class="table-responsive">
                <TABLE class="table table-striped" summary="Tabla listado de cuotas" >
                <thead>
                  
                  <tr>
                    <th>Num</th> 
                    <th>Mes/Año</th>               
                    <th>Monto</th>
                    <th>Tipo</th>
                    <th>Datos alumno</th>
                   </tr>

                </thead>
                <tbody>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                  @forelse( $cuotas as $cuota )
                     <tr>
                        <td class="td">{{ $cuota->numero}}</td>
                        <td class="td">{{ $cuota->mes}}/{{ $cuota->anio}}</td>
                        <td class="td">{{ $cuota->monto}} </td>
                        <td class="td">{{ $cuota->tipo}} </td>
                        <td class="td">{{ $cuota->nombre}} {{ $cuota->apellido}} {{ $cuota->nroDocumento}} </td>
                      </tr>
                      
                  @empty
                      <div class="alert alert-danger"> No existen cuotas impagas vencidas hasta el momento </div>
                 @endforelse

                </tbody>
                  
                     
          </TABLE>
           {{ $cuotas->links()}}
</div>
        