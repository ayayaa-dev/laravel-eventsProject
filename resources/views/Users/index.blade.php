@extends('layouts.app')

@section('content')
<div class="x_title">
    <h2>Users manage</h2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="demo-container" style="min-height:250px;">
        <a href="adduser" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
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
        <div style="display:flex;align-items:center;flex-direction:column;">
        @if (count($users ?? '') > 0)
        <table id="datatable" class="table table-light table-hover table-bordered" style="width:40%">
            <thead>
                <tr>
                    <th width="15%">Name</th>
                    <th width="15%">Email</th>
                    <th width="10%">Role</th>                    
                    <th width="1%">Action</th>  
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>                
                    <td>
                        <form action="{{ url('users/'.$user->id) }}" method="POST">
                            <a href="{{ url('edituser/'.$user->id) }}" title="edit"><i class="fa fa-edit"></i></a>                            
                            {{ csrf_field()}}
                            {{-- {{ method_field('DELETE')}}
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-link" style="padding:0;"><i class="fa fa-btn fa-trash"></i></button>           --}}
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <p>Data not found</p>
        @endif
        </div>
    </div>
</div>
@endsection