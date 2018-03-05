@extends('layouts.app')

@section('content')
    <div class="block-header">
        <h2>Change password</h2>
    </div>

    @if(session('success'))
        <!-- If password successfully show message -->
        <div class="row">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @else
        {!! Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]) !!}
        <!-- If no success message in flash session show change password form  -->

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            @lang('global.app_edit')
                        </h2>
                    </div>
                    <div class="body">
                        {!! Form::label('current_password', 'Current password*', ['class' => 'control-label']) !!}
                        <div class="form-group">
                            <div class="form-line">
                                {!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('current_password'))
                                    <p class="help-block">
                                        {{ $errors->first('current_password') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        {!! Form::label('new_password', 'New password*', ['class' => 'control-label']) !!}
                        <div class="form-group">
                            <div class="form-line">
                                {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('new_password'))
                                    <p class="help-block">
                                        {{ $errors->first('new_password') }}
                                    </p>
                                @endif

                            </div>
                        </div>

                        {!! Form::label('new_password_confirmation', 'New password confirmation*', ['class' => 'control-label']) !!}
                        <div class="form-group">
                            <div class="form-line">
                                {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('new_password_confirmation'))
                                    <p class="help-block">
                                        {{ $errors->first('new_password_confirmation') }}
                                    </p>
                                @endif

                            </div>
                        </div>


                        {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger waves-effect']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    @endif
@stop

