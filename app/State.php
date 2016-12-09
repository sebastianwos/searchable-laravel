<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
