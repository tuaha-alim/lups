<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    public function albums(){

        return $this->hasMany('App\Album');
    }
    public function activity(){

        return $this->belongsTo('App\Activity');
    }
}
