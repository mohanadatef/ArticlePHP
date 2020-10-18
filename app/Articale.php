<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articale extends Model
{
    protected $fillable = [
        'tittle', 'body','image','user_id','test_file'
    ];
    public $table="articales";
    public function user(){
        return $this->belongsTo('App\User');
    }
}
