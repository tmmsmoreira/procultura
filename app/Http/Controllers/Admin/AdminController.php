<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
