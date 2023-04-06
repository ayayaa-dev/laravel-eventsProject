@extends ('layouts/appLogin')

@section('content')
<hr>
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
           @include('common.errors')
            <p class="login-box-msg">Sign up</p>
            <form action="{{ url('signup') }}" method="POST">
                {{ csrf_field() }}
                <h1>Sign up form</h1>
                <div>
                    <label>Username</label>
                    <input type="text" name="name" placeholder="Username" required autofocus>
                </div>
                <div>
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div>
                    <label>Confirm password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-default submit" name="signup"><i class="fa fa-sign-in"></i> Sign up</button>
                </div>
                <div class="clearfix"></div>
                <h1><i class="fa fa-cubes"></i> Signup form</h1>
                <p>&copy; 2023 Daniil Divissenko. JPTV20. IVKHK</p>
            </form>
        </section>
    </div>
</div>
@endsection