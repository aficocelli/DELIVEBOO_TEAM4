<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function foods(){

        return $this->belongsToMany('App\Food', 'food_order')->withPivot('id');

    }
}
