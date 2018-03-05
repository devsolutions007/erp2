@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were problems with input:
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('password/email') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">
                <div class="msg">Reset password</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-line">
                        <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}">
                    </div>
                </div>
                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Reset Password</button>
            </form>
        </div>
    </div>
@endsection