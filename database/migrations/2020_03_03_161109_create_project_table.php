<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->integer('entity_id')->unsigned();
            $table->bigInteger('status_id')->unsigned()->nullable();
            $table->boolean('cost')->default(false);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('status_project');   
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
        Schema::dropIfExists('project');
    }
}
