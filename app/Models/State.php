<?php

namespace App\Models;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
