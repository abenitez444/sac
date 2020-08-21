<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenditureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenditure', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('residence_coowner');
            $table->integer('year')->nullable();
            $table->string('month');
            $table->string('description_monthly');
            $table->string('type_money');
            $table->string('amount_monthly');
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
        Schema::dropIfExists('expenditure');
    }
}
