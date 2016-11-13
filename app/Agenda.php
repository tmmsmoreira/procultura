<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    public static function getAllEvents()
    {
        $agenda = DB::table('agenda')->get();

        return $agenda;
    }
}
