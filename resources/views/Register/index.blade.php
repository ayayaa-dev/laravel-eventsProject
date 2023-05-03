@extends('layouts.app')

@section('content')
<div class="x_title">
    <h2>Manage registration list</h2>
    <div class="clearfix"></div>
</div>
    <div class="x_content">
        @if (count($register_events ?? '') > 0)
            <table id="database" class="table table-light table-hover table-bordered">
                <thead>
                    <tr>
                        <th width="10%">id</th>
                        <th width="20%">Name</th>
                        <th width="15%">Email</th>
                        <th width="15%">Phone</th>
                        <th width="20%">Group name</th>
                        <th width="10%">Members number</th>
                        <th width="10%">Event ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($register_events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->contact_person }}</td>
                            <td>{{ $event->email }}</td>
                            <td>{{ $event->phone }}</td>
                            <td>{{ $event->group_name }}</td>
                            <td>{{ $event->number_members }}</td>
                            <td><a href="/editevent/{{ $event->events_id }}">{{ $event->events_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Data is empty</p>
        @endif
        </form>
    </div>
@endsection