<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaResponsableUsuario extends Migration
{
    public function up()
    {
        Schema::create('responsable_usuario', function (Blueprint $table) {
           $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');

            $table->integer('responsable_id')->unsigned();
            $table->foreign('responsable_id')->references('id')->on('responsables');

            $table->timestamps();

             $table->primary(array('usuario_id','responsable_id'));
        });
    }

    
    public function down()
    {
        Schema::drop('responsable_usuario');
    }
}
