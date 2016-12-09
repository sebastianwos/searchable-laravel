<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationPoint extends Model
{
    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }
}
