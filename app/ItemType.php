<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    public function itemTypes()
    {
    	return $this->hasMany(ItemType::class,'item_type_id');  
    }
}
