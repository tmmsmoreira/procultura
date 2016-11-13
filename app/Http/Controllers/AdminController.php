<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Agenda;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin/home');
    }
}
