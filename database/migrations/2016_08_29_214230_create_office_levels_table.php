<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('level_nr')->nullable();
            $table->unsignedInteger('offer_id')->nullable();
            $table->float('area_min', 10, 2);
            $table->float('area_max', 10, 2);
            $table->unsignedSmallInteger('rent_min');
            $table->unsignedSmallInteger('rent_max');
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
        Schema::dropIfExists('office_levels');
    }
}
