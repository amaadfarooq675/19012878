<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myrequests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('userid') ->unsigned(); 
            $table ->foreign('userid')->references('id')->on('users'); 
            $table->bigInteger('animalid') ->unsigned(); 
            $table ->foreign('animalid')->references('id')->on('animals'); 
            $table->boolean('adopted');
            $table->boolean('pending');
            $table->boolean('denied');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('myrequests');
    }
}
