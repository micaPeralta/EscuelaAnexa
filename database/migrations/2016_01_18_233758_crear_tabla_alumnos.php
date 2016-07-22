<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAlumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apellido');
            $table->string('nombre');
            $table->date('fechaNacimiento');
            $table->enum('sexo',['Femenino','Masculino']);
            $table->string('mail');
            $table->bigInteger('telefono');
            $table->bigInteger('nroDocumento');
            $table->string('direccion');
            $table->date('fechaIngreso');
            $table->date('fechaEgreso')->nullable();
            $table->date('fechaAlta');
            $table->boolean('borrado');
            $table->softDeletes();
             $table->timestamps();
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alumnos');
    }
}
