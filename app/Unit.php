<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function categories()
    {
    	return $this->hasMany(Category::class,'category_id');  
    }
}
