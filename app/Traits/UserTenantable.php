<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait UserTenantable
{
    public static function bootUserTenantable()
    {
        if (Auth::check()) {
            static::creating(function ($model) {
                $model->user_id = Auth::id();
            });
            static::addGlobalScope('user_id', function (Builder $builder) {
                return $builder->where('user_id', Auth::id());
            });
        }
    }
}
