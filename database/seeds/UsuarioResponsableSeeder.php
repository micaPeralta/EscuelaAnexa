<?php

use Illuminate\Database\Seeder;

class UsuarioResponsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker= Faker\Factory::create('es_AR');
       
          DB::table('responsable_usuario')->insert([
     			'usuario_id'=> 1,
     			'responsable_id'=>  $faker->numberBetween($min=1 , $max=20)
     	 ]);

         DB::table('responsable_usuario')->insert([
     			'usuario_id'=> 2,
     			'responsable_id'=>  $faker->numberBetween($min=1 , $max=20)
     	 ]);
       
    }
}
