<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    
    public function order_details()
    {
    	return $this->hasMany(OrderDetails::class,'order_details_id'); 
    }
}
 