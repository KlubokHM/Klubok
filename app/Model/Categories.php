<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function products(){
        return $this->hasMany('App\Model\Product');
    }

    public function institution(){
        return $this->belongsTo(Institution::class);
    }



}
