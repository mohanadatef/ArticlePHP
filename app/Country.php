<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name_en', 'name_ar',
    ];
    public $table="countries";
    public function city()
    {
        return $this->hasMany('App\City');
    }
    public function user()
    {
        return $this->hasMany('App\User');
    }

}
