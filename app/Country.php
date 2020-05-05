<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function companies()
    {
    	return $this->hasMany(Company::class,'company_id');  
    }
}
