@extends('layouts.appMain')

@section('content')
<h1 class="text-center">Search result</h1>
<hr>
<div class="d-flex justify-content-evenly flex-wrap">
    @foreach ($events as $event)
    <div class="d-flex justify-content-center">
        <div class="card mx-3 mt-3" style="width: 18rem;">
            <img src="{{ asset('images/'.$event->image) }}" class="card-img-top" alt="Event thumbnail" style="height: 200px; width:100%">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">Event date: {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}</p>
                <a href="{{ url('show/'.$event->id) }}" class="btn btn-primary">More info</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection