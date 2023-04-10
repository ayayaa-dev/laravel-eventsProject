@extends('layouts.app')

@section('content')
<div class="x_title">
    <h3>Dashboard start page</h3>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="demo-container" style="height:250px;">
        <h4>Welcome to admin dahsboard</h4>
        <div>
            <br>
            @can('isAdmin')
            <div class="btn btn-danger btn-lg">
                You have Admin privileges
            </div>
            @elsecan('isManager')
            <div class="btn btn-success btn-lg">
                You have Manager privileges
            </div>
            @elsecan('isUser')
            <div class="btn btn-primary btn-lg">
                You have User privileges
            </div>
            @else
            <div class="btn btn-danger btn-lg">
                You are not logged in
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection