<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeLevelModule extends Model
{
    public function officeLevel()
    {
        return $this->belongsTo('App\OfficeLevel');
    }
}
