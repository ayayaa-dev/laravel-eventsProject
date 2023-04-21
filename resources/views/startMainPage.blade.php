@extends('layouts.appMain')

@section('content')
<h1 class="text-center">Welcome!</h1>
<hr>
<div>
    <div class="d-flex justify-content-end" style="width:80%">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="d-flex justify-content-center">
        @foreach ($events as $event)
        <div class="card mx-3" style="width: 18rem;">
            <img src="{{ asset('images/'.$event->image) }}" class="card-img-top" alt="Event thumbnail" style="height: 160px">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">Event date: {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}</p>
                <a href="{{ url('show/'.$event->id) }}" class="btn btn-primary">More info</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection