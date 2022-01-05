<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TamanWisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taman_wisata', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('rating');
            $table->string('simple_location');
            $table->string('excerpt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:drop('taman_wisata');
    }
}
