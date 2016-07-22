@extends('template.backend_layout')


@section('main')  

	 <div class="panel ">

     
            <div class="header-panel">
            <span class="glyphicon-pushpin glyphicon glyphicon-usd"></span>
            Administracion Cuotas</div>
            <div class="body-panel"> 
                
               <a href="{{url('cuotas')}}"> Todas las cuotas </a> <br>            
               <a href="{{url('cuotas_pagadas_o_becadas')}}"> Cuotas pagas</a> <br>
               <a href="{{url('cuotas_impagas_vencidas')}}"> Cuotas vencidas</a><br>
               <a href="{{url('alumnos_y_cuotas')}}"> Registrar Pago</a><br>
              

            </div>
            <div class="footer-panel">
              <a href="{{url('/cuota/crear')}}">Agregar</a>
            
            </div>
          </div>
          <br>

       <div class="panel">
            <div class="header-panel">
            <span class="glyphicon glyphicon-list"></span>
            Listados</div>
            <div class="body-panel"> 
            
              <a href="{{url('alumnos_matriculas_pagas')}}">Alumnos con matricula paga </a><br>
             
           </div>
        </div>

          


 @endsection 

