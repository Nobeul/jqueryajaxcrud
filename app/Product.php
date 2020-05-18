<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    
    public function order_details()
    {
    	return $this->hasMany(OrderDetails::class,'product_id'); 
    }

    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id','id'); 
    }
    
    public function unit()
    {
    	return $this->belongsTo(Unit::class,'unit_id','id'); 
    }

    public function item_type()
    {
    	return $this->belongsTo(ItemType::class,'item_type_id','id'); 
    }

    public function tax_type()
    {
    	return $this->belongsTo(Tax::class,'tax_type_id','id'); 
    }
}
 