<?php

function long_date($date_str)
{
    return $date_str->timeZone('Africa/Nairobi')->format('jS F, Y | g:i a T');
}

function medium_date($date_str)
{
    return $date_str->timeZone('Africa/Nairobi')->format('jS M, Y | g:i a T');
}

function short_date($date_str)
{
    return $date_str->timeZone('Africa/Nairobi')->format('d/m/Y | g:i a T');
}

function time_diff($date_str)
{
    return $date_str->timeZone('Africa/Nairobi')->diffForHumans();
}

function date_only($date_str)
{
    return $date_str->timeZone('Africa/Nairobi')->format('jS M, Y');
}

function input_date($date_str)
{
    return Carbon\Carbon::parse($date_str)->timeZone('Africa/Nairobi');
}
