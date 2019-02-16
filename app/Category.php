<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function submits(){

        return $this->hasMany('App\Submit');
    }
    public function photos(){

        return $this->hasMany('App\photo');
    }
}
