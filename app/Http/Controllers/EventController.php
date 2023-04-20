<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function listLimit(){
        $events = Event::orderBy('date_event', 'desc')->take(3)->get();
        return view('startMainPage', compact('events'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('date_event', 'asc')->get();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_event' => 'required',
            'aadress' => 'required',
        ]);
        $data = $request->all(); // get data from form
        $filename = $request->file('image')->getClientOriginalName(); // get name of the image file
        $data['image'] = $filename; // save file name to DB
        Event::create($data); // insert data into DB
        $file = $request->file('image');
        // upload the image to root/images/
        if ($filename) {
            $file->move('../public/images/', $filename); // upload the image
        }
        return redirect('/eventlist'); // returns to event list
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.detail', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_event' => 'required',
            'aadress' => 'required',
        ]);
        $data = $request->all(); // get data from form
        if ($request->file('image')){
            $filename = $request->file('image')->getClientOriginalName(); // get name of the image file
            $data['image'] = $filename; // save file name to DB

            // upload the image to root/images/
            $file = $request->file('image'); //image path
            if ($filename) {
                $file->move('../public/images/', $filename); // upload the image
            }
        }
        $event->update($data); // update data
        return redirect('/eventlist'); // returns to event list
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event -> delete(); // delete event
        return redirect('/eventlist'); // returns to event list
    }
}
