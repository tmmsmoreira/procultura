<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['start_datetime', 'end_datetime'];
}
