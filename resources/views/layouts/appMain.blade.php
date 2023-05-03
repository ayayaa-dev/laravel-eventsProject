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
    <link rel="stylesheet" href='{{ asset("components/css/style.css") }}'>
    <title>Events Manager</title>
</head>
<body>
    <header>
        <div class="navbar navbar-default bg-dark" role="navigation" style="justify-content: center;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Events Manager</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/events') }}">Events</a>
                            </li>
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}" class="nav-link">Login</a></li>
                            <li><a href="{{ url('/register') }}" class="nav-link">Register</a></li>
                            @else
                            <li><a href="{{ url('/dashboard') }}" class="nav-link">Admin panel</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href={{url('/profile/'.Auth::user()->id )}}>Profile</a></li>
                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                        <form class="d-flex" method="GET" action="{{ url('/search') }}">
                            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <section>
            <div class="container" style="width: 60%">
                <div class="row">
                    <div class="col-md-12">                    
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <hr>
        <div>
            <p>&copy; 2023 IVKHK. Daniil Divissenko. JPTV20</p>					
		</div>
	</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>