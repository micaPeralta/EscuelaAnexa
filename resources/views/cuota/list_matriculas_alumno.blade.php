@extends('template.backend_admin')

@section('main') 
	 <ol class="breadcrumb">
          <li><a href="{{url('home')}}">Backend</a></li>
          <li><a href="{{url('alumnos_matriculas_pagas')}}">Alumnos con matriculas pagas</a></li>
          <li class="active">Info Matriculas</li>
     </ol>
              

	  <div class="panel">
	  	<div class="header-panel">Matriculas pagas del alumno</div>
	  	<div class="body-panel" id="matriculas_pagas_del_alumno">
	  		
	  		@forelse( $matriculas as $matricula  )
	  		
	  			<div class="derecho">
	  				<strong>Año:</strong>
					{{ $matricula->anio}}<br>	
	  			</div>
				
				<strong>N&uacute;mero:</strong>
	  			{{ $matricula->numero}}<br>
	  			
	  			
	  			<div class="derecho">
	  				<strong>Mes:</strong>
	  				{{ $matricula->mes}}<br>
	  			</div>

	  			<strong>Comision cobrador:</strong>
	  			{{ $matricula->comisionCobrador}}  <br>
	  			
	  			<div class="derecho">
	  				<strong>Monto:</strong>
	  				${{ $matricula->monto}}<br>
	  			</div>	  		
                <div class="derecho">
	  			<strong>Tipo:</strong>
	  			{{ $matricula->tipo}}
	  	        </div>
	  			<hr>

	  	 @empty
                    <div class="alert alert-danger"> el alumno no posee  matriculas pagas</div>
         @endforelse
             {!! $matriculas->links() !!};
	  	</div>
	  </div>
@endsection 