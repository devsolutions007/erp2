@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="block-header">
        <h2>@lang('global.roles.title')</h2>
    </div>
    <p>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-success waves-effect">@lang('global.app_add_new')</a>
    </p>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2> @lang('global.app_list')</h2>
                </div>
                <div class="body table-responsive">
                    <table class="table table-bordered table-striped table-hover js-exportable {{ count($roles) > 0 ? 'datatable' : '' }}">
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>@lang('global.roles.fields.name')</th>
                                <th>@lang('global.roles.fields.permission')</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($roles) > 0)
                                @foreach ($roles as $key => $role)
                                    <tr data-entry-id="{{ $role->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions()->pluck('name') as $permission)
                                                <span class="label label-info label-many">{{ $permission }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.roles.edit',[$role->id]) }}" class="btn btn-xs btn-info waves-effect">@lang('global.app_edit')</a>
                                            {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                'route' => ['admin.roles.destroy', $role->id])) !!}
                                            {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger  waves-effect')) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">@lang('global.app_no_entries_in_table')</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
    </script>
@endsection