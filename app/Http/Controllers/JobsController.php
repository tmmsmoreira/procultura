<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Job;
use DB;
use Carbon\Carbon;
use Image;
use Response;

class JobsController extends Controller
{
    protected $validator = [
        'title' => 'bail|required|string|max:200',
        'description' => 'required|string|max:1500',
        'location' => 'required|string',
        'image' => 'required|image|max:5000|dimensions:min_width=1280,min_height=720'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locations = Job::select('location')->distinct()->get();

        $jobs = Job::when(!empty($request->location), function($q) use ($request) {
            return $q->where('location', $request->location);
        })->when(!empty($request->keyword), function($q) use ($request) {
            return $q->where('title', 'like', "%" . $request->keyword . "%");
        })->get();

        return view('web/jobs/index', compact('jobs', 'locations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $job = Job::find($id);

        return view('web/jobs/show', compact('job'));
    }

    /**
     * Display a interval listing of resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $locations = Job::select('location')->distinct()->get();
        $jobs = Job::where('location', $request->location)->get();

        return view('web/jobs/index', compact('jobs', 'locations'));
    }
}
