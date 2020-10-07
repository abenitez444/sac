<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cod_estado'); 
            $table->integer('cod_municipio');             
            $table->integer('cod_parroquia');
            $table->string('nacionalidad');
            $table->string('cedula_identidad');
            $table->string('apellidos_nombres');
            $table->string('fec_nacimiento');
            $table->string('estado_civil');
            $table->string('sexo');
            $table->bigInteger('centro_nuevo');
            $table->bigInteger('centro_viejo');
            $table->foreign('cod_estado')->references('cod_estado')->on('data'); 
            $table->foreign('cod_municipio')->references('cod_municipio')->on('data'); 
            $table->foreign('cod_parroquia')->references('cod_parroquia')->on('data'); 
            $table->foreign('Centro_nuevo')->references('codigo')->on('data'); 
            $table->foreign('Centro_viejo')->references('codigo')->on('data'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro');
    }
}


