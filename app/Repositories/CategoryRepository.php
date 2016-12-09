<?php

namespace App\Repositories;

use App\Category;
use App\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {


    /**
     * Return all categories
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all(){
        return Category::all();
    }

    /**
     * Get Distinct City names for category offers
     * @return mixed
     */
    public function getCategoriesWithDistinctCities(){
        return Category::with(['offers' => function ($query) {
            $query->distinct()->select('id','category_id','city');
        }])->get();
    }
    
}