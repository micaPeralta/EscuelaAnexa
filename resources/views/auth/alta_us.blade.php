explates('template.backend_admin')

 @section('main')
	   		<ol class="breadcrumb">
                <li><a href="controller_usuario.php?action=backend_view">Backend</a></li>
                <li class="active">Agregar Usuario </li>
              </ol>
			 	<section  class="formulario">
			 	 <h2> Nuevo Usuario</h2> 
			 	 {  if msg=='empty'  }
			 	 <div class="alert alert-warning"> Complete los campos en blanco</div>
			 	 {  endif  }
			 	  {  if msg =='usuario existente'  }
			 	 <div class="alert alert-warning">username ya usado,reintente con otro username</div>
			 	 {  endif  }


			 	<form  action="controller_usuario.php?action=agregar_usuario" method="post" >

			 	<div class="grupo_form">

					<label for="username" >Username*</label> <br>
				 	<input id="username" type="text"  class="form-control" name="username"  placeholder="Username" value="" required> <br>
			 		
			 		<label for="password">Contraseña*</label><br>
				 	<input id="password" type="password" class="form-control" name="password"  placeholder="Contraseña" value="" required><br>
			 		
				 	<label for="rol">Rol</label>
				 	<select id="rol" name="rol" class="form-control" required>
				 		<option value="{{usuario.rol}}">{{usuario.nombreRol}}</option>
				 		<option value="1"> Admin</option>
				 		<option value="2"> Gestion</option>
				 		<option value="3"> Consulta</option>
					</select><br>

				 	<label for="habilitado">Habilitado</label>
				 	<select id="habilitado" name="habilitado" class="form-control" required>
				 		<option value="{{usuario.habilitado}}" >{{usuario.habilitado_}} </option>
				 		<option value="1">Si</option>
				 		<option value="false">No</option>
					</select>	<br>
				 	
			 	
			 	</div>
			 
				     <input type="hidden" name="csrf_token" value="{{token}}">
			 		<div class="footer_form">
				 		
				 		<input class="btn btn-block btn-primary" type="submit" value="Enviar" >
					</div>




			    </form>
			 	</section>

@endsection