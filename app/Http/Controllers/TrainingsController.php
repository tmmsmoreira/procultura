<?php

namespace App\Http\Controllers;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locations = Training::select('location')->distinct()->get();

        $trainings = Training::when(!empty($request->location), function($q) use ($request) {
            return $q->where('location', $request->location);
        })->when(!empty($request->keyword), function($q) use ($request) {
            return $q->where('title', 'like', "%" . $request->keyword . "%");
        })->when(!empty($request->date), function($q) use ($request) {
            return $q->whereDate('start_datetime', '>=', Carbon::createFromFormat('d/m/Y H:i', $request->date . "00:00"));
        })->orderBy('created_at', 'desc')->limit(10)->get();

        return view('web/trainings/index', compact('trainings', 'locations'));
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

        return view('web/trainings/show', compact('training'));
    }
}
