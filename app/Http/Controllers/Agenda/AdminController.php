<?php

namespace App\Http\Controllers\Agenda;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use Carbon\Carbon;
use Image;

class AdminController extends Controller
{
    protected $storage_path = "uploads/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('admin/events/index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/events/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;

        $this->validate($request, [
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:600',
            'location' => 'required|string',
            'datetime' => 'required|datetime_interval',
            'image' => 'required|image|max:5000|dimensions:min_width=1920,min_height=1080'
        ]);

        $datetimes_arr = explode(" / ", $request->datetime);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->start_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[0]);
        $event->end_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[1]);
        $event->image = "agenda/" . Carbon::now()->format('dmY_His') . "_" . str_random(20) . ".jpg";

        $new_img = Image::make($request->file("image"))->resize(1920, null, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode("jpg");

        Storage::put($this->storage_path . $event->image, $new_img);

        $event->save();

        //return $request->all();
        return redirect('admin/events')->with('status', 'Event updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('admin/events/show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('admin/events/edit', compact('event'));
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
        $this->validate($request, [
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:600',
            'location' => 'required|string',
            'datetime' => 'required|datetime_interval',
            'image' => 'required|image|max:5000|dimensions:min_width=1920,min_height=1080'
        ]);

        $event = Event::find($id);

        $datetimes_arr = explode(" / ", $request->datetime);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->start_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[0]);
        $event->end_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[1]);

        if ($request->hasFile("image")) {
            $ext = pathinfo(storage_path($this->storage_path . $event->image), PATHINFO_EXTENSION);

            if (Storage::exists($this->storage_path . $event->image)) {
                Storage::delete($this->storage_path . $event->image);
            }

            $event->image = "agenda/" . Carbon::now()->format('dmY_His') . "_" . str_random(20) . ".jpg";

            $new_img = Image::make($request->file("image"))->resize(1920, null, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode("jpg");

            Storage::put($this->storage_path . $event->image, $new_img);
        }

        $event->save();

        return redirect('admin/events')->with('status', 'Event updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::destroy($id);

        return redirect('admin/events')->with('status', 'Event deleted!');
    }
}
