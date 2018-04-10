@extends('layouts.app')

@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <div class="card-header">Warehouses Area</div> 
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

            </div>  
             
        </div>
    </div>
</div>
@endsection

