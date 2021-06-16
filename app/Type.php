<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Type extends Model
{
    protected $guarded = [];

    public function users(){

        return $this->belongsToMany('App\User', 'type_user','user_id', 'type_id')->withPivot('id');

    }
}
