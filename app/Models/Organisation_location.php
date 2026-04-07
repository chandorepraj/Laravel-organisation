<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organisation_location extends Model
{
    //
    protected $fillable = [
        'organisation_id',
        'address1',
        'address2',
        'state',
        'city',
        'country',
        'phone',
        'fax',
        'is_primary',
        'created_by',
        'is_deleted',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function organisation()
    {
        return $this->belongsTo(User::class,'organisation_id','id');
    }
}
