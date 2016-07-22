<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
       /* Aquí llamariamos a todos los seeders que queremos ejecutasr
       en el orden que quisieramos
       como por ej 
       $this->call(UsersTableSeeder::class);
       $this->call(PostsTableSeeder::class);
      s $this->call(CommentsTableSeeder::class);

      y despúes para ejecutarlo -> php artisan db:seed

        y listo :)
      */


       $this->call(RolSeeder::class);
       $this->call(ResponsableSeeder::class);
      
       $this->call(AlumnoSeeder::class);
        $this->call(ConfiguracionSeeder::class);
       
        $this->call(UserSeeder::class);
      $this->call(UsuarioResponsableSeeder::class);
    }
}
