<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dependencia')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('responsable')->nullable();
            $table->string('codigo_interno')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('serial')->nullable();
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('especificacion')->nullable();
            $table->string('detalle')->nullable();
            $table->integer('entity_id')->unsigned();

            $table->softDeletes();
            $table->timestamps();
           
            $table->foreign('entity_id')->references('id')->on('entity');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
