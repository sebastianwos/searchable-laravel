<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function(Blueprint $table){

            $table->increments('id');
            $table->string('name', 128);
            $table->string('icon', 256);
            $table->unsignedTinyInteger('type_id');
            $table->timestamps();

        });

        Schema::create('attribute_offer', function(Blueprint $table){

            $table->unsignedInteger('attribute_id');
            $table->unsignedInteger('offer_id');
            $table->timestamps();

            $table->index(['attribute_id', 'offer_id']);
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_offer');
        Schema::dropIfExists('attributes');
    }
}
