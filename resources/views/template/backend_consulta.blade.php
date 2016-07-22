@extends('template.backend_layout')


@section('main')   



       <div class="panel">
                  <div class="header-panel"><i class="fa fa-graduation-cap" ></i>Administracion Alumnos</div>
                  <div class="body-panel"> 
                     
                     <a href={{url('alumnos_matriculas_pagas')}}>Alumnos con matricula paga</a>
                     </a><br>
                     </div>
        </div><br>

         <div class="panel ">

                <div class="header-panel">
                <span class="glyphicon-pushpin glyphicon glyphicon-usd"></span>
                Administracion Cuotas</div>
                <div class="body-panel"> 

                 <a href={{url('cuotas_pagadas_o_becadas')}}>Cuotas pagadas</a> 
                 <br>
               
              <a href={{url('cuotas_impagas_vencidas')}}>Cuotas vencidas </a> 
                 <br>
               
             
            </div>
  
            
          </div>
           
  

@endsection

