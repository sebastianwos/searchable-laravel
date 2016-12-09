<?php

namespace App\Repositories;


use App\Country;
use App\Contracts\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface
{
    public function getCountriesForSelect()
    {
        return Country::all();
    }
}