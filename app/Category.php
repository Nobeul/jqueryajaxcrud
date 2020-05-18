<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
    	return $this->hasMany(Product::class,'product_id');  
    }

    public function unit()
    {
    	return $this->belongsTo(Unit::class,'unit_id','id'); 
    }
}
