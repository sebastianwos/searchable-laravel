<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeLevelModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_level_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('office_level_id')->nullable();
            $table->unsignedInteger('module_nr')->nullable();
            $table->float('area_min', 10, 2);
            $table->float('area_max', 10, 2);
            $table->unsignedSmallInteger('rent_min');
            $table->unsignedSmallInteger('rent_max');
            $table->timestamps();

            $table->foreign('office_level_id')->references('id')->on('office_levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('office_level_modules');
    }
}
