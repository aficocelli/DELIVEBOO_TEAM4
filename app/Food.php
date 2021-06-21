<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Food extends Model
{
    public $table = "foods";
    protected $guarded = [];

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function orders(){

        return $this->belongsToMany('App\Order', 'food_order')->withPivot('id');

    }
}
