<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AdoptionRequests', function (Blueprint $table) {
            $table->bigInteger('userid') ->unsigned(); 
            $table ->foreign('userid')->references('id')->on('users'); 
            $table->bigInteger('animalid') ->unsigned(); 
            $table ->foreign('animalid')->references('id')->on('animals'); 
            $table->boolean('adopted');
            $table->boolean('pending');
            $table->boolean('denied');
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
        Schema::dropIfExists('AdoptionRequests');
    }
}
