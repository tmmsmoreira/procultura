<?php

namespace App\Http\Controllers;

use File;
use Image;
use App\Event;

class PagesController extends Controller
{
    public function soon()
    {
        return view('welcome');
    }

    public function home()
    {
        $events = Event::all();

        return view('home', compact('events'));
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
