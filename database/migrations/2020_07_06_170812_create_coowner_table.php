<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoownerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coowner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('aliquot')->nullable();
            $table->string('saldo')->nullable();
            $table->integer('code_phone_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->softDeletes();
            $table->timestamps();
    
            /*$table->foreign('document_type_id')->references('id')->on('document_type'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coowner');
    }
}
