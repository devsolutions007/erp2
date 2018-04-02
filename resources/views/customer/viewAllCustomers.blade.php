@extends('layouts.app')

@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <div class="card-header">All Customers</div> 
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Since</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $customerDetails as $key => $customerDetail )
                        <tr id="customer_row{{$key}}">
                            <td>{{$key+1}}</td>
                            <td>{{ $customerDetail->first_name }} {{ $customerDetail->middle_name }} {{ $customerDetail->last_name}} </td>
                            <td>{{ $customerDetail->email }}</td>
                            <td>{{ $customerDetail->phone }}</td>
                            <td>{{ $customerDetail->since}}</td>
                            <td>
                                <a href="/customers/details/{{ $customerDetail->id}}" class="btn btn-sm btn-info">View</a>
                                <a href="/customers/edit/{{ $customerDetail->id}}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-warning" onclick='deleteCustomer( "{{$customerDetail->id}}", "{{$customerDetail->first_name}}", "{{$key}}" )'>Delete</a>
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

