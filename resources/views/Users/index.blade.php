@extends('layouts.app')

@section('content')
<div class="box-header with-border">
    <h3 class="box-title"><strong>Users manage</strong></h3>
    <div class="add">
        <a href="adduser" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
    </div>
    <div class="pull-right">
        <form class="form-inline" action="{{ url('userByRole') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Role: </label>
                <select class="form-control input-sm" name="role" onChange=submit();>
                <option value="0">All</option>
                @foreach($roles as $role)
                <option value="{{ $role }}"
                @if(@isset($selectRole) && $role == $selectRole)
                    selected
                @endif>{{ $role }}</option>
                @endforeach
                </select>
            </div>
        </form>
    </div>
</div>
@endsection