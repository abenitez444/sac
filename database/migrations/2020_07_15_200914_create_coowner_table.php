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
            $table->unsignedBigInteger('name_residence_id');
            $table->foreign('name_residence_id')->references('id')->on('residence'); 
            $table->unsignedBigInteger('type_residence_id');
            $table->foreign('type_residence_id')->references('id')->on('residence'); 
            $table->string('number_letters');
            $table->string('type_structure_id');
            $table->unsignedBigInteger('code_phone_id')->nullable();
            $table->foreign('code_phone_id')->references('id')->on('code_phone'); 
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('coowner');
    }
}
