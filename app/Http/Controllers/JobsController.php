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
        if ($request->is('admin/*')) {
            $jobs = Job::get();

            return view('admin/jobs/index', compact('jobs'));
        } else {
            $locations = Job::select('location')->distinct()->get();

            $jobs = Job::when(!empty($request->location), function($q) use ($request) {
                return $q->where('location', $request->location);
            })->when(!empty($request->keyword), function($q) use ($request) {
                return $q->where('title', 'like', "%" . $request->keyword . "%");
            })->get();

            return view('jobs/index', compact('jobs', 'locations'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->is('admin/*')) {
            return view('admin/jobs/create');
        }

        return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->is('admin/*')) {
            $this->validate($request, $this->validator);

            $job = new Job;

            $job->title = $request->title;
            $job->description = $request->description;
            $job->location = $request->location;
            $job->image = $this::storeImage($request->file('image'));

            $job->save();

            return redirect('admin/jobs')->with('status', 'Job updated!');
        }

        return;
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

        if ($request->is('admin/*')) {
            return view('admin/jobs/show', compact('job'));
        }

        return view('jobs/show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->is('admin/*')) {
            $job = Job::find($id);

            return view('admin/jobs/edit', compact('job'));
        }

        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->is('admin/*')) {
            $this->validate($request, $this->validator);

            $job = Job::find($id);

            $job->title = $request->title;
            $job->description = $request->description;
            $job->location = $request->location;

            if ($request->hasFile("image")) {
                if (Storage::disk('public')->exists($job->image)) {
                    Storage::disk('public')->delete($job->image);
                }

                $job->image = $this::storeImage($request->file('image'));
            }

            $job->save();

            return redirect('admin/jobs')->with('status', 'Job updated!');
        }

        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($request->is('admin/*')) {
            $job = Job::destroy($id);

            return redirect('admin/jobs')->with('status', 'Job deleted!');
        }

        return;
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        $jobs = Job::destroy($request->ids);

        return $jobs;
    }

    /**
     * Store a specified image into the storage.
     *
     * @param  \Illuminate\Http\Request  $request->file
     * @return String $image_path
     */
    private function storeImage($image)
    {
        $image_path = "jobs/" . Carbon::now()->format('dmY_His') . "_" . str_random(20) . ".jpg";

        $new_img = Image::make($image)->resize(1280, null, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode("jpg");

        Storage::disk('public')->put($image_path, $new_img);

        return $image_path;
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

        return view('jobs/index', compact('jobs', 'locations'));
    }
}
