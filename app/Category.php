<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the offers for the category.
     */
    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    /**
     * Get the offers for the category.
     */
    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }

}
