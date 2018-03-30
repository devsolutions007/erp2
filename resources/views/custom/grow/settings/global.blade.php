@extends('layouts.app')

@section('content')
<?php 
    foreach($globalColorLists as $globalColorList) {
        if($globalColorList->key == 'clone_color')  $clone_color = $globalColorList->value; 

        if($globalColorList->key == 'vegetation_color')  $vegetation_color = $globalColorList->value; 
        if($globalColorList->key == 'flower_color')  $flower_color = $globalColorList->value;

        if($globalColorList->key == 'cutweigh_wet_color')  $cutweigh_wet_color = $globalColorList->value;

        if($globalColorList->key == 'harvest_drying_color')  $harvest_drying_color = $globalColorList->value; 

        if($globalColorList->key == 'harvest_curing_color')  $harvest_curing_color = $globalColorList->value; 
    }
?>
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <div class="card-header">GUI Configuration</div>
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
                    <form class="form-horizontal" method="POST" action="/grow/saveColorSettings?growMenu=visible">
                        <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                        <div class="form-group row gutters">
                            <label class="col-sm-3 col-form-label">Clone Color</label>
                            <div class="col-sm-2">
                                <input type="color" name="clone_color" class="form-control" value="{{$clone_color}}"/>
                            </div>
                            <div class="col-md-2"></div>
                            <label class="col-sm-3 col-form-label">Vegitation Color</label>
                            <div class="col-sm-2">
                                <input type="color" name="vegetation_color" class="form-control" value="{{$vegetation_color}}"/>
                            </div>
                        </div>
                        <div class="form-group row gutters">
                            <label class="col-sm-3 col-form-label">Flower Color</label>
                            <div class="col-sm-2">
                                <input type="color" name="flower_color" class="form-control" value="{{$flower_color}}"/>
                            </div>
                            <div class="col-md-2"></div>
                            <label class="col-sm-3 col-form-label">Cutweigh Wet Color</label>
                            <div class="col-sm-2">
                                <input type="color" name="cutweigh_wet_color" class="form-control" value="{{$cutweigh_wet_color}}"/>
                            </div>
                        </div>
                        <div class="form-group row gutters">
                            <label class="col-sm-3 col-form-label">Harvest Drying Color</label>
                            <div class="col-sm-2">
                                <input type="color" name="harvest_drying_color" class="form-control" value="{{$harvest_drying_color}}"/>
                            </div>
                            <div class="col-md-2"></div>
                            <label class="col-sm-3 col-form-label">Harvest Curing Color</label>
                            <div class="col-sm-2">
                                <input type="color" name="harvest_curing_color" class="form-control" value="{{$harvest_curing_color}}"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>            
            </div>
        </div>
    </div>
</div>

@endsection

