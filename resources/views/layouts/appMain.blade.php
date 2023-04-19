<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href='{{ asset("components/bootstrap/dist/css/bootstrap.min.css") }}' rel="stylesheet">
    {{-- <link href='{{ asset("components/js/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") }}' rel="stylesheet">	 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href='{{ asset("components/css/font-awesome/css/font-awesome.min.css") }}' rel="stylesheet"> 
    <!-- Custom Theme Style -->
    <link href='{{ asset("components/css/custom.min.css") }}' rel="stylesheet">
    <title>Main Page</title>
</head>
<body>
    <header>
        <div class="navbar navbar-default bg-dark" role="navigation">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- menu -->
                <div class="collapse navbar-collapse">
                    <div class="navbar-left">
                        <a class="navbar-brand" href="#">Navbar</a> 
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav navbar-left">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/events') }}">Events</a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-right">
                        <!-- Right Side Of Navbar -->
                        <form class="d-flex" method="GET" action="{{ url('/search') }}">
                            <input placeholder="Search event " type="text" name="search" class="me-sm-2 form-control">  
                            <button type="submit" class="btn btn-outline-success">Search</button>
                        </form>
                        <ul class="navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}" class="nav-link">Login</a></li>
                            <li><a href="{{ url('/register') }}" class="nav-link">Register</a></li>
                            @else
                            <li><a href="{{ url('/dashboard') }}" class="nav-link">Admin panel</a></li>
                            <div class="dropdown ms-5">
                                <a class="btn dropdown-toggle text-white mx-0 my-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href={{url('/profile/'.Auth::user()->id )}}>Profile</a></li>
                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                </ul>
                            @endif
                        </ul>
                    </div>    
                </div>
            </nav>
        </div>
    </header>
        <!-- Left Side Of Navbar -->
        {{-- <div class="me-auto navbar-nav">
        </div> --}}
        <main>
            <section>
                <div class="container">
                    <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Welcome to Events main page</h1>
                        <hr>
                        <div>
                            @yield('content');
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>