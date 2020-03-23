<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class,'user_id','id'); 
    }
    public function order_details()
    {
    	return $this->hasMany(OrderDetails::class,'order_id');  
    }
}  
