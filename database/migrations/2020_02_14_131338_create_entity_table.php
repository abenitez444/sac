<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('document_type_id')->nullable();
            $table->string('identity')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('web')->nullable(); 
            $table->string('addres')->nullable(); 
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
        Schema::dropIfExists('entity');
    }
}
