<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href='{{ asset("components/bootstrap/dist/css/bootstrap.min.css") }}' rel="stylesheet">
    <link href='{{ asset("components/js/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") }}' rel="stylesheet">	  	
    <!-- Font Awesome -->
    <link href='{{ asset("components/css/font-awesome/css/font-awesome.min.css") }}' rel="stylesheet"> 
    <!-- Custom Theme Style -->
    <link href='{{ asset("components/css/custom.min.css") }}' rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="navbar-collapse collapse" id="collapsibleNavbar">
        <!-- Left Side Of Navbar -->
        <div class="me-auto navbar-nav">
            <a class="navbar-brand" href="{{ url('/') }}">Home</a>
            <a class="navbar-brand" href="{{ url('/events') }}">Events</a>
        </div>
        <form class="d-flex" method="GET" action="{{ url('/search') }}">
            <input placeholder="Search event " type="text" name="search" class="me-sm-2 form-control">
            <button type="submit" class="btn btn-outline-success">Search</button>
        </form>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right" style="padding-left: 10px;">
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}" class="navbar-brand">Login</a></li>
            <li><a href="{{ url('/register') }}" class="navbar-brand">Register</a></li>
            @else
            <li><a href="{{ url('/dashboard') }}" class="navbar-brand">Admin panel</a></li>
            <div class="dropdown ms-5">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    <li><a class="dropdown-item" href={{url('/profile/'.Auth::user()->id )}}>Profile</a></li>
                </ul>
            </div>
            @endif
        </ul>
    </div>
</body>
</html>