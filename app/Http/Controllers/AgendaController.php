<?php

namespace App\Http\Controllers;

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
        'description' => 'required|string|max:600',
        'location' => 'required|string',
        'datetime' => 'required|datetime_interval',
        //'image' => 'required|image|max:5000|dimensions:min_width=1280,min_height=720'
    ];

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->is('admin/*')) {
            $events = Event::get();

            return view('admin/events/index', compact('events'));
        } else {
            $locations = DB::table('events')->select('location')->distinct()->get();

            $events = Event::when(!empty($request->location), function($q) use ($request) {
                return $q->where('location', $request->location);
            })->when(!empty($request->keyword), function($q) use ($request) {
                return $q->where('title', 'like', "%" . $request->keyword . "%");
            })->when(!empty($request->date), function($q) use ($request) {
                return $q->whereDate('start_datetime', '>=', Carbon::createFromFormat('d/m/Y H:i', $request->date . "00:00"));
            })->get();

            return view('events/index', compact('events', 'locations'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->is('admin/*')) {
            return view('admin/events/create');
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
        $event = Event::find($id);

        if ($request->is('admin/*')) {
            return view('admin/events/show', compact('event'));
        }

        return view('events/show', compact('event'));
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
            $event = Event::find($id);

            return view('admin/events/edit', compact('event'));
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
            $event = Event::destroy($id);

            return redirect('admin/events')->with('status', 'Event deleted!');
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
        $event = Event::destroy($request->ids);

        return $event;
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

    /**
     * Display a interval listing of resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function lazy(Request $request)
    {
        $result = Event::all();

        $events = array();
        foreach($result as $event) {
            $aux = (object) array();
            $aux->title = $event->title;
            $aux->start = $event->start_datetime->toIso8601String();
            $aux->end = $event->end_datetime->toIso8601String();
            $aux->url = "events/" . $event->id;
            $aux->color = "#B20000";
            $aux->borderColor = "#222";
            array_push($events, $aux);
        }

        return Response::json($events);
    }

    /**
     * Display a interval listing of resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $locations = DB::table('events')->select('location')->distinct()->get();

        $events = Event::where('location', $request->location)->get();

        return view('events/index', compact('events', 'locations'));
    }
}
