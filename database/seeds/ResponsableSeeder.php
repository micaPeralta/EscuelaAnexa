<?php

use Illuminate\Database\Seeder;

class ResponsableSeeder extends Seeder
{
    public function run()
    {
       factory(proyecto_2015\Responsable::class,'Femenino',10)->create();
       factory(proyecto_2015\Responsable::class,'Masculino',10)->create();
    }
}
