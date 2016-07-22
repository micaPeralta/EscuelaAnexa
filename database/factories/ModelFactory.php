<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|

Aquí se definen todos tus models factories.Un model factories es conveniente para crear datos 
para prueba para un modelo/tabla.

* INVESTIGAR fakers (los diferentes tipos)

EJEMPLO:


$factory->define(proyecto_2015\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
*/




$factory->defineAs(proyecto_2015\Responsable::class,'Femenino',function (Faker\Generator $faker) {

  $faker->addProvider(new Faker\Provider\es_AR\Person($faker));
  $faker->addProvider(new Faker\Provider\es_AR\Address($faker));
  $faker->addProvider(new Faker\Provider\es_AR\PhoneNumber($faker));

    return ['nombre' => $faker->firstNameFemale,
      		'apellido'=> $faker->lastName,
      		'direccion' => $faker->address,
      		'telefono'=> $faker->randomNumber($nbDigits=9),
      		'fechaNacimiento' => $faker->date($formate='Y-m-d', $max='now'), 
      		'sexo' => 'Femenino', 
    		'mail'=> $faker->email ,
      		'tipo' => $faker->randomElement(['madre', 'tutor']) ];
});

$factory->defineAs(proyecto_2015\Responsable::class,'Masculino',function (Faker\Generator $faker) {

    $faker->addProvider(new Faker\Provider\es_AR\Person($faker));
    $faker->addProvider(new Faker\Provider\es_AR\Address($faker));
    $faker->addProvider(new Faker\Provider\es_AR\PhoneNumber($faker));

    return ['nombre' => $faker->firstNameMale,
      		'apellido'=> $faker->lastName,
      		'direccion' => $faker->address,
      		'telefono'=> $faker->randomNumber($nbDigits=9),
      		'fechaNacimiento' => $faker->date($formate='Y-m-d', $max='now'), 
      		'sexo' => 'Masculino', 
    		'mail'=> $faker->email ,
      		'tipo' =>$faker->randomElement(['Padre', 'Tutor']) ];
});

$factory->defineAs(proyecto_2015\Alumno::class,'no_egreso', function (Faker\Generator $faker) {
  /* CREA UN ALUMNO  QUE YA EGRESÓ*/
  /*tener en cuenta : la fecha de egreso debe ser mayor que la de ingreso, y podria no tenerla*/
    $faker->addProvider(new Faker\Provider\es_AR\Person($faker));
    $faker->addProvider(new Faker\Provider\es_AR\Address($faker));
    $faker->addProvider(new Faker\Provider\es_AR\PhoneNumber($faker));
    
    $fechaIngreso = $faker->dateTimeBetween($starDate='-9 years',$endDate='now');
    $fechaEgreso = $faker->dateTimeBetween($starDate=$fechaIngreso,$endDate='now');

    return ['nombre' => $faker->name,
      		'apellido' => $faker->lastName,
      		'direccion'=> $faker->address,
      		'telefono' => $faker->randomNumber($nbDigits=9),
      		'fechaNacimiento'=> $faker->date($formate='Y-m-d',$max='now'), 
      		'sexo'=> $faker->randomElement(['Femenino','Masculino']), 
      		'mail'=> $faker->email,
          'nroDocumento'=>$faker->randomNumber($nbDigits=8),
      		'fechaIngreso' => $fechaIngreso,
      		'fechaEgreso'=> $fechaEgreso ,
      		'fechaAlta'=> $faker->dateTimeBetween($starDate=$fechaIngreso,$endDate=$fechaEgreso)
      		];
});

$factory->defineAs(proyecto_2015\Alumno::class,'egreso', function (Faker\Generator $faker) {
    /* CREA UN ALUMNO QUE TODAVIA NO EGRESÓ*/
  /*tener en cuenta : la fecha de egreso debe ser mayor que la de ingreso, y podria no tenerla*/
    $faker->addProvider(new Faker\Provider\es_AR\Person($faker));
    $faker->addProvider(new Faker\Provider\es_AR\Address($faker));
    $faker->addProvider(new Faker\Provider\es_AR\PhoneNumber($faker));
    
    $fechaIngreso = $faker->dateTimeBetween($starDate='-9 years',$endDate='now');
    $fechaEgreso = $faker->dateTimeBetween($starDate=$fechaIngreso,$endDate='now');

    return ['nombre' => $faker->name,
          'apellido' => $faker->lastName,
          'direccion'=> $faker->address,
          'telefono' => $faker->randomNumber($nbDigits=9),
          'fechaNacimiento'=> $faker->date($formate='Y-m-d',$max='now'), 
          'sexo'=> $faker->randomElement(['Femenino','Masculino']), 
          'mail'=> $faker->email,
          'nroDocumento'=> $faker->randomNumber($nbDigits=8),
          'fechaIngreso' => $fechaIngreso,
          'fechaEgreso'=> $fechaEgreso ,
          'fechaAlta'=> $faker->dateTimeBetween($starDate=$fechaIngreso,$endDate=$fechaEgreso)
          ];
});


