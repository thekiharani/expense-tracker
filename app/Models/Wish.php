<?php

namespace App\Models;

use App\Traits\UserTenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wish extends Model
{
    use HasFactory, SoftDeletes, UserTenantable;

    protected $guarded = [];

    // The attributes that should be cast to native types.
    protected $casts = [
        'pp_date' => 'datetime',
        'date_purchased' => 'datetime'
    ];

    // purchased attribute
    public function getPurchasedAttribute()
    {
        return (bool) $this->date_purchased;
    }

}
