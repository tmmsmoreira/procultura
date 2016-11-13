<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public static function getAllNormalProfiles()
    {
        $profiles = DB::table('profiles')->where('key', '!=', 'admin')->get();
        
        return $profiles;
    }
}
