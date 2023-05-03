@extends ('layouts.appMain')

@section('content')
<div>
    <div class="text-center">
        <h1>Event: {{ $event->title }}</h1>
    </div>
    <div class="container" style="width: 70%;display: flex;">
        <div class="img">
            <img src="{{ asset('images/'.$event->image) }}" alt="Event thumbnail" style="width: 500px;height:250px">
        </div>
        <div class="event-info w-25 mx-5">
            <p><b>Event date: {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}</b></p>
            <p><b>Adress: {{ $event->aadress }}</b></p>
            <p><b>Description:</b> {{ $event->description }}</p>
        </div>
    </div>
    <br>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @include('common.errors')
    <div class="d-flex justify-content-center">
        <form action="{{ url('registerEvent/'.$event->id) }}" method="POST" enctype="multipart/form-data" class="px-3 w-50 my-2 mx-auto">
            @csrf
            <h2 class="text-center">Registration form</h2>
            <div class="form-container my-2"> 
                <div class="form-group">
                    <strong>Your full name:</strong>
                    <input type="text" name="fullName" id="fullName" class="form-control" value="" placeholder="Full name">
                </div>
            </div>
            <div class="form-container my-2">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" id="email" class="form-control" value="" placeholder="Email">
                </div>
            </div>
            <div class="form-container my-2">
                <div class="form-group">
                    <strong>Phone number:</strong>
                    <input type="tel" name="phone" id="phone" class="form-control" value="" placeholder="Phone number">
                </div>
            </div>
            <div class="form-container my-2"> 
                <div class="form-group">
                    <strong>Group name:</strong>
                    <input type="text" name="group" id="group" class="form-control" value="IVKHK" placeholder="group">
                </div>
            </div>
            <div class="form-container my-2"> 
                <div class="form-group">
                    <strong>Number of members:</strong>
                    <input type="text" name="memberCount" id="memberCount" class="form-control" value="" placeholder="# of members">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="../events" class="btn btn-primary">Back to event list</a>
            </div>
        </form>
    </div>
</div>
@endsection