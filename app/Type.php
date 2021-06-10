<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [];

    public function restaurants(){

        return $this->belongsToMany('App\Restaurant');

    }
}
