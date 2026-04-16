<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organisation extends Model
{
    //
    protected $fillable = [
        'organisation_name',
        'organisation_type',
        'npi',
        'voip_number',
        'created_by',
        'is_deleted',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function organisation_location(): HasMany
    {
        return $this->hasMany(Organisation_location::class,'organisation_id','id');
    }
}
