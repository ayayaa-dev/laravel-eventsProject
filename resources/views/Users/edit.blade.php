@extends('layouts.app')

@section('content')
<div class="x_title">
    <h2>Users manage - Edit user</h2>
    <div class="clearfix"></div>
</div>
<div class="box-body">
    @if( Auth::user()->role=='admi')
        <div class="add">
            <a href="/users" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i> Back</a>
        </div>
    @endif
    <div class="x_content">
        <div class="demo-container">
            <a href="/users" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i> Back to list</a>
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
            <form action="{{ url('edituser/'.$user->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-xs-12 col-sm-12 col-md-12"> 
                <div class="form-group">
                    <label for="role" class="col-sm-3 control-label">Name:</label>
                        <div class="col-sm-2">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12"> 
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password:</label>
                        <div class="col-sm-2">
                            <input type="password" name="password" id="password" class="form-control" minlength="6">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Confirm Password:</label>
                        <div class="col-sm-2">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" minlength="6">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-2">
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" @if( Auth::user()->role!='admin') readonly @endif>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12"> 
                    <div class="form-group">
                        <label for="role" class="col-sm-3 control-label">Role:</label>
                        <div class="col-sm-2">
                            <select name="role" class="from-control input-sm" @if( Auth::user()->role!='admin') disabled @endif>
                                @foreach($roles as $role)
                                <option value="{{$role}}"
                                @if($role==$user->role) selected @endif
                                >{{$role}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update user</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection