<TABLE class="table table-striped" summary="Tabla listado de responsables" >
                <thead>
                  <tr>
                    <th>Apellido</th>
                    <th>Nombre</th>                    
                    <th>Direccion</th>                    
                    <th>Fecha Nac</th>
                    <th>Opciones</th>
                 </tr>

                </thead>
                <tbody>

                 <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		@forelse($responsables as $resp)
			 <tr id="eliminar_{{$resp->id}}">
                        <td class=""> {{ $resp->apellido }}</td>
                        <td class=""> {{ $resp->nombre }} </td>                      
                        <td class=""> {{  str_limit($resp->direccion, $limit = 15, $end = '...')}} </td>
                        <td class=""> {{ $resp->fechaNacimiento->format('d/m/Y') }} </td>
                        <td class="opciones"> 


                             <a href="responsable/{{$resp->id}}" ><img src='assets/img/vermas.png' alt="ver mas info"> </a>
                            <a href="responsable/{{$resp->id}}/editar" ><img src="assets/img/editar.png" alt="editar responsable"> </a>
                             <a href="javascript:confirmarBorradoResp({{$resp->id}});" ><img src="assets/img/borrar.png" alt="borrar responsable"> </a>
                                                         
                        </td>

                      </tr>
                     
                @empty
                      <div class="alert alert-danger"> No existen responsables registrados </div>
                 @endforelse

                </tbody>
                    
          </TABLE>
          {!! $responsables->links() !!}  