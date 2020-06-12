<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    public function categories(){
        return $this->hasMany(Categories::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }

    public function moderaters(){
        return $this->hasMany(User::class);
    }
    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function products_inst(){
        return $this->hasMany(Product::class);
    }

}
