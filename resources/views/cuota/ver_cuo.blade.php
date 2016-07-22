
@extends('template.backend_admin')
@section('main')
   <ol class="breadcrumb">
                <li><a href="{{url('home')}}">Backend</a></li>
                <li><a href="" onclick="javascript:window.history.back();">Listado de Cuotas</a></li>
                <li class="active">Informaci&oacute;n de cuota</li>
   </ol>
   <section>
       <div class="panel">
       <div class="header-panel">Datos Cuota</div>
       <table class="table table-striped" id="info">

          <tr>
             <td class="titulo-t">Año</td>
            <td>{{$cuota->anio}}</td>
          </tr>
           <tr>
             <td class="titulo-t">Mes</td>
            <td>{{$cuota->mes}}</td>
          </tr>

           <tr>
             <td class="titulo-t">N&uacute;mero</td>
            <td>{{$cuota->numero}}</td>
          </tr>

            <tr>
             <td class="titulo-t">Monto</td>
            <td>{{$cuota->monto}}</td>
          </tr>

            <tr>
             <td class="titulo-t">Tipo</td>
            <td>{{$cuota->tipo}}</td>
          </tr>
           
          <tr>
             <td class="titulo-t">Comision del cobrador</td>
            <td>{{$cuota->comisionCobrador}}</td>
          </tr>
          
      </table>
   	     
        </div>
   </section>

 @endsection