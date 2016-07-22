<?php

use Illuminate\Database\Seeder;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     /* - factory(proyecto_2015\Rol::class,3)->create();
		- proyecto_2015\Rol::Create([descripciom => 'consulta']);
     */
     DB::table('roles')->insert([
     	'descripcion'=> 'consulta'
     	]);
    DB::table('roles')->insert([
     	'descripcion'=> 'gestion'
     	]);
    DB::table('roles')->insert([
     	'descripcion'=> 'admin'
     	]);

    }
}
