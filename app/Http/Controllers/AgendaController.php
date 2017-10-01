<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
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
        'image' => 'require d|image|max:5000|dimensions:min_width=1280,min_height=720'
    ];

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locations = Event::select('location')->distinct()->get();

        $events = Event::when(!empty($request->location), function($q) use ($request) {
            return $q->where('location', $request->location);
        })->when(!empty($request->keyword), function($q) use ($request) {
            return $q->where('title', 'like', "%" . $request->keyword . "%");
        })->when(!empty($request->date), function($q) use ($request) {
            return $q->whereDate('start_datetime', '>=', Carbon::createFromFormat('d/m/Y H:i', $request->date . "00:00"));
        })->orderBy('created_at', 'desc')->limit(10)->get();

        return view('web/events/index', compact('events', 'locations'));
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

        return view('web/events/show', compact('event'));
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
        $locations = Event::select('location')->distinct()->get();
        $events = Event::where('location', $request->location)->get();

        return view('web/events/index', compact('events', 'locations'));
    }
}
