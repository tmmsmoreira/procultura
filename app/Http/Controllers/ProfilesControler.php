<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Profile;

class ProfilesControler extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        return view('profiles', compact('profiles'));
    }
}
