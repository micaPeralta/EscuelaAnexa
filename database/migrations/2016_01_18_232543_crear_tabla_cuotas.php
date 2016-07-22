<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCuotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anio');
            $table->integer('mes');
            $table->integer('numero');
            $table->integer('pagador_id');
            $table->float('monto');
            $table->enum('tipo',['Matricula','Mensual']);
            $table->float('comisionCobrador');
            $table->timestamps();
            $table->softDeletes();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cuotas');
    }
}
