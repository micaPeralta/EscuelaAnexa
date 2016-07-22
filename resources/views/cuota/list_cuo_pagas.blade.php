@extends('template.backend_admin')

@section('main')  
  
  <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li class="active">Listado de cuotas pagas</li>
  </ol>
               @include('alerts.operacion_response')
              
         <div class="unseen" id="cuotas_pagadas">
            @if( $cuotas->isEmpty() )
                <div class="alert alert-danger"> No existen cuotas pagadas o becadas hasta el momento </div>
            @else  
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
              @foreach( $cuotas as $cuota )

                     <tr>

                        <td class="td">{{ $cuota->numero}}</td>
                        <td class="td">{{ $cuota->mes}} / {{ $cuota->anio}}</td>
                        <td class="td">{{ $cuota->monto}} </td>
                        <td class="td">{{ $cuota->tipo}} </td>
                        <td class="td"> {{ DateConvert::formatDate($cuota->created_at)}} </td>
                        <td class="td">{{ $cuota->beca}} </td>
                        <td class="td">{{ $cuota->nombre}} {{ $cuota->apellido}} {{ $cuota->nroDocumento}} </td>
                      </tr>
            
                      
                 @endforeach
             

                </tbody>
                  
                     
          </TABLE>
          {!! $cuotas->links() !!}
         </div>
        @endif 
         
        </div>
   
                        
       


@endsection