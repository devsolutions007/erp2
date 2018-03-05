@extends('layouts.app')

@section('content')
    <div class="block-header">
        <h2>@lang('global.permissions.title')</h2>
    </div>
    
    {!! Form::model($permission, ['method' => 'PUT', 'route' => ['admin.permissions.update', $permission->id]]) !!}


    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        @lang('global.app_edit')
                    </h2>
                </div>
                <div class="body">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::text('name', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
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

