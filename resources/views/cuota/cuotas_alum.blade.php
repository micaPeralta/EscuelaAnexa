
{  @section "template.backend_admin.html.twig"  }


{  block main }
		<ol class="breadcrumb">
                <li><a href="controller_usuario.php?action=backend_view">Backend</a></li>
                <li class="active">Cuotas de un alumno</li>
        </ol> 
	 
	 <div id="contenedor" class="fondo_blanco ">
					<form method="post" action="controller_cuota.php?action=cuotas_alum_cal_view" class="formulario">
			
			<legend> Cuotas de un alumno</legend>
				<label for="dni"> N&uacutemero documento</label>
				<input id="dni" name="dni" class="form-control" type="number" value="" required> <br>

				<label for="anio">A&nacute;o</label>
				<input id="anio" name="anio" type="number" class="form-control" required> <br>
				<input type="hidden" name="csrf_token" value="{{token}}">
				<input type="submit" class="btn btn-primary pull-right" value="Aceptar">

			
			</form>
     
		
	 <br><br><br>
		 {  if msg == 'faltan argumentos'  }
			<div  class="alert alert-danger" > por favor,complete todos los campos</div>
	 {  endif  }


{  @endsection  }



