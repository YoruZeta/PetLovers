<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('me');
            $table->unsignedInteger('me_id');
            $table->unsignedInteger('select_id')->nullable();
            $table->foreign('select_id')->references('id')->on('pets')->onUpdate('cascade')->onDelete('set null');
            $table->string('selected');
            $table->string('owner_selected');
            $table->unsignedInteger('selected_id')->nullable();
            $table->foreign('selected_id')->references('id')->on('pets')->onUpdate('cascade')->onDelete('set null');
            $table->string('Pet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
