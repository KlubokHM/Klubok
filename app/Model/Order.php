<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function author(){
        return $this->belongsTo(User::class);
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
        'phone',
        'email',
        'final_price',
        'city',
        'street',
        'building',
        'room_number',
        'index',
    ];

}
