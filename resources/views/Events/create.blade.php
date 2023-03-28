@extends('layouts.app')

@section('content')
<div class="x_title">
    <h2>Events manage - Add event</h2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="demo-container">
        <a href="eventlist" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i> Back to list</a>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li></li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url('addevent') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Event date:</strong>
                    <input type="text" name="date_event" class="form-control" placeholder="Event date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="aadress" class="form-control" placeholder="Address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea type="text" name="description" class="form-control" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" value="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add event</button>
            </div>
        </form>
    </div>
</div>
@endsection