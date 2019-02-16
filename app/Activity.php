<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function galleries(){

        return $this->hasMany('App\PhotoGallery');
    }
}
