<?php

namespace App\Http\Controllers;

use File;
use Image;
use App\Event;
use App\Job;

class PagesController extends Controller
{
    public function soon()
    {
        return view('welcome');
    }

    public function home()
    {
        $events = Event::orderBy('created_at', 'desc')->limit(10)->get();
        $jobs = Job::orderBy('created_at', 'desc')->limit(3)->get();

        return view('home', compact('events', 'jobs'));
    }

    public function about()
    {
        return view('about');
    }

    public function whatWeDo()
    {
        return view('whatwedo');
    }

    public function terms()
    {
        return view('terms');
    }

    public function ourPartners()
    {
        return view('ourpartners');
    }

    public function bePartner()
    {
        return view('bepartner');
    }

    public function contacts()
    {
        return view('contacts');
    }

    /*public function uploadedImages($filename)
    {
        return Image::make(storage_path() . '/uploads/' . $filename)->response();

        $path = storage_path() . '/uploads/' . $filename;

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }*/
}
