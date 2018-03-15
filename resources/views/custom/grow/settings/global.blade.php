@extends('layouts.app')

@section('content')
   <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>GUI Configuration</h2>
                </div>
                <div class="body">
                    <form>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <b>Clone Color</b>
                                <div class="input-group colorpicker">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="#00AABB">
                                    </div>
                                    <span class="input-group-addon">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <b>Vegitation Color</b>
                                <div class="input-group colorpicker">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="#00AABB">
                                    </div>
                                    <span class="input-group-addon">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <b>Flower Color</b>
                                <div class="input-group colorpicker">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="#00AABB">
                                    </div>
                                    <span class="input-group-addon">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <b>Cutweigh Wet Color</b>
                                <div class="input-group colorpicker">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="#00AABB">
                                    </div>
                                    <span class="input-group-addon">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <b>Harvest Drying Color</b>
                                <div class="input-group colorpicker">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="#00AABB">
                                    </div>
                                    <span class="input-group-addon">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <b>Harvest CuringColor</b>
                                <div class="input-group colorpicker">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="#00AABB">
                                    </div>
                                    <span class="input-group-addon">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="button" class="btn btn-default waves-effect">Save</button>
                            </div>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
    </div>

@endsection

