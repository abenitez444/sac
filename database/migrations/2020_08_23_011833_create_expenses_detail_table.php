<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description_monthly');
            $table->string('amount_monthly');
            $table->unsignedBigInteger('expenditure_id')->nullable();
            $table->foreign('expenditure_id')->references('id')->on('expenditure'); 
            $table->unsignedBigInteger('type_money')->nullable();
            $table->foreign('type_money')->references('id')->on('type_money'); 
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
        Schema::dropIfExists('expenses_detail');
    }
}
