<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::leftJoin("profiles", "users.profile_id", "=", "profiles.id")->select("users.name", "users.email", "profiles.key")->get();

        return view('admin.users', compact('users'));
    }
}
