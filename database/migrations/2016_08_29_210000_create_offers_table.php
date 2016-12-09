<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 512)->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('offer_type_id')->default(0);
            $table->unsignedInteger('country_id')->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('city', 128)->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->string('address', 512)->nullable();
            $table->string('nr1')->nullable();
            $table->string('nr2')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('subcategory_id')->nullable();
            $table->unsignedInteger('contact_type_id')->nullable();
            $table->unsignedInteger('agent_id')->nullable();
            $table->unsignedInteger('ownership_status_id')->nullable();
            $table->float('lng', 10, 6)->nullable();
            $table->float('lat', 10, 6)->nullable();
            $table->unsignedTinyInteger('zoom')->nullable();
            $table->text('description')->nullable();
            $table->text('description_langs')->nullable();
            $table->text('location_description')->nullable();
            $table->text('location_description_langs')->nullable();
            $table->unsignedInteger('offer_status_id')->nullable();
            $table->date('offer_date')->nullable();
            $table->date('planned_construction_beginning')->nullable();
            $table->date('planned_construction_completion')->nullable();
            $table->unsignedInteger('certificate_id')->nullable();
            $table->unsignedSmallInteger('levels')->nullable();
            $table->unsignedSmallInteger('underground_levels')->nullable();
            $table->float('all_area', 10, 2)->nullable();
            $table->float('average_level_area', 10, 2)->nullable();
            $table->float('office_area', 10, 2)->nullable();
            $table->unsignedTinyInteger('common_area_percent')->nullable();
            $table->float('common_area', 10, 2)->nullable();
            $table->unsignedInteger('common_area_method_id')->nullable();
            $table->unsignedSmallInteger('ground_parking')->nullable();
            $table->unsignedSmallInteger('underground_parking')->nullable();
            $table->float('parking_factor', 10, 2)->nullable();
            $table->unsignedSmallInteger('monthly_cost')->nullable();
            $table->unsignedSmallInteger('monthly_cost_money_unit')->nullable();
            $table->unsignedSmallInteger('minimal_rent_time')->nullable();
            $table->unsignedSmallInteger('minimal_rent_time_unit')->nullable();
            $table->unsignedSmallInteger('office_ground_parking')->nullable();
            $table->unsignedSmallInteger('office_underground_parking')->nullable();
            $table->unsignedSmallInteger('office_ground_parking_price')->nullable();
            $table->unsignedSmallInteger('office_underground_parking_price')->nullable();
            $table->unsignedSmallInteger('publication_status')->nullable()->default(1);
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('set null');
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
