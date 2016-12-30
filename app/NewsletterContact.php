<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsletterContact extends Model
{
    public static function getAll()
    {
        $contacts = DB::table('newsletter_contacts')->get();

        return $contacts;
    }

    /*public static function save()
    {
        $contacts = DB::table('newsletter_contacts')->get();

        DB::table('users')->insert(
    ['email' => 'john@example.com', 'votes' => 0]
);
        return $contacts;
    }*/
}
