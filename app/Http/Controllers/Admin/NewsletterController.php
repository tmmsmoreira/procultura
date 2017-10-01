<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\NewsletterContact;

use File;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = NewsletterContact::all();

        return view('admin/newsletter/index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new NewsletterContact;

        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $contact->email = $request->email;
        $contact->save();

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
        //
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
        //
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
            $contact = NewsletterContact::destroy($id);

            return redirect('admin/newsletter')->with('status', 'Contact deleted!');
        }

        return;
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy(Request $request)
    {
        $contacts = NewsletterContact::destroy($request->ids);

        return $contacts;
    }

    /**
     * Export list of contacts
     *
     * @param  \Illuminate\Http\Request $request
     * @return -
     */
    public function export(Request $request)
    {
        $contacts = NewsletterContact::select('email')->get()->pluck("email")->toArray();

        Storage::disk('local')->put("contacts.csv", "\"Email Address\"\n" . implode("\n", $contacts));

        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"'
        );

        $file = storage_path("app/contacts.csv");

        return response()->download($file, "contacts.csv", $headers)->deleteFileAfterSend(true);
    }
}
