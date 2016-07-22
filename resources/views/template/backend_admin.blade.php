@extends('template.backend_layout')


@section('main')  


              <div class="panel">
                  <div class="header-panel"><i class="fa fa-graduation-cap fa-2x" ></i>Administracion Alumnos</div>
                  <div class="body-panel"> 
              
                    <a href="{{url('alumnos_matriculas_pagas')}}">Alumnos con matricula paga</a>
                     <br>
                     <a href= "{{url('alumnos')}}">Todos los alumnos</a><br>
                     


                  </div>
                  <div class="footer-panel">
                    <a href="{{url('alumno/crear')}}">Agregar   </a>
                  </div>
                </div>
                <br>

              <div class="panel">
                  <div class="header-panel"><i class="fa fa-user fa-2x"></i>
                    Administracion Usuarios</div>
                  <div class="body-panel">     
                     <a href= "{{url('usuarios')}}">Todos los usuarios </a><br>
                   </div>
                  <div class="footer-panel">
                    <a href="{{url('usuario/crear')}}">Agregar</a>
                  </div>
            </div>

                <br>
         
           <div class="panel ">

                <div class="header-panel">
                 <span class="glyphicon-pushpin glyphicon glyphicon-usd fa-2x"></span>
                Administracion Cuotas</div>
                <div class="body-panel"> 
                    
                   

               <a href="{{url('cuotas')}}"> Todas las cuotas </a> <br>

             <a href="{{url('cuotas_pagadas_o_becadas')}}"> Cuotas pagas </a> 
              
              <br>
             <a href="{{url('cuotas_impagas_vencidas')}}"> Cuotas vencidas</a>
               <br>
               <a href="{{url('alumnos_y_cuotas')}}"> Registrar Pagos</a>

            </div>
            <div class="footer-panel">
                  <a href="{{url('/cuota/crear')}}">Agregar</a>

            
          </div>

          </div>
          <br>

         
          
          <div class="panel">
            <div class="header-panel">
                 <i class="fa fa-users fa-2x" aria-hidden="true"></i>
            Administracion Responsables</div>
            <div class="body-panel"> 
                <a href= "{{url('responsables')}}">Todos los responsables</a><br>
            </div>
            <div class="footer-panel">
              <a href= "{{url('responsable/crear')}}">Agregar</a>
              
            </div>
          </div><br>
          
          <div>   
            <a class="btn btn-primary btn-block" href={{url('configuracion')}} > 
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            Configuracion</a> 
          </div>
          
       

@endsection

