<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin/home');
    }

    public function login()
    {
        return view('admin/login');
    }
}
