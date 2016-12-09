<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
