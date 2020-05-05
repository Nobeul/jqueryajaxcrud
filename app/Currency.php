<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function companies()
    {
    	return $this->hasMany(Company::class,'company_id');  
    }
}
