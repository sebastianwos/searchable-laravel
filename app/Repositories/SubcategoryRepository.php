<?php

namespace App\Repositories;

use App\Subcategory;
use App\Contracts\SubcategoryRepositoryInterface;

class SubcategoryRepository implements SubcategoryRepositoryInterface {


    public function all(){
        return Subcategory::all();
    }
}