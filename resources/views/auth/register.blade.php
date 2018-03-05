@extends('layouts.auth')

@section('content')
<div class="card">
    <div class="body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
            <div class="msg">Register a new membership</div>
            <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">person</i>
                </span>
                <div class="form-line">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name Surname" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">email</i>
                </span>
                <div class="form-line">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">lock</i>
                </span>
                <div class="form-line">
                    <input id="password" type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">lock</i>
                </span>
                <div class="form-line">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="Confirm Password" required>
                </div>
            </div>
            <!-- <div class="form-group">
                <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
            </div> -->

            <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

            <div class="m-t-25 m-b--5 align-center">
                <a href="#">You already have a membership?</a>
            </div>
        </form>
    </div>
</div>

@endsection
