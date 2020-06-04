<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getFullPrice(){
        $sum = 0;
        foreach ($this->products as $product){
            $sum+= $product->getPriceForCount();
        }
        return $sum;
    }

    protected $fillable = [
        'id',
        'status',
        'user_id',
        'first_name',
        'second_name',
        'last_name',
        'email',
        'city',
        'street',
        'building',
        'room_number',
        'index',
    ];

}
