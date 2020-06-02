<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    public  function productss(){
        return $this->hasMany(Product::class);




    }
}
