@extends('layouts.app')

@section('content')
    <div class="block-header">
        <h2>@lang('global.permissions.title')</h2>
    </div>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.permissions.store']]) !!}

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        @lang('global.app_create')
                    </h2>
                </div>
                <div class="body">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
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
                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger waves-effect']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

