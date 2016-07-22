@extends('template.backend_admin')

@section('block main')

  <ol class="breadcrumb">
                <li><a href="controller_usuario.php?action=backend_view">Backend</a></li>
                <li class="active">Listado de cuotas vencidas</li>
              </ol>
             
          <div class="panel">
              <div class="header-panel"> Cuotas Vencidas</div>
              <div class="body-panel">
         {  if cuotas is empty  }      
               <div class="alert alert-danger">No hay cuotas vencidas</div>  
         {  else }
              
                <TABLE class="table table-striped" summary="Tabla listado de cuotas" >
                <thead>
                  
                  <tr>
                    <th>Num</th> 
                    <th>Mes/año</th>               
                    <th>Monto</th>
                    <th>Tipo</th>
                    <th>Datos alumno</th>
                   </tr>

                </thead>
                <tbody>
                  {  for cuota in cuotas  }
                     <tr>
                        <td class="td">{{ cuota.numero}}</td>
                        <td class="td">{{ cuota.mes}}/{{ cuota.anio}}</td>
                        <td class="td">{{ cuota.monto}} </td>
                        <td class="td">{{ cuota.tipo}} </td>
                        <td class="td">{{ cuota.nombre}} {{ cuota.apellido}} {{ cuota.numeroDocumento}} </td>
                      </tr>
                      
                  {  endfor  }

                </tbody>         
          </TABLE>
        </div>
        </div>
       <ul class="pager">
            
                 {  if modo == "2"  } 
                        <li><a href="controller_cuota.php?action=all_cuotas_vencidas_view_para_el_responsable&amp;pag={{pag-1}}">Anterior</a></li>
                        <li><a href="controller_cuota.php?action=all_cuotas_vencidas_view_para_el_responsable&amp;pag={{pag+1}}">Siguiente</a></li>
                 {  elseif modo == "3"  }
                        <li class="disabled"><a href="">Anterior</a></li>
                        <li><a href="controller_cuota.php?action=all_cuotas_vencidas_view_para_el_responsable&amp;pag={{pag+1}}">Siguiente</a></li>
                 {  elseif modo == "4"  }      
                         <li><a href="controller_cuota.php?action=all_cuotas_vencidas_view_para_el_responsable&amp;pag={{pag-1}}">Anterior</a></li>
                        <li class="disabled"><a href="">Siguiente</a></li>
                 {  else  }
                        <li class="disabled"><a  >Anterior</a></li>
                        <li class="disabled"><a  >Siguiente</a></li>
                 {  endif  }      
             
            </ul>
     {  endif  }


@endsection