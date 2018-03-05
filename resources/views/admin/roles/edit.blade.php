@extends('layouts.app')

@section('content')
<div class="block-header">
        <h2>@lang('global.roles.title')</h2>
    </div>
    
    {!! Form::model($role, ['method' => 'PUT', 'route' => ['admin.roles.update', $role->id]]) !!}

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
                    {!! Form::label('permission', 'Permissions', ['class' => '']) !!}
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::select('permission[]', $permissions, old('permission') ? old('permission') : $role->permissions()->pluck('name', 'name'), ['class' => 'form-control', 'multiple' => 'multiple']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('permission'))
                                <p class="help-block">
                                    {{ $errors->first('permission') }}
                                </p>
                            @endif

                        </div>
                    </div>
                    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

