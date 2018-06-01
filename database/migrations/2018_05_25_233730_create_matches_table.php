<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('give_user_id');
            $table->foreign('give_user_id')->references('id')->on('users');
            $table->unsignedInteger('liked_pet_id');
            $table->foreign('liked_pet_id')->references('id')->on('pets');
            $table->unsignedInteger('owner_user_id');
            $table->foreign('owner_user_id')->references('id')->on('users');
            $table->unsignedInteger('match_pet_id')->nullable();
            $table->foreign('match_pet_id')->references('id')->on('pets');
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
        Schema::dropIfExists('matches');
    }
}
