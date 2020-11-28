<?php

function long_date($date_str, $tz=false)
{
    if ($tz) {
        return $date_str->timezone(auth()->user()->timezone)->format('jS F, Y | g:i a T');
    } else {
        return $date_str->format('jS F, Y | g:i a T');
    }
}

function medium_date($date_str, $tz=false)
{
    if ($tz) {
        return $date_str->timezone(auth()->user()->timezone)->format('jS M, Y | g:i a T');
    } else {
        return $date_str->format('jS M, Y | g:i a T');
    }
}

function short_date($date_str, $tz=false)
{
    if ($tz) {
        return $date_str->timezone(auth()->user()->timezone)->format('d/m/Y | g:i a T');
    } else {
        return $date_str->format('d/m/Y | g:i a T');
    }
}

function time_diff($date_str, $tz=false)
{
    if ($tz) {
        return $date_str->timezone(auth()->user()->timezone)->diffForHumans();
    } else {
        return $date_str->diffForHumans();
    }
}

function date_only($date_str)
{
    return $date_str->format('jS M, Y');
}

function date_picked($date_str)
{
    return Carbon\Carbon::parse($date_str);
}

function edit_date($date_str)
{
    return $date_str->format('d-m-Y H:i:s');
}
