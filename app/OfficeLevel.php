<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeLevel extends Model
{
    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }

    public function officeLevelModules()
    {
        return $this->hasMany('App\OfficeLevelModule');
    }

}
