<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_residence');
            $table->string('type_residence'); 
            $table->string('type_center')->nullable(); 
            $table->string('aliquot_center')->nullable(); 
            $table->string('type_corner')->nullable(); 
            $table->string('aliquot_corner')->nullable(); 
            $table->string('type_penhouse')->nullable(); 
            $table->string('aliquot_penhouse')->nullable(); 
            $table->string('type_structure')->nullable(); 
            $table->string('structure')->nullable(); 
            $table->string('aliquot_structure')->nullable(); 
            $table->string('type_rif')->nullable(); 
            $table->string('number_rif')->nullable(); 
            $table->string('email_residence')->nullable(); 
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
        Schema::dropIfExists('residence');
    }
}
