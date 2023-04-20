@extends('layouts.appMain')

@section('content')
<h1 class="text-center">Welcome to Events main page</h1>
<hr>
<div class="d-flex justify-content-evenly">
    @foreach ($events as $event)
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('images/'.$event->image) }}" class="card-img-top" alt="Event thumbnail" style="height: 160px">
        <div class="card-body">
            <h5 class="card-title">{{ $event->title }}</h5>
            <p class="card-text">Event date: {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}</p>
            <a href="{{ url('show/'.$event->id) }}" class="btn btn-primary">More info</a>
        </div>
    </div>
    @endforeach
</div>
@endsection