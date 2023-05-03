@extends('layouts.appMain')

@section('content')
<h1 class="text-center my-5">Event Information</h1>
<div class="card w-75" style="margin: 30px auto; max-width: 900px">
    <img src="{{ asset('images/' . $event->image) }}" class="w-100 h-100" alt="" style="object-fit: cover">
    <div class="card-body">
        <p class="card-text" style="font-size: 18px;">
            <b>Event date:</b> {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}
        </p>
        <p class="card-text fs-5">
            <b>Address:</b> {{ $event->aadress }}
        </p>
        <p class="card-text" style="font-size: 18px;">{{ $event->description }}</p>
        <p class="card-text border-top pt-2">
            You have successfully registered to this event: <br>
            Group: {{ $request->group }} <br>
            Members: {{ $request->memberCount }}
        </p>
        <a href="/" class="btn btn-primary absolute-top ml-3 mt-3">Back to events</a>
    </div>
</div>
@endsection