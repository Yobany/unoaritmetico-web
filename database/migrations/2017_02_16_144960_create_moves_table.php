<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turn');
            $table->double('duration');
            $table->integer('student_id')->unsigned()->nullable();
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');
            $table->integer('card_on_deck_id')->unsigned();
            $table->foreign('card_on_deck_id')
                ->references('id')
                ->on('cards')
                ->onDelete('cascade');
            $table->integer('card_played_id')->unsigned();
            $table->foreign('card_played_id')
                ->references('id')
                ->on('cards')
                ->onDelete('cascade');
            $table->integer('game_id')->unsigned();
            $table->foreign('game_id')
                ->references('id')
                ->on('games')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moves');
    }
}
