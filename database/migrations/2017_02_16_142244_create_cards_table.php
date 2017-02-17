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
            $table->integer('card_type_id')->unsigned();
            $table->foreign('card_type_id')
                ->references('id')
                ->on('card_types')
                ->onDelete('cascade');
            $table->double('operand_one');
            $table->double('operand_two')->nullable();
            $table->double('result');
            $table->integer('card_power_id')->unsigned();
            $table->foreign('card_power_id')
                ->references('id')
                ->on('card_powers')
                ->onDelete('cascade');
            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
            $table->integer('operation_id')->unsigned()->nullable();
            $table->foreign('operation_id')
                ->references('id')
                ->on('operations')
                ->onDelete('cascade');
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
        Schema::dropIfExists('cards');
    }
}
