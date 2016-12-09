<?php
/**
 * Created by PhpStorm.
 * User: JS-BOG
 * Date: 2016-10-08
 * Time: 23:28
 */
namespace App\Contracts;

interface CategoryRepositoryInterface {

    /**
     * Get Distinct City names for category offers
     * @return mixed
     */
    public function all();
    public function getCategoriesWithDistinctCities();
}