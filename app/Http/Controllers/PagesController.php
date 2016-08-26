<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function soon()
    {
      return view('welcome');
    }

    public function home()
    {
      return view('home');
    }
}
