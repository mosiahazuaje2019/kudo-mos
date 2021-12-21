<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKudoCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kudo_cards', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->longText('description');
            $table->string('uri');
            $table->unsignedBigInteger('kudo_board_id');
            $table->foreign('kudo_board_id')->references('id')->on('kudo_boards');
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
        Schema::dropIfExists('kudo_cards');
    }
}
