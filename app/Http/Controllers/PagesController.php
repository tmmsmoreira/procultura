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

    public function showEvent($id)
    {
        $event = Event::find($id);

        return view('events/show', compact('event'));
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
