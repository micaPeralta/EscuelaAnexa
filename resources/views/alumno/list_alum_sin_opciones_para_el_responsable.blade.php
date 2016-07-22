@extends('template.backend_admin')

@section('block main')  


              <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Listado alumnos con matricula paga</li>
              </ol>
              
        <div class="panel">
            <div class="header-panel">Alumnos con matricula paga</div>
            <div class="body-panel">
         {  if alumnos is empty  }
               <div class="alert alert-danger">No hay alumnos con matriculas pagas</div>
          {  else  }
               <div class="unseen">
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
                 
                  {  for alumno in alumnos  } <tr>
                        <td class=""> {{ alumno.nombre}} </td>
                        <td class=""> {{ alumno.apellido}}</td>
                        <td class=""> {{ alumno.numeroDocumento}} </td>
                        <td class=""> {{ alumno.fechaNacimiento|date('d/m/Y')}} </td>
                        <td class=""> <a href="controller_cuota.php?action=info_mat_alu&idAlu={{alumno.id}}">Info Matriculas</a></td>
                        

                      </tr>
                      
                  {  endfor  }

                </tbody>
                  
                     
          </TABLE>
          </div>
           </div>
           </div>
            <ul class="pager">
            
                 {  if modo == "2"  } 
                        <li><a href="controller_alumnos.php?action=listar_alumnos_matricula_paga_view_para_el_responsable&amp;pag={{pag-1}}">Anterior</a></li>
                        <li><a href="controller_alumnos.php?action=listar_alumnos_matricula_paga_view_para_el_responsable&amp;pag={{pag+1}}">Siguiente</a></li>
                 {  elseif modo == "3"  }
                         <li class="disabled"><a  >Anterior</a></li>
                        <li><a href="controller_alumnos.php?action=listar_alumnos_matricula_paga_view_para_el_responsable&amp;pag={{pag+1}}">Siguiente</a></li>
                 {  elseif modo == "4"  }      
                         <li><a href="controller_alumnos.php?action=listar_alumnos_matricula_paga_view_para_el_responsable&amp;pag={{pag-1}}">Anterior</a></li>
                        <li class="disabled"><a  >Siguiente</a></li>
                 {  else  }
                          <li class="disabled"><a  >Anterior</a></li>
                        <li class="disabled"><a  >Siguiente</a></li>
                 {  endif  }      
             
            </ul>

          
      {  endif }

@endsection