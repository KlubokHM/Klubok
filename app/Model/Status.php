<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function orders(){
        return $this->belongsTo(Order::class);
    }
}
