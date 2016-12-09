<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function offers()
    {
        return $this->belongsToMany('App\Offer');
    }
}
