<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $dates = ['start_datetime', 'end_datetime'];
}
