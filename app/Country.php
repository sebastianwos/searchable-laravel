<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    public function states()
    {
        return $this->hasMany('App\State');
    }
}
