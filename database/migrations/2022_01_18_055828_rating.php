<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('taman_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('verybest')->nullable();
            $table->integer('best')->nullable();
            $table->integer('normal')->nullable();
            $table->integer('bad')->nullable();
            $table->integer('verybad')->nullable();
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
        Schema::drop('rating');
    }
}
