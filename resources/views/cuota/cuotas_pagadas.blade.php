<div class="table-responsive">
               <TABLE class="table table-striped" summary="Tabla listado de cuotas" >
                <thead>
                  
                  <tr>

                    <th>Num</th> 
                    <th>Mes/año</th>               
                    <th>Monto</th>
                    <th>Tipo</th>
                     <th>Fecha pago</th>
                    <th>Becado</th>
                    <th>Datos Alumno</th>

                   </tr>

                </thead>
                <tbody>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                  @forelse( $cuotas as $cuota )
                     <tr>

                        <td class="td">{{ $cuota->numero}}</td>
                        <td class="td">{{ $cuota->mes}} / {{ $cuota->anio}}</td>
                        <td class="td">{{ $cuota->monto}} </td>
                        <td class="td">{{ $cuota->tipo}} </td>
                        <td class="td"> {{ $cuota->created_at }} </td>
                        <td class="td">{{ $cuota->beca}} </td>
                        <td class="td">{{ $cuota->nombre}} {{ $cuota->apellido}} {{ $cuota->nroDocumento}} </td>
                      </tr>
                      
                  @empty
                      <div class="alert alert-danger"> No existen cuotas pagadas o becadas hasta el momento </div>
                 @endforelse


                </tbody>
                  
                     
          </TABLE>
          {!! $cuotas->links() !!} 
        </div>