<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('document_type_id')->unsigned()->nullable();
            $table->string('ci')->nullable();
            $table->string('phone')->nullable();
            $table->string('curriculum')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('document_type_id')->references('id')->on('document_type');   

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
