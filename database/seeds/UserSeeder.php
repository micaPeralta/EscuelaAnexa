<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**un the database seeds.
     *
     * @return void
     */
    public function run()
    {
      proyecto_2015\User::Create(['username' => 'root',
       								  'password' => Hash::make('root'),
       								  'rol_id'=> '3'	]);
      proyecto_2015\User::Create(['username' => 'betty',
       								  'password' =>  Hash::make('betty'),
       								  'rol_id'=> '1'	]);
      proyecto_2015\User::Create(['username' => 'juancho',
       								  'password' => Hash::make('juancho'),
       								  'rol_id'=> '2'	]);
    }
}
