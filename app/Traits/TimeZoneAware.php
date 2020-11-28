<?php


namespace App\Traits;


use Camroncade\Timezone\Facades\Timezone;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait TimeZoneAware
{
    public function getCreatedAtAttribute($input)
    {
        if (Auth::check()) {
            return Carbon::parse(
                Timezone::convertFromUTC(
                    $input, Auth::user()->timezone, 'Y-m-d H:i:s'
                )
            );
        }
        return $input;
    }

    public function getUpdatedAtAttribute($input)
    {
        if (Auth::check()) {
            return Carbon::parse(
                Timezone::convertFromUTC(
                    $input, Auth::user()->timezone, 'Y-m-d H:i:s'
                )
            );
        }
        return $input;
    }
}
