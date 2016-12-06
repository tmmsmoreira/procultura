<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    public static function getAllEmployments()
    {
        $employments = DB::table('employments')->get();

        return $employments;
    }
}
