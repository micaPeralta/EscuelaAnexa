<?php

use Illuminate\Database\Seeder;

class ConfiguracionSeeder extends Seeder
{
    
    public function run()
    {
  		
  	   $faker= Faker\Factory::create('es_AR');

       proyecto_2015\Configuracion::Create([
       		'clave'=> 'descripcion',
       		'valor_textual'=> $faker->text($nbSentences=100,$variableNbSentences =false)
       	]);
       proyecto_2015\Configuracion::Create([
       		'clave'=> 'frontend',
       		'valor_textual'=> 'si'
       	]);
       proyecto_2015\Configuracion::Create([
       		'clave'=> 'mail_contacto',
       		'valor_textual'=> 'direc-anexa@isis.unlp.edu.ar'
       	]);
       proyecto_2015\Configuracion::Create([
       		'clave'=> 'mensaje_inhab',
       		'valor_textual'=> 'El sitio se encuentra momentaneamente inhabilitado'
       	]);
        proyecto_2015\Configuracion::Create([
       		'clave'=> 'paginacion',
       		'valor_numerico'=> 8 
       	]);
       	 proyecto_2015\Configuracion::Create([
       		'clave'=> 'titulo',
       		'valor_textual'=> 'Cooperadora de la Escuela Graduada Joaquin V. Gonzalez.
'
       	]);

    }
}
