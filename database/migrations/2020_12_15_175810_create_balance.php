<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('name_coowner_id');
            $table->foreign('name_coowner_id')->references('id')->on('coowner'); 
            $table->unsignedBigInteger('name_residence_id');
            $table->foreign('name_residence_id')->references('id')->on('residence');
            $table->unsignedBigInteger('type_residence_id');
            $table->foreign('type_residence_id')->references('id')->on('residence');
            $table->string('number_apto');
            $table->string('type_structure');
            $table->string('aliquot_structure');
            $table->string('month');
            $table->string('amount_total');
            $table->string('payment');
            $table->string('number_payment');
            $table->string('date_payment');
            $table->string('current_balance');
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
        Schema::dropIfExists('balance');
    }
}
