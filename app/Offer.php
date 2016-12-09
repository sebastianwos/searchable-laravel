<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    /**
     * Visible fields when cast to JSON format
     * @var array
     */
    //protected $visible = ['id', 'title', 'category'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'offer_date'
    ];

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function panoramas()
    {
        return $this->hasMany('App\Panorama');
    }

    public function officeLevels()
    {
        return $this->hasMany('App\OfficeLevel');
    }

    public function attributes()
    {
        return $this->belongsToMany('App\Attribute');
    }

    public function locationPoints()
    {
        return $this->hasMany('App\LocationPoint');
    }

}
