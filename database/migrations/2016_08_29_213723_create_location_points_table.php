<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_points', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', 128)->nullable();
            $table->string('icon', 256)->nullable();
            $table->unsignedTinyInteger('type_id')->nullable();
            $table->float('lng', 10, 6)->nullable();
            $table->float('lat', 10, 6)->nullable();
            $table->unsignedInteger('offer_id')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('location_point_offer');
        Schema::dropIfExists('location_points');
    }
}
