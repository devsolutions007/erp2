@extends('layouts.app')

@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <div class="card-header">All Products</div> 
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
                            <th>Name/Label</th>
                            <th>Price</th>
                            <th>Barcode</th>
                            <th>Weight</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $products as $key => $product )
                        <tr id="customer_row{{$key}}">
                            <td>{{$key+1}}</td>
                            <td>{{ $product->label }} </td>
                            <td>$ {{ number_format($product->price, 2)  }} </td>
                            <td>{{ $product->ref }}</td>
                            <td>{{ $weight[$key]->weight }} kg</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">View</a>
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-warning">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- $products->links() --}}
            </div>  
             
        </div>
    </div>
</div>
@endsection

