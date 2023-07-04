<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'selected_freq', 'startdate', 'selected_day', 'selected_times'
    ];
}
