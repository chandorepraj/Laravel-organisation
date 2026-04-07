<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    //
    protected $fillable = [
        'role',
        'created_by',
        'is_deleted',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
