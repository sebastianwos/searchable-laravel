<?php

use App\Agent;
use App\State;
use App\Subcategory;
use App\User;
use Illuminate\Database\Seeder;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Offer::class, 100)->create()->each(function($offer) {

            $state = State::inRandomOrder()->first();
            $country = $state->country;
            $subcategory = Subcategory::inRandomOrder()->first();
            $category = $subcategory->category;
            $agent = Agent::inRandomOrder()->first();

            $collection = collect(range(1, 10));


            $offer->country()->associate($country)->save();
            $offer->state()->associate($state)->save();
            $offer->category()->associate($category)->save();
            $offer->subcategory()->associate($subcategory)->save();
            $offer->agent()->associate($agent)->save();

            for($i = 0; $i < $collection->random(); $i++){
                $offer->images()->save(factory(App\Image::class)->make());
            }
            for($i = 0; $i < $collection->random(); $i++){
                $offer->videos()->save(factory(App\Video::class)->make());
            }
            for($i = 0; $i < $collection->random(); $i++){
                $offer->panoramas()->save(factory(App\Panorama::class)->make());
            }
            for($i = 0; $i < $collection->random(); $i++){
                $offer->locationPoints()->save(factory(App\LocationPoint::class)->make());
            }
            for($i = 0; $i < $collection->random(); $i++){
                $offer->officeLevels()->save(factory(App\OfficeLevel::class)->make(['level_nr' => $i]));
            }

            for($i = 0; $i < $collection->random(); $i++){
                $attribute = App\Attribute::inRandomOrder()->first();
                $offer->attributes()->attach($attribute);
            }

            foreach ($offer->officeLevels as $level) {
                for($i = 0; $i < $collection->random(); $i++){
                    $level->officeLevelModules()->save(factory(App\OfficeLevelModule::class)->make(['module_nr' => $i]));
                }
            }



        });
    }
}
