<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panorama extends Model
{
    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }
}
