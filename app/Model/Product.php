<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo('App\Model\Categories','categories_id');
    }

    public function institution(){
        return $this->belongsTo('App\Model\Institution');
    }
    public function getPriceForCount(){
        if(!is_null($this->pivot)){
            return $this->price * $this->pivot->count;
        }
        return $this->price;

}

protected $fillable = [
    'is_publish'
];
}
/*
 *
 */
