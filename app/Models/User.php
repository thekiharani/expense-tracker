<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name', 'email', 'phone_number', 'timezone', 'currency_id', 'password',
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // user can have an admin account
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id');
    }

    // user has preferred currency
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    // super admin attribute
    public function getSuperAdminAttribute()
    {
        return $this->admin()->exists() && $this->admin->super_admin;
    }

    // current currency
    public function getCurrencyCodeAttribute()
    {
        return $this->currency->code ?? 'KES';
    }
}
