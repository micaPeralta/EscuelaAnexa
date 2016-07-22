<!DOCTYPE html>

<html lang="es">
    <head>
	
  
	<meta charset="UTF-8"> 
  <meta name="description" content="Escuela Graduada Joaquin V. Gonzalez - UNLP" />
	<meta name="viewport" content="width=divise-width, initial-scale=1, maximum-scale=1">
	<title>Escuela Graduada Joaquin V. Gonzalez</title>
  <link rel="shortcut icon" href={{url("/assets/img/favicon.png")}} type="image/png" /> 
  
    @section ('links')
     {!! Html::style('assets/css/bootstrap.min.css') !!}
     {!! Html::style('assets/css/estilo.css') !!}     
     {!! Html::style('assets/css/font-awesome.min.css') !!}
     {!! Html::style('assets/chosen/chosen.min.css') !!}

    @show
   
         {!! Html::script('assets/js/jquery.min.js') !!}
         {!! Html::script('assets/js/funciones.js') !!}
         {!! Html::script('assets/js/bootstrap.min.js') !!}
         {!! Html::script('assets/js/bootbox.min.js') !!}
         {!! Html::script('assets/chosen/chosen.jquery.min.js') !!}
       
         
	</head>
<body>

   @section('header')
    <header class="fondo_blanco" > 
   		<div id="logo"> <img src={{url("/assets/img/logo_unlp.jpg")}} alt="logo de la unlp" ></div>
   		<div id="caja_titulo"> 
   		     <h1>Escuela Graduada Joaqu&iacute;n V. Gonz&aacute;lez </h1>
   		     <h2> Escuela de la Universidad Nacional de La Plata </h2> 

   		</div>
   		
		<picture>
			<img src={{url("/assets/img/header.jpg")}} alt="portada" id="imagen_header" class="img-responsive"  >
		</picture>

   </header>
   <nav >    
   		<ul id="navegacion" >   			
         @section('boton_inicio')
        <li><a href="{{url('/')}}">Inicio</a></li>
        @show
   			<li><a href="">Proyectos</a></li>
   			<li><a href="">Enseñanza</a></li>
   			<li><a href="">Ingreso 2016</a> </li>
   			<li><a href="">Museo</a> </li>
   			<li><a href="">Contacto</a> </li>
   		</ul>	

   </nav>@show 
   <div id="contenedor" class="fondo_blanco ">
            @section('contenedor')
      	   	<main>
      				 @section('main')
               @show           
      	 	 </main>	
	 	       <aside id="menu_lateral" >
      	 			 @section('aside') 
      	   			<span class="subTitMen">INFORMACI&Oacute;N ACAD&Eacute;MICA</span>
      	   			
      	   			<ul >   			

         					<li>Historia </li>
      	   				<li><a href=""> Normas Generales </a></li>
      	   				<li><a href="#">Proyecto academico y de Gestion institucional 2014-2015</a> </li>
      	   				<li><a href="#">Proyecto academico y de Gestion institucional 2014-2018</a> </li>
      	   			</ul>
      	   			<span class="subTitMen">ACCEDER </span>
      	   			<ul>
      		   			<li><a href="/login">Acceder </a> </li>
      		   
         				</ul>
         				 @show
	        	</aside>		
    @show   
 </div>    

  @section('footer')
   <footer>
   		<div id="contenedor_footer">
   		
   			@section('mail')<strong>Correo Electr&oacute;nico: </strong> <br> @show
        

   		</div>   		
   </footer>

   @show
      </body>
</html>