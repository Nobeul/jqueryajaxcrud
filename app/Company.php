<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    public function country()
    {
    	return $this->belongsTo(Country::class,'country_id');  
    }
    public function language()
    {
    	return $this->belongsTo(Language::class,'language_id');  
    }
    public function currency()
    {
    	return $this->belongsTo(Currency::class,'currency_id');  
    }
}
