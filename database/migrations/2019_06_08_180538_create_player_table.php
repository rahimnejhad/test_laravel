<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname',64);
            $table->string('lname',128);
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('team')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            $table->index('fname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player');
    }
}
