<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::leftJoin("profiles", "users.profile_id", "=", "profiles.id")->select("users.name", "users.email", "profiles.key")->get();

        return view('admin.users.index', compact('users'));
    }
}
