<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function(Blueprint $table){

            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name', 128);
            $table->string('title', 256);
            $table->string('company', 256);
            $table->string('email', 64);
            $table->string('phone', 32);
            $table->string('facebook', 512);
            $table->string('linkedin', 512);
            $table->string('avatar', 512);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
