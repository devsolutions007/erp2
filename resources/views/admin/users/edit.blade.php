@extends('layouts.app')

@section('content')
    <div class="block-header">
        <h2>@lang('global.users.title')</h2>
    </div>
    
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id]]) !!}


    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        @lang('global.app_edit')
                    </h2>
                </div>
                <div class="body">
                    {!! Form::label('name', 'Name*', ['class' => '']) !!}
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    {!! Form::label('username', 'Username*', ['class' => 'control-label']) !!}
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('username'))
                                <p class="help-block">
                                    {{ $errors->first('username') }}
                                </p>
                            @endif

                        </div>
                    </div>

                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif

                        </div>
                    </div>


                    {!! Form::label('password', 'Password*', ['class' => 'control-label']) !!}
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('password'))
                                <p class="help-block">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif

                        </div>
                    </div>


                    {!! Form::label('roles', 'Roles*', ['class' => 'control-label']) !!}
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::select('roles[]', $roles, old('roles') ? old('role') : $user->roles()->pluck('name', 'name'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('roles'))
                                <p class="help-block">
                                    {{ $errors->first('roles') }}
                                </p>
                            @endif

                        </div>
                    </div>


                    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger waves-effect']) !!}
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop

