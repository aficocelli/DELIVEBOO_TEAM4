<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = [];

    public function user(){

        return $this->hasOne('App\User');
    }

    public function foods(){

        return $this->hasMany('App\Food');

    }

    public function types(){

        return $this->belongsToMany('App\Type');

    }
}
