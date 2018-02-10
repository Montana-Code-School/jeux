<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id')->unsigned();
            //$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->integer('borrower_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->boolean('borrowed');
            $table->date('date_borrowed');
            $table->date('date_returned');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
