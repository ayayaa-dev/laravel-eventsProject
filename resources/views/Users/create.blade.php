@extends('layouts.app')

@section('content')
<div class="x_title">
    <h2>Users manage - Add user</h2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="demo-container">
        <a href="users" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i> Back to list</a>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li></li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <!-- Display Validation Errors -->
        @include('common.errors') 
        <form action="{{ url('adduser')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-xs-12 col-sm-12 col-md-12"> 
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" id="name" class="form-control" value="" placeholder="Name">            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12"> 
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" minlength="6" required>                
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" minlength="6" required>                    
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
                    <strong>Role:</strong>                    
                    <select name="role" class="from-control input-sm">
                        @foreach($roles as $role)
                        <option value="{{$role}}"
                        @if($role=='user') selected @endif
                        >{{$role}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add user</button>
            </div>
        </form>
    </div>
</div>
@endsection