<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image')->default('gameAvatar.jpg');
            $table->integer('year')->nullable();
            $table->integer('min_player')->nullable();
            $table->integer('max_player')->nullable();
            $table->integer('min_age')->nullable();
            $table->integer('min_play')->nullable();
            $table->integer('max_play')->nullable();
            $table->mediumText('description')->nullable();
            $table->boolean('instructions')->nullable();
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
        Schema::dropIfExists('games');
    }
}
