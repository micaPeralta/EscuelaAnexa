{  @section  ('template.backend_admin') }
 
{  block main  }
  <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Seleccionar alumnos</li>
  </ol>
   
   <div class="panel">
            <div class="header-panel">seleccionar alumnos</div>
            <div class="body-panel"> 
            {  if alumnos is empty  }
                  <div class="alert-warning">No hay alumnos registrados</div>
            {  else  }
                      
               <form action="controller_alumnos.php?action=mapa_view" method="post">
                <TABLE class="table table-striped" summary="Tabla lkistado de alumnos" >
                    <thead>
                      <tr>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Dni</th> 
                         <th>Direccion</th>
                        <th>Seleccionar</th>                   
                      </tr>
                    </thead>
                   <tbody>

                      {  for alumno in alumnos  }
                         <tr>
                            <td class="td"> {{ alumno.apellido}} </td>
                            <td class="td"> {{ alumno.nombre}}</td>
                            <td class="td"> {{ alumno.numeroDocumento}} </td>
                              <td class="td"> {{ alumno.direccion}} </td>
                            <td>
                                <input id="{{alumno.id}}" type="checkbox" name="alumnos[]" value="{{alumno.id}}">
                            </td>  
                  
                                                 
                        </tr>
                        {  endfor  }
                  </tbody>
              </TABLE>
            {  endif  }
            
           </div> 
           <input type="hidden" name="csrf_token" value="{{token}}"> 
           <div class="footer-panel">                
                <a class="btn btn-sm btn-default" href="controller_usuario.php?action=backend_view">Cancelar</a>
                <input   class="btn btn-sm btn-default" type="submit" value="Confirmar" >
               </div>  
               </form>  
          </div>  
     
 





{  @endsection  }