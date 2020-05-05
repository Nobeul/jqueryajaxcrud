<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function companies()
    {
    	return $this->hasMany(Company::class,'company_id');  
    }
}
