@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ url('login') }}">
        <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
        <div class="login-container">
            <div class="row no-gutters">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12"></div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-box">
                        <a href="#" class="login-logo">
                            <h3><b>Admin Hotbox</b></h3>
                        </a>
                        <div class="input-group">
                            <span class="input-group-addon" id="username"><i class="icon-account_circle"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme"> Remember Me</label>
                        </div>
                        <div class="actions clearfix">
                            <a href="{{ route('auth.password.reset') }}">Forgot Password?</a>
                            <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                      <div class="or"></div>
                      <div class="mt-4">
                        <a href="#" class="additional-link">Don't have an Account? <span>Create Now</span></a>
                      </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12"></div>
                <!-- <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                    <div class="login-slider"></div>
                </div> -->
            </div>
        </div>
    </form>
@endsection