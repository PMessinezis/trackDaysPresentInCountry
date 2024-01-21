<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    public $guarded = [];

    public $casts =[
        'fromDate' => 'date',
        'toDate' => 'date',
    ];

    public static function getInitialDate()
    {
        return static::whereNull('fromDate')->orderBy('toDate')->first()?->toDate->toDateString();
    }

    public static function setInitialDate($date)
    {
        $record = static::whereNull('fromDate')->orderBy('toDate')->first() ?? new static;
        $record->toDate = $date;
        $record->save();
    }

    public static function getabsences()
    {
        return static::whereNotNull('fromDate')->whereNotNull('toDate')->orderBy('fromDate')->orderBy('toDate')->get();
    }

    public function getDaysAwayAttribute()
    {
        return daysBetween($this->fromDate, $this->toDate);
    }

}
