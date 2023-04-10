@extends ('layouts/appLogin')

@section('content')
<hr>
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            @if(session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
            <form action="{{ url('login') }}" method="POST">
                @csrf
                <h1>Log in form</h1>
                <div>
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-default submit" name="login"><i class="fa fa-sign-in"></i> Log in</button>
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <p class="change_link">
                        <a href="/register" class="to_register"> Create account</a>
                    </p>
                    <div class="clearfix"></div>
                    <br>
                    <div>
                        <h1><i class="fa fa-cubes"></i> Log in form</h1>
                        <p>&copy; 2023 Daniil Divissenko. JPTV20. IVKHK</p>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
@endsection