<?php

use Illuminate\Database\Seeder;

class AlumnoResponsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker=  $faker= Faker\Factory::create('es_AR');

       for ($i=1; $i < 21; $i++) { 
          DB::table('alumno_responsable')->insert([
     			'alumno_id'=>  $faker->numberBetween($min=1 , $max=20),
     			'responsable_id'=>  $faker->numberBetween($min=1 , $max=20)
     	 ]);
       }
    }
}
