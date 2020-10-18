<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name_en', 'name_ar','country_id',
    ];
    public $table="cities";
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
