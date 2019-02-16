<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    public function category(){

        return $this->belongsTo('App\Category');
    }
    public function photos(){

        return $this->hasMany('App\photo');
    }

}
