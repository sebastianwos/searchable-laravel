<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 4)->create()->each(function($category) {
            for($i = 0; $i < 4; $i++){
                $category->subcategories()->save(factory(App\Subcategory::class)->make());
            }
        });
    }
}
