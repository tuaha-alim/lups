<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    public function category(){

        return $this->belongsTo('App\Category');
    }
    public function submit(){

        return $this->belongsTo('App\Submit');
    }
}
