<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function gallery(){

        return $this->belongsTo('App\PhotoGallery');
    }
}
