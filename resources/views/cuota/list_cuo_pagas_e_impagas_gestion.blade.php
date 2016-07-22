@extends('template.backend_admin')

@section('block main') 
   
     
   <ol class="breadcrumb">
                <li><a href="controller_usuario.php?action=backend_view">Backend</a></li>
                <li><a href="controller_alumnos.php?action=list_alumnos_pagos&amp;pag=1">Listado de alumnos</a></li>
                <li class="active">Pagar Cuotas</li>
    </ol>
            <div class="panel">
             <div class="header-panel">Cuotas por pagar</div>
             <div class="body-panel"> 
            {  if cuotas_impagas is empty  }
                  <div class="alert-warning">Todas las cuotas estan pagadas </div>
            {  else  }
             
           
               
              
               <form action="controller_cuota.php?action=pagar_cuotas&amp;idAlumno={{idAlumno}}&amp;pag1={{paginas['pag1']}}&amp;pag2={{paginas['pag2']}}" method="post">
                <TABLE class="table table-striped" summary="Tabla listado de cuotas no pagadas" >
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

                     

                     {  set clave=1  }
                   
                      {  for cuota in cuotas_impagas  }
                         <tr>
                            <td class="td"> {{ cuota.anio}} </td>
                            <td class="td"> {{ cuota.mes}}</td>
                            <td class="td"> {{ cuota.numero}} </td>
                            <td class="td"> {{ cuota.tipo}} </td>
                            <td>
                                <label for="{{cuota.idCuota}}">Pagar </label><input id="{{clave}}" type="checkbox" name="{{cuota.idCuota}}" value="pago normal" onclick="toggle_o_nada({{clave}},{{clave+1}})">
                                {  set clave=clave+1  }
                                <label for="{{cuota.idCuota}}">Becar </label><input id="{{clave}}" type="checkbox" name="{{cuota.idCuota}}" value="beca" onclick="toggle_o_nada({{clave}},{{clave-1}});">
                            </td>  
                            {  set clave=clave+1  }
                                                 
                        </tr>
                   
                        {  endfor  }
                        <input type="hidden" name="idPagador" value="{{idUsuario}}"> 
                        <input type="hidden" name="csrf_token" value="{{token}}">

                  </tbody>
              </TABLE>

            
              </div>  
              <div class="footer-panel">                
                <a class="btn btn-sm btn-default" href="controller_usuario.php?action=backend_view">Cancelar</a>
                <input   class="btn btn-sm btn-default" type="submit" value="Pagar cuotas" >
               </div>  
               </form>  
          </div>  
        

         <div>
        
         <ul class="pager">
            
                 {  if modos['modo1'] == "2"  } 
                        <li><a href="controller_cuota.php?action=ver_cuotas_pagas_e_impagas&amp;idAlumno={{idAlumno}}&amp;pag1={{paginas['pag1']-1}}&amp;pag2={{paginas['pag2']}}">Anterior</a></li>
                        <li><a href="controller_cuota.php?action=ver_cuotas_pagas_e_impagas&amp;idAlumno={{idAlumno}}&amp;pag1={{paginas['pag1']+1}}&amp;pag2={{paginas['pag2']}}">Siguiente</a></li>
                 {  elseif modos['modo1'] == "3"  }
                         <li class="disabled"><a  >Anterior</a></li>
                        <li><a href="controller_cuota.php?action=ver_cuotas_pagas_e_impagas&amp;idAlumno={{idAlumno}}&amp;pag1={{paginas['pag1']+1}}&amp;pag2={{paginas['pag2']}}">Siguiente</a></li>
                 {  elseif modos['modo1'] == "4"  }      
                         <li><a href="controller_cuota.php?action=ver_cuotas_pagas_e_impagas&amp;idAlumno={{idAlumno}}&amp;pag1={{paginas['pag1']-1}}&amp;pag2={{paginas['pag2']}}">Anterior</a></li>
                        <li class="disabled"><a  >Siguiente</a></li>
                 {  else  }
                         <li class="disabled"><a  >Anterior</a></li>
                         <li class="disabled"><a  >Siguiente</a></li>
                 {  endif  }      
        
      
             
        </ul>
      </div>      

   {  endif  }
   <br>

   <div class="panel"> 
            <div class="header-panel">Cuotas pagadas</div>
            <div class="body-panel">
         {  if cuotas_pagas is empty  }
                
                <div class="alert alert-success">No hay  cuotas  pagadas</div>
          {  else  }
             
          
            <TABLE class="table table-striped" summary="Tabla listado de cuotas pagadas" >
                <thead>
                  <tr>            

                    <th>Año</th>
                    <th>Mes</th>
                    <th>N&uacute;mero</th>                    
                    <th>Tipo</th>
                    <th>Fecha pago</th>
                    <th>Becado</th>
                    <th>Opcion</th>


                  </tr>
                </thead>
               <tbody>
                 
                  {  for cuota in cuotas_pagas  }
                     <tr>
                        <td class="td"> {{ cuota.anio}} </td>
                        <td class="td"> {{ cuota.mes}}</td>
                        <td class="td"> {{ cuota.numero}} </td>
                        <td class="td"> {{ cuota.tipo}} </td>
                        <td class="td"> {{ cuota.fecha|date('d/m/y')}} </td> 
                        <td class="td"> {{cuota.beca}} </td> 
                        <td class=" td opciones"> 
                            
                           
                            <a href="javascript:confirmarBorradoPago({{cuota.id}},{{paginas['pag1']}},{{paginas['pag2']}},{{idAlumno}});" ><img src="img/borrar.png" alt="borrar pago"> </a>
                             
                        </td>                                      
                    </tr>
                   {  endfor  }
                  
                   
                     
              </tbody>
          </TABLE>
        </div>   
        </div>  
       <div>
        
         <ul class="pager">
            
                 {  if modos['modo2'] == "2"  } 
                        <li><a href="controller_cuota.php?action=ver_cuotas_pagas_e_impagas&amp;idAlumno={{idAlumno}}&amp;pag2={{paginas['pag2']-1}}&amp;pag1={{paginas['pag1']}}">Anterior</a></li>
                        <li><a href="controller_cuota.php?action=ver_cuotas_pagas_e_impagas&amp;idAlumno={{idAlumno}}&amp;pag2={{paginas['pag2']+1}}&amp;pag1={{paginas['pag1']}}">Siguiente</a></li>
                 {  elseif modos['modo2'] == "3"  }
                         <li class="disabled"><a  >Anterior</a></li>
                        <li><a href="controller_cuota.php?action=ver_cuotas_pagas_e_impagas&amp;idAlumno={{idAlumno}}&amp;pag2={{paginas['pag2']+1}}&amp;pag1={{paginas['pag1']}}">Siguiente</a></li>
                 {  elseif modos['modo2'] == "4"  }      
                         <li><a href="controller_cuota.php?action=ver_cuotas_pagas_e_impagas&amp;idAlumno={{idAlumno}}&amp;pag2={{paginas['pag2']-1}}&amp;pag1={{paginas['pag1']}}">Anterior</a></li>
                        <li class="disabled"><a  >Siguiente</a></li>
                 {  else  }
                         <li class="disabled"><a  >Anterior</a></li>
                        <li class="disabled"><a  >Siguiente</a></li>
                 {  endif  }      
        
      
             
        </ul>
      </div>      

   {  endif  }



@endsection