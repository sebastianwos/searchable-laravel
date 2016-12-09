<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    /**
     * Get the offers for the category.
     */
    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    /**
     * Get the subcategory that owns the offer.
     */
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
