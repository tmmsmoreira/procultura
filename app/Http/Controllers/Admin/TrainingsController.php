<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Training;
use DB;
use Carbon\Carbon;
use Image;
use Response;

class TrainingsController extends Controller
{
    protected $validator = [
        'title' => 'required|string|max:200',
        'description' => 'required|string|max:10000',
        'location' => 'required|string',
        'datetime' => 'required|datetime_interval',
        'image' => 'required|image|max:5000|dimensions:min_width=1280,min_height=720'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::get();

        return view('admin/trainings/index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/trainings/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $training = new Training;

        $this->validate($request, $this->validator);

        $datetimes_arr = explode(" / ", $request->datetime);

        $training->title = $request->title;
        $training->description = $request->description;
        $training->location = $request->location;
        $training->start_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[0]);
        $training->end_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[1]);
        $training->image = $this::storeImage($request->file('image'));

        $training->save();

        return redirect('admin/trainings')->with('status', 'Event updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $training = Training::find($id);

        return view('admin/trainings/show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = Training::find($id);

        return view('admin/trainings/edit', compact('training'));
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
        $this->validate($request, $this->validator);

        $training = Training::find($id);

        $datetimes_arr = explode(" / ", $request->datetime);

        $training->title = $request->title;
        $training->description = $request->description;
        $training->location = $request->location;
        $training->start_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[0]);
        $training->end_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[1]);

        if ($request->hasFile("image")) {
            if (Storage::disk('public')->exists($training->image)) {
                Storage::disk('public')->delete($training->image);
            }

            $training->image = $this::storeImage($request->file('image'));
        }

        $training->save();

        return redirect('admin/trainings')->with('status', 'Event updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::destroy($id);

        return redirect('admin/jobs')->with('status', 'Event deleted!');
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        $trainings = Training::destroy($request->ids);

        return $trainings;
    }

    /**
     * Store a specified image into the storage.
     *
     * @param  \Illuminate\Http\Request  $request->file
     * @return String $image_path
     */
    private function storeImage($image)
    {
        $image_path = "trainings/" . Carbon::now()->format('dmY_His') . "_" . str_random(20) . ".jpg";

        $new_img = Image::make($image)->resize(1280, null, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode("jpg");

        Storage::disk('public')->put($image_path, $new_img);

        return $image_path;
    }
}
