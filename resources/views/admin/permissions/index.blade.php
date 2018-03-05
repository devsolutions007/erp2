@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="block-header">
        <h2>@lang('global.permissions.title')</h2>
    </div>
    <p>
        <a href="{{ route('admin.permissions.create') }}" class="btn btn-success waves-effect">@lang('global.app_add_new')</a>
    </p>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2> @lang('global.app_list')</h2>
                </div>
                <div class="body table-responsive">
                    <table class="table table-bordered table-striped table-hover js-exportable {{ count($permissions) > 0 ? 'datatable' : '' }}">
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>@lang('global.permissions.fields.name')</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($permissions) > 0)

                                @foreach ($permissions as $key => $permission)
                                    <tr data-entry-id="{{ $permission->id }}">
                                        <td>{{ $key+1}}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.permissions.edit',[$permission->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                            {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                'route' => ['admin.permissions.destroy', $permission->id])) !!}
                                            {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                            {!! Form::close() !!}
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">@lang('global.app_no_entries_in_table')</td>
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
        window.route_mass_crud_entries_destroy = '{{ route('admin.permissions.mass_destroy') }}';
    </script>
@endsection