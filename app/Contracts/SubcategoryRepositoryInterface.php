<?php


namespace App\Contracts;

interface SubcategoryRepositoryInterface {

    /**
     * Return all subcategories
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all();
}