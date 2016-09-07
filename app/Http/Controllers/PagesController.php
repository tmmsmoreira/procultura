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

    public function uploadedImages($filename)
    {
        $path = storage_path() . '/uploads/images/' . $filename;

        if(!\File::exists($path)) abort(404);

        $file = \File::get($path);
        $type = \File::mimeType($path);

        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
