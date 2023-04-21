@extends('layouts.appMain')

@section('content')
<div>
    <div class="text-center">
        <h1>{{ $event->title }}</h1>
    </div>
    <div class="container" style="width: 70%;display: flex;justify-content: center;">
        <div class="img">
            <img src="{{ asset('images/'.$event->image) }}" alt="Event thumbnail" style="width: 500px;height:250px">
        </div>
        <div class="event-info w-25 mx-5">
            <h2 style="font-size:1.5rem;">Event description:</h2>
            <p style="font-size:1.1rem;">{{ $event->description }}</p>
            <b>Event date: {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}</b>
            <b>Adress: {{ $event->aadress }}</b>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <a href="../events" class="btn btn-primary">Back to event list</a>
        <a href="#" class="btn btn-primary">Register for the event</a>
    </div>
</div>
@endsection