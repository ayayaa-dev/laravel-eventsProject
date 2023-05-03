<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Register_event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function listLimit()
    {
        $events = Event::orderBy('date_event', 'desc')->take(3)->get();
        return view('startMainPage', compact('events'));
    }
    public function fullList()
    {
        $events = Event::orderBy('date_event', 'desc')->get();
        return view('events.eventList', compact('events'));
    }
    public function search(Request $request)
    {
        $events = Event::where('title', 'LIKE', '%'. request('search').'%')->get();

        return view('events.searchResult', compact('events'))->with('events', $events);
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

    public function registerEventPage(Event $event)
    {
        return view('events.registerEvent', compact('event'));
    }
    public function registerEvent(Request $request, Event $event) 
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'group' => 'required|string|max:8',
            'memberCount' => 'required|numeric|max:255',
        ]);
        Register_event::create([
            'contact_person' => $request->fullName,
            'email' => $request->email,
            'phone' => $request->phone,
            'group_name' => $request->group,
            'number_members' => $request->memberCount,
            'events_id' => rtrim($event->id),
        ]);
        return view('events.registerResult', compact('event', 'request'));
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
