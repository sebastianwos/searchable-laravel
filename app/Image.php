<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }
}
