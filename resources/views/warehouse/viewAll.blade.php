@extends('layouts.app')

@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <div class="card-header">List of Warehouses</div> 
            <div class="card-body">
                @if(Session::has('message'))
                <div class="gutters row">
                    <div class="col-md-12 session-message">
                        <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}<button type="button" class="close-session-message close pull-right" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></p>
                    </div> 
                </div>   
                @endif
                <table id="datatableInitialize" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ref.</th>
                            <th>Short name location</th>
                            <th>Physical stock</th>
                            <th>Input stock value</th>
                            <th>Value for sell</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $warehouses as $key => $warehouse )
                        <tr id="warehouse_row{{$key}}">
                            <td>{{$key+1}}</td>
                            <td>{{ $warehouse->label }}</td>
                            <td>{{ $warehouse->short_location_name }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ ($warehouse->status == 1) ? 'Open' : 'Close'}}</td>
                            <td width="200">
                                <a href="/warehouse/details/{{ $warehouse->id}}" class="btn btn-sm btn-info"><span class="icon-eye"></span></a>
                                <a href="/warehouse/edit/{{ $warehouse->id}}" class="btn btn-sm btn-primary"><span class="icon-edit"></span></a>
                                <a href="#" class="btn btn-sm btn-warning" onclick='deleteCustomer( "{{$warehouse->id}}", "{{$warehouse->first_name}}", "{{$key}}" )'><span class="icon-trash"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
             
        </div>
    </div>
</div>
@endsection

