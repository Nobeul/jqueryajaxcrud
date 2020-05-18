<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    public function taxes()
    {
    	return $this->hasMany(Tax::class,'tax_id');  
    }
}
