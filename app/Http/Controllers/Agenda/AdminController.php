<?php

namespace App\Http\Controllers\Agenda;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use Carbon\Carbon;

class AdminController extends Controller
{
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
            'datetime' => 'required|datetime_interval'
        ]);

        $datetimes_arr = explode(" / ", $request->datetime);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->start_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[0]);
        $event->end_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[1]);
        $event->image = "";
        $event->save();

        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the nerd
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
            'datetime' => 'required|datetime_interval'
        ]);

        $event = Event::find($id);

        $datetimes_arr = explode(" / ", $request->datetime);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->start_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[0]);
        $event->end_datetime = Carbon::createFromFormat('d-m-Y H:i', $datetimes_arr[1]);
        $event->image = "";
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
        //
    }
}
