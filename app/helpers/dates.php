<?php

use Illuminate\Support\Carbon;

function carbon($date)
{
    return new Carbon($date);
}

function daysBetween($fromDate, $toDate, $strict = false)
{
    $diff = ($fromDate && $toDate ) ? carbon($fromDate)->diffInDays(carbon($toDate), !$strict) : null;
    if ($strict && $diff < 0) return null;
    $diff = abs($diff) - 1;
    if ($diff < 0) $diff = 0;
    return $diff;
}