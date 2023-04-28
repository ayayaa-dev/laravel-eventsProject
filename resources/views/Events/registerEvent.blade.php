@extends ('layouts.appMain')

@section('content')
<div>
    <div class="text-center">
        <h1>Event: {{ $event->title }}</h1>
    </div>
    <div class="container" style="width: 70%;display: flex;flex-direction: column;">
        <div class="img">
            <img src="{{ asset('images/'.$event->image) }}" alt="Event thumbnail" style="width: 500px;height:250px">
        </div>
        <div class="event-info w-25 mx-5">
            <b>Event date: {{ Carbon\Carbon::parse($event->date_event)->format('d.m.Y') }}</b>
            <b>Adress: {{ $event->aadress }}</b>
        </div>
    </div>
    <form action="{{ url('registerevent/'.$event->id) }}" method="POST" enctype="multipart/form-data">
        <h2>Registration form</h2>
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <div class="form-group">
                <strong>Your first name:</strong>
                <input type="text" name="firstName" id="firstName" class="form-control" value="" placeholder="First name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <div class="form-group">
                <strong>Your last name:</strong>
                <input type="text" name="lastName" id="lastName" class="form-control" value="" placeholder="Last name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" id="email" class="form-control" value="" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone number:</strong>
                <input type="tel" name="phone" id="phone" class="form-control" value="" placeholder="Phone number">
            </div>
        </div>
    </form>
    <div class="d-flex justify-content-center mt-4">
        <a href="../events" class="btn btn-primary">Back to event list</a>
    </div>
</div>
@endsection