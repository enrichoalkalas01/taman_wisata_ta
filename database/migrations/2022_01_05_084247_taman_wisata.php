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
            $table->string('title')->nullable();
            $table->string('rating')->nullable();
            $table->string('simple_location')->nullable();
            $table->string('excerpt')->nullable();
            $table->string('timestamps');
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
