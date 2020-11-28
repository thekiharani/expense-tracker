<?php

namespace App\Models;

use App\Traits\UserTenantable;
use Camroncade\Timezone\Facades\Timezone;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use HasFactory, SoftDeletes, UserTenantable;

    protected $guarded = [];

    // The attributes that should be cast to native types.
    protected $casts = [
        'date_received' => 'datetime',
    ];

    public function setDateReceivedAttribute($input)
    {
        $this->attributes['date_received'] = Timezone::convertToUTC(
            $input, auth()->user()->timezone,  'Y-m-d H:i:s'
        );
    }

}
