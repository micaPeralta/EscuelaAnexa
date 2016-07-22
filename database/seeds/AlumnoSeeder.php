<?php

use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(proyecto_2015\Alumno::class,'no_egreso',10)->create();
        factory(proyecto_2015\Alumno::class,'egreso',10)->create();
    }
}
