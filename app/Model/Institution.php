<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    public function categorymodel(){
        return $this->hasMany(CategoryModel::class);
    }

}
