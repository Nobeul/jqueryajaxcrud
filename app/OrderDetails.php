<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public function product()
    {
    	return $this->belongsTo(Product::class,'product_id');  
    }
    public function order()
    { 
    	return $this->belongsTo(Order::class,'order_id','id'); 
    }
}
 