<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cod_estado');
            $table->string('des_estado');
            $table->integer('cod_municipio');
            $table->string('des_municipio');
            $table->integer('cod_parroquia');
            $table->string('des_parroquia');
            $table->bigInteger('codigo');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('mesa');
            $table->string('terminal_desde');
            $table->string('terminal_hasta');
            $table->string('votantes_evento');
            $table->string('tecnologia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}



