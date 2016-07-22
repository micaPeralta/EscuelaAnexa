@extends('template.backend_admin')

@section('main')
   
     
   <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li><a href="{{url('alumnos_y_cuotas')}}">Listado de alumnos</a></li>
                <li class="active">Pagar Cuotas</li>
    </ol>
      <div class="panel">
        @include('alerts.errors')
             @include('alerts.success')
             @include('alerts.operacion_response')
          <div class="header-panel">Cuotas por pagar</div>
          <div class="body-panel" >
            @if( $cuotas_impagas->isEmpty() )
                  <div class="alert alert-warning">No hay cuotas pagas</div>
            @else
             
           
            
            
            <form action="{{url('pagarCuotas')}}" method="post">
              <div class="" id="cuotas_pagas_view">   
               {!! csrf_field() !!}

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
                      @foreach(  $cuotas_impagas as $cuota  )
                         <tr>
                            <td class="td"> {{ $cuota->anio}} </td>
                            <td class="td"> {{ $cuota->mes}}</td>
                            <td class="td"> {{ $cuota->numero}} </td>
                            <td class="td"> {{ $cuota->tipo}} </td>
                            <td>
                                <label>Pagar<input id="{{ $i=$i+1 }}" type="checkbox" name="cuotasAPagar[]" value="pago_normal {{$cuota->id}}" onclick="javascript:toggle_o_nada({{$i}},{{$i+1}});"></label>
                                <!--{  set clave=clave+1  } -->
                                <label >Becar<input id="{{ $i=$i+1 }}" type="checkbox" name="cuotasAPagar[]" value="beca {{$cuota->id}}" onclick="javascript:toggle_o_nada({{$i}},{{$i-1}});"> </label>
                            </td>  
                            <!--{  set clave=clave+1  }-->
                          </tr>                   
                        @endforeach  
                   </tbody>
                </TABLE>          
          
                <input name="idAlumno" value="{{$idAlumno}}" hidden>
                 
         
              </div> 
           </div> 
             
              <div class="footer-panel">  
                {!! Form::button('Cancelar',['class'=>'btn  btn-sm btn-danger','href'=>"{{url('home')}}"]) !!}
                {!! Form::submit('Pagar cuotas',['class'=>' btn  btn-sm btn-primary'])!!}              
                
               </div> 

          </form>  
          {!! $cuotas_impagas->appends(array_except(Request::query(),'pag_cuo_imp' ))->links() !!} 
         
      </div>
     @endif    
     
   <br>
   <br>

        <div class="panel"> 
            <div class="header-panel">Cuotas pagadas</div>
            <div class="body-panel" id="cuotas_pagas_view">
            @if( $cuotas_pagas->isEmpty())                
                <div class="alert alert-warning">No hay  cuotas  pagadas</div>
            @else  
             
          
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
                  
                  @foreach( $cuotas_pagas as $cuota  )
                     <tr id="eliminar_{{$cuota->id}}">
                        <td class="td"> {{ $cuota->anio}} </td>
                        <td class="td"> {{ $cuota->mes}}</td>
                        <td class="td"> {{ $cuota->numero}} </td>
                        <td class="td"> {{ $cuota->tipo}} </td>
                        <td class="td"> {{DateConvert::formatDate($cuota->created_at)}} </td> 
                        <td class="td"> {{ $cuota->beca}} </td> 
                        <td class=" td opciones">                              
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                          <a href="javascript:confirmarBorradoPago({{$cuota->id}},{{$idAlumno}});" ><img src={{url("assets/img/borrar.png")}} alt="borrar pago" > </a>                         
                        </td>                                      
                    </tr>
                   @endforeach
                 </tbody>
            </TABLE>
            </div>   
          {{ $cuotas_pagas->appends(array_except(Request::query(),'pag_cuo_pag' ))->links() }} 
          @endif
        </div>  
       

   


 @endsection 