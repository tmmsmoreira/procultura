<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use DB;
use Carbon\Carbon;
use Image;
use Response;

class AgendaController extends Controller
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
        $events = Event::get();

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

        $this->validate($request, $this->validator);

        $datetimes_arr = explode(" / ", $request->datetime);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->start_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[0]);
        $event->end_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[1]);
        $event->image = $this::storeImage($request->file('image'));

        $event->save();

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
        $this->validate($request, $this->validator);

        $event = Event::find($id);

        $datetimes_arr = explode(" / ", $request->datetime);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->start_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[0]);
        $event->end_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[1]);

        if ($request->hasFile("image")) {
            if (Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }

            $event->image = $this::storeImage($request->file('image'));
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

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        $events = Event::destroy($request->ids);

        return $events;
    }

    /**
     * Store a specified image into the storage.
     *
     * @param  \Illuminate\Http\Request  $request->file
     * @return String $image_path
     */
    private function storeImage($image)
    {
        $image_path = "agenda/" . Carbon::now()->format('dmY_His') . "_" . str_random(20) . ".jpg";

        $new_img = Image::make($image)->resize(1280, null, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode("jpg");

        Storage::disk('public')->put($image_path, $new_img);

        return $image_path;
    }
}
