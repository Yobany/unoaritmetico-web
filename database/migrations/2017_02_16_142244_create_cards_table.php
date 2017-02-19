<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('operation')->nullable();
            $table->double('result')->nullable();
            $table->integer('operation_id')->unsigned()->nullable();
            $table->foreign('operation_id')
                ->references('id')
                ->on('operations')
                ->onDelete('cascade');
            $table->integer('card_power_id')->unsigned()->nullable();
            $table->foreign('card_power_id')
                ->references('id')
                ->on('card_powers')
                ->onDelete('cascade');
            $table->integer('color_id')->unsigned()->nullable();
            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
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
        Schema::dropIfExists('cards');
    }
}
