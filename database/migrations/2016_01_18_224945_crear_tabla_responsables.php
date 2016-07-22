<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaResponsables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apellido');
            $table->string('nombre');
            $table->date('fechaNacimiento');
            $table->enum('sexo',['Femenino','Masculino']);
            $table->string('mail');
            $table->bigInteger('telefono');
            $table->string('direccion');
            $table->enum('tipo', ['Padre','Madre','Tutor']);
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
        Schema::drop('responsables');
    }
}
