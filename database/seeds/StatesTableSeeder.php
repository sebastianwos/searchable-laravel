<?php

use App\Country;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\State::class, 50)->create()->each(function($state) {
            $country = Country::inRandomOrder()->first();
            $state->country()->associate($country)->save();
        });
    }
}
